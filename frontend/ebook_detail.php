<?php
    $page = "ebooks";
    
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

    // Lấy ID từ URL
    $ebook_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    // Xử lý download
    if (isset($_GET['download']) && $_GET['download'] == 1 && $ebook_id > 0) {
        // Tăng download count
        $conn->query("UPDATE ebooks SET download_count = download_count + 1 WHERE id = $ebook_id");
        
        // Lấy thông tin file
        $file_result = $conn->query("SELECT file_path, title FROM ebooks WHERE id = $ebook_id");
        if ($file = $file_result->fetch_assoc()) {
            if ($file['file_path'] && file_exists($file['file_path'])) {
                // Force download
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $file['title'] . '.pdf"');
                readfile($file['file_path']);
                exit;
            }
        }
    }
    
    if ($ebook_id <= 0) {
        header("Location: ebook.php");
        exit;
    }
    
    // Lấy thông tin ebook
    $ebook_result = $conn->query("SELECT * FROM ebooks WHERE id = $ebook_id AND status = 'active'");
    
    if ($ebook_result->num_rows === 0) {
        header("Location: ebook.php");
        exit;
    }
    
    $ebook = $ebook_result->fetch_assoc();
    $page_title = htmlspecialchars($ebook['title']) . " - CLB Tin Học";
    
    // Lấy ebooks liên quan (cùng category)
    $related_result = $conn->query("SELECT * FROM ebooks WHERE category = '" . $conn->real_escape_string($ebook['category']) . "' AND id != $ebook_id AND status = 'active' LIMIT 3");
    
    include "modules/head.php";
?>

<?php include "modules/nav.php"; ?>

    <section class="hero-section text-white pb-16 pt-36">
        <div class="container mx-auto px-6 py-20">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="main.php" class="text-blue-200 hover:text-white">Trang chủ</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i data-feather="chevron-right" class="w-4 h-4 text-blue-200 mx-2"></i>
                                <a href="ebook.php" class="text-blue-200 hover:text-white">E-books</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i data-feather="chevron-right" class="w-4 h-4 text-blue-200 mx-2"></i>
                                <span class="text-white"><?= htmlspecialchars($ebook['title']) ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12" data-aos="fade-up">
                    <!-- Cover và thông tin cơ bản -->
                    <div class="lg:col-span-1">
                        <div class="bg-white bg-opacity-10 rounded-xl p-8 text-center">
                            <?php
                            $category_colors = [
                                'Python' => 'from-blue-500 to-blue-600',
                                'JavaScript' => 'from-yellow-500 to-orange-500', 
                                'Java' => 'from-red-500 to-red-600',
                                'C++' => 'from-purple-500 to-purple-600',
                                'Mobile' => 'from-green-500 to-green-600',
                                'Database' => 'from-indigo-500 to-indigo-600',
                                'Web Development' => 'from-teal-500 to-teal-600',
                                'Office' => 'from-orange-500 to-orange-600'
                            ];
                            
                            $category_icons = [
                                'Python' => 'code',
                                'JavaScript' => 'globe', 
                                'Java' => 'coffee',
                                'C++' => 'terminal',
                                'Mobile' => 'smartphone',
                                'Database' => 'database',
                                'Web Development' => 'monitor',
                                'Office' => 'file-text'
                            ];
                            
                            $bg_color = $category_colors[$ebook['category']] ?? 'from-gray-500 to-gray-600';
                            $icon = $category_icons[$ebook['category']] ?? 'book';
                            ?>
                            
                            <div class="w-48 h-64 mx-auto mb-6 bg-gradient-to-br <?= $bg_color ?> rounded-lg flex items-center justify-center shadow-lg">
                                <?php if ($ebook['cover_image'] && file_exists($ebook['cover_image'])): ?>
                                    <img src="<?= htmlspecialchars($ebook['cover_image']) ?>" alt="<?= htmlspecialchars($ebook['title']) ?>" class="w-full h-full object-cover rounded-lg">
                                <?php else: ?>
                                    <i data-feather="<?= $icon ?>" class="w-20 h-20 text-white"></i>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($ebook['file_path'] && file_exists($ebook['file_path'])): ?>
                                <a href="?id=<?= $ebook['id'] ?>&download=1" class="bg-green-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 transition duration-300 inline-flex items-center">
                                    <i data-feather="download" class="w-5 h-5 mr-2"></i>
                                    Tải về miễn phí
                                </a>
                            <?php else: ?>
                                <button disabled class="bg-gray-400 text-white px-6 py-3 rounded-lg font-medium cursor-not-allowed inline-flex items-center">
                                    <i data-feather="alert-circle" class="w-5 h-5 mr-2"></i>
                                    Chưa có file
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Thông tin chi tiết -->
                    <div class="lg:col-span-2">
                        <div class="mb-6">
                            <?php
                            $badge_colors = [
                                'Python' => 'bg-blue-500',
                                'JavaScript' => 'bg-yellow-500',
                                'Java' => 'bg-red-500',
                                'C++' => 'bg-purple-500',
                                'Mobile' => 'bg-green-500',
                                'Database' => 'bg-indigo-500',
                                'Web Development' => 'bg-teal-500',
                                'Office' => 'bg-orange-500'
                            ];
                            $badge_color = $badge_colors[$ebook['category']] ?? 'bg-gray-500';
                            ?>
                            <span class="<?= $badge_color ?> text-white px-4 py-1 rounded-full text-sm font-medium"><?= htmlspecialchars($ebook['category']) ?></span>
                        </div>
                        
                        <h1 class="text-4xl font-bold mb-6"><?= htmlspecialchars($ebook['title']) ?></h1>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-white bg-opacity-10 rounded-lg p-4 text-center">
                                <i data-feather="user" class="w-6 h-6 mx-auto mb-2 text-blue-200"></i>
                                <div class="text-sm text-blue-200">Tác giả</div>
                                <div class="font-medium"><?= htmlspecialchars($ebook['author'] ?? 'ITC Team') ?></div>
                            </div>
                            <div class="bg-white bg-opacity-10 rounded-lg p-4 text-center">
                                <i data-feather="file-text" class="w-6 h-6 mx-auto mb-2 text-blue-200"></i>
                                <div class="text-sm text-blue-200">Số trang</div>
                                <div class="font-medium"><?= $ebook['pages'] ? $ebook['pages'] : 'N/A' ?></div>
                            </div>
                            <div class="bg-white bg-opacity-10 rounded-lg p-4 text-center">
                                <i data-feather="download" class="w-6 h-6 mx-auto mb-2 text-blue-200"></i>
                                <div class="text-sm text-blue-200">Lượt tải</div>
                                <div class="font-medium"><?= $ebook['download_count'] ?></div>
                            </div>
                            <div class="bg-white bg-opacity-10 rounded-lg p-4 text-center">
                                <i data-feather="calendar" class="w-6 h-6 mx-auto mb-2 text-blue-200"></i>
                                <div class="text-sm text-blue-200">Ngày đăng</div>
                                <div class="font-medium"><?= date('d/m/Y', strtotime($ebook['created_at'])) ?></div>
                            </div>
                        </div>
                        
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-4">Mô tả</h2>
                            <p class="text-lg leading-relaxed text-blue-100">
                                <?= $ebook['description'] ? nl2br(htmlspecialchars($ebook['description'])) : 'Chưa có mô tả chi tiết.' ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-books liên quan -->
    <?php if ($related_result->num_rows > 0): ?>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">E-books liên quan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Các sách khác trong chủ đề <?= htmlspecialchars($ebook['category']) ?></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $delay = 0; while ($related = $related_result->fetch_assoc()): ?>
                    <?php
                    $bg_color = $category_colors[$related['category']] ?? 'from-gray-500 to-gray-600';
                    $icon = $category_icons[$related['category']] ?? 'book';
                    $badge_color = $badge_colors[$related['category']] ?? 'bg-gray-500';
                    ?>
                    
                    <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                        <div class="h-48 bg-gradient-to-br <?= $bg_color ?> flex items-center justify-center">
                            <?php if ($related['cover_image'] && file_exists($related['cover_image'])): ?>
                                <img src="<?= htmlspecialchars($related['cover_image']) ?>" alt="<?= htmlspecialchars($related['title']) ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <i data-feather="<?= $icon ?>" class="w-16 h-16 text-white"></i>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="<?= $badge_color ?> text-white px-3 py-1 rounded-full text-xs font-medium"><?= htmlspecialchars($related['category']) ?></span>
                                <span class="text-sm text-gray-500"><?= $related['pages'] ? $related['pages'] . ' trang' : 'N/A' ?></span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($related['title']) ?></h3>
                            <p class="text-gray-600 mb-4"><?= htmlspecialchars(substr($related['description'], 0, 100)) ?>...</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                    <span><?= htmlspecialchars($related['author'] ?? 'ITC Team') ?></span>
                                </div>
                                <a href="ebooks.php?id=<?= $related['id'] ?>" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    Xem chi tiết
                                    <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php $delay += 100; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

<?php include "modules/footer.php"; ?>