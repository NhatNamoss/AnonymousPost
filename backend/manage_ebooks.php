<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Include config file
include_once $_SERVER['DOCUMENT_ROOT'] . '/modules/config.php';

// Set response type
$response = ['success' => false, 'data' => [], 'message' => ''];

try {
    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'GET':
            handleGetRequest();
            break;
        case 'POST':
            handlePostRequest();
            break;
        case 'PUT':
            handlePutRequest();
            break;
        case 'DELETE':
            handleDeleteRequest();
            break;
        default:
            $response['message'] = 'Method not allowed';
            http_response_code(405);
    }
} catch (Exception $e) {
    $response['message'] = 'Server error: ' . $e->getMessage();
    http_response_code(500);
}

echo json_encode($response);

function handleGetRequest() {
    global $KNCMS, $response;
    
    $action = $_GET['action'] ?? 'list';
    
    switch ($action) {
        case 'list':
            $page = $_GET['page'] ?? 1;
            $limit = $_GET['limit'] ?? 10;
            $search = $_GET['search'] ?? '';
            $category = $_GET['category'] ?? '';
            $status = $_GET['status'] ?? '';
            
            $offset = ($page - 1) * $limit;
            
            $sql = "SELECT * FROM ebooks WHERE 1=1";
            $conditions = [];
            
            if (!empty($search)) {
                $conditions[] = "(title LIKE '%" . $KNCMS->escape($search) . "%' OR author LIKE '%" . $KNCMS->escape($search) . "%')";
            }
            
            if (!empty($category)) {
                $conditions[] = "category = '" . $KNCMS->escape($category) . "'";
            }
            
            if (!empty($status)) {
                $conditions[] = "status = '" . $KNCMS->escape($status) . "'";
            }
            
            if (!empty($conditions)) {
                $sql .= " AND " . implode(" AND ", $conditions);
            }
            
            // Count total records
            $countSql = str_replace("SELECT * FROM", "SELECT COUNT(*) as total FROM", $sql);
            $totalResult = $KNCMS->get_row($countSql);
            $total = $totalResult['total'] ?? 0;
            
            $sql .= " ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
            
            $result = $KNCMS->get_list($sql);
            
            $response['success'] = true;
            $response['data'] = [
                'ebooks' => $result,
                'pagination' => [
                    'current_page' => (int)$page,
                    'total_pages' => ceil($total / $limit),
                    'total_records' => (int)$total,
                    'limit' => (int)$limit
                ]
            ];
            $response['message'] = 'Danh sách ebooks (admin)';
            break;
            
        case 'detail':
            $id = $_GET['id'] ?? 0;
            if (!$id) {
                $response['message'] = 'ID ebook không hợp lệ';
                http_response_code(400);
                return;
            }
            
            $ebook = $KNCMS->get_row("SELECT * FROM ebooks WHERE id = " . intval($id));
            
            if ($ebook) {
                $response['success'] = true;
                $response['data'] = $ebook;
                $response['message'] = 'Chi tiết ebook';
            } else {
                $response['message'] = 'Không tìm thấy ebook';
                http_response_code(404);
            }
            break;
            
        case 'stats':
            $stats = [
                'total_ebooks' => $KNCMS->num_rows("SELECT id FROM ebooks"),
                'active_ebooks' => $KNCMS->num_rows("SELECT id FROM ebooks WHERE status = 'active'"),
                'draft_ebooks' => $KNCMS->num_rows("SELECT id FROM ebooks WHERE status = 'draft'"),
                'total_downloads' => $KNCMS->get_row("SELECT SUM(download_count) as total FROM ebooks")['total'] ?? 0
            ];
            
            $response['success'] = true;
            $response['data'] = $stats;
            $response['message'] = 'Thống kê ebooks';
            break;
            
        default:
            $response['message'] = 'Action không hợp lệ';
            http_response_code(400);
    }
}

function handlePostRequest() {
    global $KNCMS, $response;
    
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'create':
            // Validate required fields
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $category = $_POST['category'] ?? '';
            $author = $_POST['author'] ?? '';
            $pages = $_POST['pages'] ?? 0;
            $status = $_POST['status'] ?? 'draft';
            
            if (empty($title) || empty($description) || empty($category) || empty($author)) {
                $response['message'] = 'Vui lòng điền đầy đủ thông tin bắt buộc';
                http_response_code(400);
                return;
            }
            
            // Handle file uploads
            $cover_image = '';
            $file_path = '';
            
            // Process cover image
            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
                $cover_image = uploadFile($_FILES['cover_image'], 'covers');
                if (!$cover_image) {
                    $response['message'] = 'Lỗi upload ảnh bìa';
                    http_response_code(400);
                    return;
                }
            }
            
            // Process ebook file
            if (isset($_FILES['ebook_file']) && $_FILES['ebook_file']['error'] === 0) {
                $file_path = uploadFile($_FILES['ebook_file'], 'ebooks');
                if (!$file_path) {
                    $response['message'] = 'Lỗi upload file ebook';
                    http_response_code(400);
                    return;
                }
            }
            
            // Insert into database
            $sql = "INSERT INTO ebooks (title, description, category, author, pages, cover_image, file_path, status, created_at, updated_at) 
                    VALUES (
                        '" . $KNCMS->escape($title) . "',
                        '" . $KNCMS->escape($description) . "',
                        '" . $KNCMS->escape($category) . "',
                        '" . $KNCMS->escape($author) . "',
                        " . intval($pages) . ",
                        '" . $KNCMS->escape($cover_image) . "',
                        '" . $KNCMS->escape($file_path) . "',
                        '" . $KNCMS->escape($status) . "',
                        NOW(),
                        NOW()
                    )";
            
            $result = $KNCMS->query($sql, true);
            
            if ($result) {
                $response['success'] = true;
                $response['data'] = ['id' => $result];
                $response['message'] = 'Tạo ebook thành công';
            } else {
                $response['message'] = 'Lỗi tạo ebook';
                http_response_code(500);
            }
            break;
            
        default:
            $response['message'] = 'Action không hợp lệ';
            http_response_code(400);
    }
}

function handlePutRequest() {
    global $KNCMS, $response;
    
    // Get raw PUT data
    $putData = json_decode(file_get_contents('php://input'), true);
    $action = $putData['action'] ?? '';
    
    switch ($action) {
        case 'update':
            $id = $putData['id'] ?? 0;
            
            if (!$id) {
                $response['message'] = 'ID ebook không hợp lệ';
                http_response_code(400);
                return;
            }
            
            // Check if ebook exists
            $existing = $KNCMS->get_row("SELECT id FROM ebooks WHERE id = " . intval($id));
            if (!$existing) {
                $response['message'] = 'Không tìm thấy ebook';
                http_response_code(404);
                return;
            }
            
            // Build update query
            $updates = [];
            $allowedFields = ['title', 'description', 'category', 'author', 'pages', 'status'];
            
            foreach ($allowedFields as $field) {
                if (isset($putData[$field])) {
                    if ($field === 'pages') {
                        $updates[] = "$field = " . intval($putData[$field]);
                    } else {
                        $updates[] = "$field = '" . $KNCMS->escape($putData[$field]) . "'";
                    }
                }
            }
            
            if (empty($updates)) {
                $response['message'] = 'Không có dữ liệu để cập nhật';
                http_response_code(400);
                return;
            }
            
            $updates[] = "updated_at = NOW()";
            
            $sql = "UPDATE ebooks SET " . implode(', ', $updates) . " WHERE id = " . intval($id);
            
            $result = $KNCMS->query($sql);
            
            if ($result) {
                $response['success'] = true;
                $response['message'] = 'Cập nhật ebook thành công';
            } else {
                $response['message'] = 'Lỗi cập nhật ebook';
                http_response_code(500);
            }
            break;
            
        default:
            $response['message'] = 'Action không hợp lệ';
            http_response_code(400);
    }
}

function handleDeleteRequest() {
    global $KNCMS, $response;
    
    // Get raw DELETE data
    $deleteData = json_decode(file_get_contents('php://input'), true);
    $id = $deleteData['id'] ?? $_GET['id'] ?? 0;
    
    if (!$id) {
        $response['message'] = 'ID ebook không hợp lệ';
        http_response_code(400);
        return;
    }
    
    // Check if ebook exists
    $existing = $KNCMS->get_row("SELECT id, cover_image, file_path FROM ebooks WHERE id = " . intval($id));
    if (!$existing) {
        $response['message'] = 'Không tìm thấy ebook';
        http_response_code(404);
        return;
    }
    
    // Delete files
    if (!empty($existing['cover_image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $existing['cover_image'])) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $existing['cover_image']);
    }
    
    if (!empty($existing['file_path']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $existing['file_path'])) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $existing['file_path']);
    }
    
    // Delete from database
    $result = $KNCMS->query("DELETE FROM ebooks WHERE id = " . intval($id));
    
    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Xóa ebook thành công';
    } else {
        $response['message'] = 'Lỗi xóa ebook';
        http_response_code(500);
    }
}

function uploadFile($file, $folder) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/$folder/";
    
    // Create directory if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Validate file
    $allowedTypes = [
        'covers' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
        'ebooks' => ['application/pdf', 'application/epub+zip']
    ];
    
    if (!in_array($file['type'], $allowedTypes[$folder])) {
        return false;
    }
    
    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '_' . time() . '.' . $extension;
    $filepath = $uploadDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        return "uploads/$folder/$filename";
    }
    
    return false;
}
?>