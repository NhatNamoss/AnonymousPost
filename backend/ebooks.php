<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
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
            $category = $_GET['category'] ?? '';
            $search = $_GET['search'] ?? '';
            
            $sql = "SELECT * FROM ebooks WHERE status = 'active'";
            $conditions = [];
            
            if (!empty($category)) {
                $conditions[] = "category = '" . $KNCMS->escape($category) . "'";
            }
            
            if (!empty($search)) {
                $conditions[] = "(title LIKE '%" . $KNCMS->escape($search) . "%' OR description LIKE '%" . $KNCMS->escape($search) . "%' OR author LIKE '%" . $KNCMS->escape($search) . "%')";
            }
            
            if (!empty($conditions)) {
                $sql .= " AND " . implode(" AND ", $conditions);
            }
            
            $sql .= " ORDER BY created_at DESC";
            
            $result = $KNCMS->get_list($sql);
            
            $response['success'] = true;
            $response['data'] = $result;
            $response['message'] = 'Danh sách ebooks';
            break;
            
        case 'detail':
            $id = $_GET['id'] ?? 0;
            if (!$id) {
                $response['message'] = 'ID ebook không hợp lệ';
                http_response_code(400);
                return;
            }
            
            $ebook = $KNCMS->get_row("SELECT * FROM ebooks WHERE id = " . intval($id) . " AND status = 'active'");
            
            if ($ebook) {
                $response['success'] = true;
                $response['data'] = $ebook;
                $response['message'] = 'Chi tiết ebook';
            } else {
                $response['message'] = 'Không tìm thấy ebook';
                http_response_code(404);
            }
            break;
            
        case 'categories':
            $categories = $KNCMS->get_list("SELECT DISTINCT category FROM ebooks WHERE status = 'active' AND category != ''");
            
            $response['success'] = true;
            $response['data'] = $categories;
            $response['message'] = 'Danh sách categories';
            break;
            
        case 'related':
            $id = $_GET['id'] ?? 0;
            $category = $_GET['category'] ?? '';
            
            if (!$id || !$category) {
                $response['message'] = 'Thiếu thông tin để lấy ebooks liên quan';
                http_response_code(400);
                return;
            }
            
            $related = $KNCMS->get_list("SELECT * FROM ebooks WHERE category = '" . $KNCMS->escape($category) . "' AND id != " . intval($id) . " AND status = 'active' ORDER BY download_count DESC LIMIT 3");
            
            $response['success'] = true;
            $response['data'] = $related;
            $response['message'] = 'Ebooks liên quan';
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
        case 'download':
            $id = $_POST['id'] ?? 0;
            
            if (!$id) {
                $response['message'] = 'ID ebook không hợp lệ';
                http_response_code(400);
                return;
            }
            
            // Cập nhật số lượt download
            $KNCMS->query("UPDATE ebooks SET download_count = download_count + 1 WHERE id = " . intval($id));
            
            // Lấy thông tin file để download
            $ebook = $KNCMS->get_row("SELECT * FROM ebooks WHERE id = " . intval($id) . " AND status = 'active'");
            
            if ($ebook) {
                $response['success'] = true;
                $response['data'] = [
                    'file_path' => $ebook['file_path'],
                    'title' => $ebook['title'],
                    'download_count' => $ebook['download_count'] + 1
                ];
                $response['message'] = 'Cập nhật download thành công';
            } else {
                $response['message'] = 'Không tìm thấy ebook';
                http_response_code(404);
            }
            break;
            
        default:
            $response['message'] = 'Action không hợp lệ';
            http_response_code(400);
    }
}
?>