<?php
session_start();
// Kết nối database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'titcdhsphedu_itc';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

$message = '';
$messageType = '';

// Xử lý thêm ebook mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_ebook'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $category = $conn->real_escape_string($_POST['category']);
    $author = $conn->real_escape_string($_POST['author']);
    $pages = (int)$_POST['pages'];
    
    // Xử lý upload file cover
    $cover_image = null;
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
        $uploadDir = 'uploads/covers/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = time() . '_' . basename($_FILES['cover_image']['name']);
        $uploadPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $uploadPath)) {
            $cover_image = $uploadPath;
        }
    }
    
    // Xử lý upload file PDF
    $file_path = null;
    if (isset($_FILES['ebook_file']) && $_FILES['ebook_file']['error'] === 0) {
        $uploadDir = 'uploads/ebooks/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = time() . '_' . basename($_FILES['ebook_file']['name']);
        $uploadPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['ebook_file']['tmp_name'], $uploadPath)) {
            $file_path = $uploadPath;
        }
    }
    
    $sql = "INSERT INTO ebooks (title, description, category, author, pages, cover_image, file_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisss", $title, $description, $category, $author, $pages, $cover_image, $file_path);
    
    if ($stmt->execute()) {
        $message = "Thêm ebook thành công!";
        $messageType = "success";
    } else {
        $message = "Lỗi: " . $conn->error;
        $messageType = "error";
    }
}

// Lấy danh sách ebooks
$ebooks_result = $conn->query("SELECT * FROM ebooks ORDER BY created_at DESC");

$page_title = "Quản lý E-books - Admin";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="font-sans bg-gray-50">

<div class="min-h-screen py-8">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Quản lý E-books</h1>
            
            <?php if ($message): ?>
                <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <!-- Form thêm ebook -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Thêm E-book mới</h2>
                
                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tiêu đề *</label>
                            <input type="text" name="title" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Danh mục *</label>
                            <select name="category" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Chọn danh mục</option>
                                <option value="Python">Python</option>
                                <option value="JavaScript">JavaScript</option>
                                <option value="Java">Java</option>
                                <option value="C++">C++</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Database">Database</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Office">Office văn phòng</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tác giả</label>
                            <input type="text" name="author" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Số trang</label>
                            <input type="number" name="pages" min="1" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mô tả</label>
                        <textarea name="description" rows="4" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ảnh bìa</label>
                            <input type="file" name="cover_image" accept="image/*" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">File E-book (PDF)</label>
                            <input type="file" name="ebook_file" accept=".pdf" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" name="add_ebook" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                            <i data-feather="plus" class="w-4 h-4 inline mr-2"></i>
                            Thêm E-book
                        </button>
                    </div>
                </form>
            </div>

            <!-- Danh sách ebooks -->
            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Danh sách E-books</h2>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiêu đề</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Danh mục</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tác giả</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lượt tải</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($ebook = $ebooks_result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($ebook['title']) ?></div>
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars(substr($ebook['description'], 0, 50)) ?>...</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-600">
                                        <?= htmlspecialchars($ebook['category']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= htmlspecialchars($ebook['author']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= $ebook['pages'] ? $ebook['pages'] . ' trang' : '-' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= $ebook['download_count'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d/m/Y', strtotime($ebook['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="frontend/ebook_detail.php?id=<?= $ebook['id'] ?>" 
                                        class="text-blue-600 hover:text-blue-900">Xem</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Xóa</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
    
    feather.replace();
</script>

</body>
</html>