<?php
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
$results = [];
$searchTerm = '';
$hasSearch = false;

// Xử lý tìm kiếm
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $hasSearch = true;
    $searchTerm = $conn->real_escape_string($_GET['q']);
    
    // Tìm kiếm chỉ trong cột fullname
    $sql = "SELECT * FROM users WHERE fullname LIKE '%$searchTerm%'";
    
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm mã thành viên - CLB Tin Học</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="font-sans bg-gray-50">

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-700 text-white pt-10 pb-8">
        <div class="container mx-auto px-6 py-6">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="mb-3">
                    <i data-feather="search" class="w-12 h-12 mx-auto text-white mb-2"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-3">Tìm mã thành viên</h1>
                <p class="text-sm md:text-base leading-relaxed mb-4">
                    Nhập họ tên đầy đủ hoặc một phần họ tên để tìm kiếm
                </p>
                <div class="bg-white rounded-xl shadow-lg p-4" data-aos="fade-up" data-aos-delay="100">
                    <form method="GET" action="" class="space-y-2">
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="flex-grow">
                                <input type="text" id="q" name="q" 
                                    class="w-full px-3 py-2 text-gray-900 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition " 
                                    placeholder="Nhập họ tên đầy đủ" 
                                    value="<?= htmlspecialchars($searchTerm) ?>">
                            </div>
                            <button type="submit" 
                                class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 transition duration-300 flex items-center justify-center">
                                <i data-feather="search" class="w-4 h-4 mr-1"></i>
                                Tìm kiếm
                            </button>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </section>

    <!-- Search Section --

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div id="result" class="max-w-6xl mx-auto">
                <?php if (!$hasSearch): ?>
                    <div class="text-center text-gray-500" data-aos="fade-up">
                        <i data-feather="info" class="w-16 h-16 mx-auto mb-4 text-blue-500 opacity-50"></i>
                        <p class="text-xl">Chưa có kết quả. Hãy nhập họ tên để tìm kiếm.</p>
                    </div>
                <?php elseif (empty($results)): ?>
                    <div class="text-center text-gray-500" data-aos="fade-up">
                        <i data-feather="search" class="w-16 h-16 mx-auto mb-4 text-blue-500 opacity-50"></i>
                        <p class="text-xl">Không tìm thấy bản ghi nào phù hợp với từ khóa "<?= htmlspecialchars($searchTerm) ?>"</p>
                    </div>
                <?php else: ?>
                    <div data-aos="fade-up">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <div class="mb-6 flex items-center">
                                <i data-feather="users" class="w-8 h-8 text-blue-600 mr-3"></i>
                                <h3 class="text-2xl font-bold text-gray-800">Tìm thấy <?= count($results) ?> kết quả</h3>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <?php foreach (array_keys($results[0]) as $header): ?>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <?= htmlspecialchars($header) ?>
                                            </th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($results as $index => $row): ?>
                                        <tr class="<?= $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition">
                                            <?php foreach ($row as $key => $value): ?>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <?= htmlspecialchars($value) ?>
                                            </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">CLB Tin Học</h3>
                    <p class="text-gray-400">Nơi kết nối đam mê công nghệ, sáng tạo và phát triển.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Dịch vụ</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Tìm kiếm thành viên</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">E-books</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Sự kiện</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Đào tạo</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Liên hệ</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-400"><i data-feather="mail" class="mr-2 w-4 h-4"></i> clbtinhoc@dhsphue.edu.vn</li>
                        <li class="flex items-center text-gray-400"><i data-feather="phone" class="mr-2 w-4 h-4"></i> 0896370650</li>
                        <li class="flex items-center text-gray-400"><i data-feather="map-pin" class="mr-2 w-4 h-4"></i> TP Huế</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Mạng xã hội</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><i data-feather="facebook" class="w-5 h-5"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i data-feather="youtube" class="w-5 h-5"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i data-feather="instagram" class="w-5 h-5"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i data-feather="github" class="w-5 h-5"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2025 ITC GEN 3.0 - Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 0,
            easing: 'ease-in-out',
            once: true
        });

        feather.replace();
    </script>
</body>
</html>
