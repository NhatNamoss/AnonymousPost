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
            color: #6b7280;
        }
        .breadcrumb a:hover {
            color: #3b82f6;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="index.html" class="text-xl font-bold text-blue-600">ITC GEN 3.0</a>
                <div class="hidden md:flex space-x-6">
                    <a href="index.html" class="text-gray-600 hover:text-blue-600 transition">Trang chủ</a>
                    <a href="ebook-lap-trinh.html" class="text-blue-600 font-medium active">E-book Lập trình</a>
                    <a href="tap-chi-tin-hoc.html" class="text-gray-600 hover:text-blue-600 transition">Tạp chí Tin học</a>
                    <a href="video-tutorial.html" class="text-gray-600 hover:text-blue-600 transition">Video Tutorial</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <section class="pt-24 pb-8 bg-white">
        <div class="container mx-auto px-6">
            <div class="breadcrumb text-sm flex items-center space-x-2">
                <a href="index.html" class="hover:text-blue-600 transition">Trang chủ</a>
                <i data-feather="chevron-right" class="w-4 h-4"></i>
                <a href="ebook-lap-trinh.html" class="hover:text-blue-600 transition">E-book Lập trình</a>
                <i data-feather="chevron-right" class="w-4 h-4"></i>
                <span class="text-blue-600 font-medium">Python</span>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="hero-section text-white pb-16 pt-36">
        <div class="container mx-auto px-6 py-16">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="mb-6">
                    <div class="python-badge w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="code" class="w-10 h-10 text-white"></i>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">E-book Python</h1>
                <p class="text-xl mb-8">Tổng hợp các tài liệu học Python từ cơ bản đến chuyên sâu</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Bộ sưu tập E-book Python</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Từ cơ bản đến nâng cao, chọn e-book phù hợp với trình độ của bạn</p>
            </div>

            <!-- Filter by Level -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <span class="bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer">Tất cả</span>
                <span class="level-easy text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer hover:opacity-90 transition">Cơ bản</span>
                <span class="level-medium text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer hover:opacity-90 transition">Trung cấp</span>
                <span class="level-hard text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer hover:opacity-90 transition">Nâng cao</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- E-book 1 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center relative">
                        <i data-feather="book-open" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-easy text-white px-2 py-1 rounded text-xs font-medium">Cơ bản</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">Python 3.12</span>
                            <span class="text-sm text-gray-500">180 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python Cơ bản cho Beginners</h3>
                        <p class="text-gray-600 mb-4">Học Python từ con số 0 với các ví dụ thực tế, bài tập và dự án nhỏ để thực hành.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Cài đặt và cấu hình Python</li>
                                <li>• Biến, kiểu dữ liệu, toán tử</li>
                                <li>• Cấu trúc điều khiển và vòng lặp</li>
                                <li>• Functions và modules</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>Nguyễn Văn A</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-book 2 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center relative">
                        <i data-feather="layers" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-medium text-white px-2 py-1 rounded text-xs font-medium">Trung cấp</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">OOP</span>
                            <span class="text-sm text-gray-500">250 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python OOP và Design Patterns</h3>
                        <p class="text-gray-600 mb-4">Nắm vững lập trình hướng đối tượng và các mẫu thiết kế phổ biến trong Python.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Classes và Objects</li>
                                <li>• Inheritance và Polymorphism</li>
                                <li>• Design Patterns (Singleton, Factory...)</li>
                                <li>• Exception Handling nâng cao</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>Trần Thị B</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-book 3 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center relative">
                        <i data-feather="globe" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-medium text-white px-2 py-1 rounded text-xs font-medium">Trung cấp</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">Django</span>
                            <span class="text-sm text-gray-500">320 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development với Django</h3>
                        <p class="text-gray-600 mb-4">Xây dựng ứng dụng web hoàn chỉnh với Django framework mạnh mẽ của Python.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Django setup và project structure</li>
                                <li>• Models, Views, Templates</li>
                                <li>• Forms và User Authentication</li>
                                <li>• REST API với Django REST Framework</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>ITC Web Team</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-book 4 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="h-48 bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center relative">
                        <i data-feather="bar-chart-2" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-hard text-white px-2 py-1 rounded text-xs font-medium">Nâng cao</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">Data Science</span>
                            <span class="text-sm text-gray-500">380 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python Data Science Complete</h3>
                        <p class="text-gray-600 mb-4">Khoa học dữ liệu với Python: NumPy, Pandas, Matplotlib, Scikit-learn và nhiều hơn nữa.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• NumPy và Pandas cho data manipulation</li>
                                <li>• Data visualization với Matplotlib</li>
                                <li>• Machine Learning với Scikit-learn</li>
                                <li>• Deep Learning cơ bản với TensorFlow</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>Lê Văn C</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-book 5 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center relative">
                        <i data-feather="zap" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-easy text-white px-2 py-1 rounded text-xs font-medium">Cơ bản</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">Automation</span>
                            <span class="text-sm text-gray-500">200 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python Automation Scripts</h3>
                        <p class="text-gray-600 mb-4">Tự động hóa các tác vụ hàng ngày với Python: file handling, web scraping, email automation.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• File và Directory automation</li>
                                <li>• Web scraping với BeautifulSoup</li>
                                <li>• Email automation</li>
                                <li>• Scheduled tasks với cron</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>Phạm Thị D</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-book 6 -->
                <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-48 bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center relative">
                        <i data-feather="cpu" class="w-16 h-16 text-white"></i>
                        <div class="absolute top-4 right-4">
                            <span class="level-hard text-white px-2 py-1 rounded text-xs font-medium">Nâng cao</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="python-badge text-white px-3 py-1 rounded-full text-xs font-medium">AI/ML</span>
                            <span class="text-sm text-gray-500">420 trang</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python AI & Machine Learning</h3>
                        <p class="text-gray-600 mb-4">Trí tuệ nhân tạo và máy học với Python: từ lý thuyết đến thực hành với các project thực tế.</p>
                        <div class="mb-4">
                            <div class="text-sm text-gray-700 font-medium mb-2">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Machine Learning algorithms</li>
                                <li>• Neural Networks với Keras</li>
                                <li>• Computer Vision với OpenCV</li>
                                <li>• NLP và Text Processing</li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                <span>ITC AI Team</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    Xem
                                </a>
                                <a href="#" class="text-green-500 font-medium inline-flex items-center hover:text-green-600 transition">
                                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                                    Tải
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                    Xem thêm E-book Python
                </button>
            </div>
        </div>
    </section>

    <!-- Learning Path -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Lộ trình học Python</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Gợi ý thứ tự đọc các e-book để học Python hiệu quả nhất</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-8">
                    <!-- Step 1 -->
                    <div class="flex items-center space-x-8" data-aos="fade-right">
                        <div class="level-easy w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">1</div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Python Cơ bản cho Beginners</h3>
                            <p class="text-gray-600">Bắt đầu với những kiến thức nền tảng về Python</p>
                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">2-3 tuần</span>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-center space-x-8" data-aos="fade-left">
                        <div class="level-easy w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">2</div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Python Automation Scripts</h3>
                            <p class="text-gray-600">Thực hành với các script tự động hóa đơn giản</p>
                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">2 tuần</span>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-center space-x-8" data-aos="fade-right">
                        <div class="level-medium w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">3</div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Python OOP và Design Patterns</h3>
                            <p class="text-gray-600">Nắm vững lập trình hướng đối tượng</p>
                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">3-4 tuần</span>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-center space-x-8" data-aos="fade-left">
                        <div class="level-medium w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">4</div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Chọn chuyên ngành</h3>
                            <p class="text-gray-600">Web Development (Django) hoặc Data Science hoặc AI/ML</p>
                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">4-8 tuần</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div data-aos="fade-up">
                    <div class="text-3xl md:text-4xl font-bold mb-2">15</div>
                    <div class="text-blue-200">E-books Python</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl md:text-4xl font-bold mb-2">3500+</div>
                    <div class="text-blue-200">Trang nội dung</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl md:text-4xl font-bold mb-2">8K+</div>
                    <div class="text-blue-200">Lượt tải</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl md:text-4xl font-bold mb-2">95%</div>
                    <div class="text-blue-200">Đánh giá tích cực</div>
                </div>
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
                    <h4 class="font-bold mb-4">E-books Python</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Cơ bản</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Web Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Data Science</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">AI/ML</a></li>
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
                    <h4 class="font-bold mb-4">Liên kết</h4>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-white transition">Trang chủ</a></li>
                        <li><a href="ebook-lap-trinh.html" class="text-gray-400 hover:text-white transition">Tất cả E-book</a></li>
                        <li><a href="tap-chi-tin-hoc.html" class="text-gray-400 hover:text-white transition">Tạp chí Tin học</a></li>
                        <li><a href="video-tutorial.html" class="text-gray-400 hover:text-white transition">Video Tutorial</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2025 ITC GEN 3.0 - Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        feather.replace();
    </script>

<?php include "modules/footer.php"; ?>
