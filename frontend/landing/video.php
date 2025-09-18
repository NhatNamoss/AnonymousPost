<?php
    $page = "video";
    include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Tutorial - CLB Tin Học</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .play-button {
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        .play-button:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }
        .level-badge {
            background: linear-gradient(45deg, #10b981, #059669);
        }
        .active {
            color: #2563eb !important;
            font-weight: 500;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Hero Section -->
    <section class="hero-section text-white pt-20 pb-16">
        <div class="container mx-auto px-6 py-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="mb-6">
                    <i data-feather="play-circle" class="w-16 h-16 mx-auto text-white mb-4"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Video Tutorial</h1>
                <p class="text-xl mb-8">Thư viện video hướng dẫn lập trình từ cơ bản đến nâng cao</p>
                <div class="flex justify-center space-x-4">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">200+ Video</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">HD Quality</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">Phụ đề</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Học lập trình qua Video</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Thư viện Video Tutorial của CLB Tin Học cung cấp các khóa học lập trình trực quan và dễ hiểu. 
                        Từ những khái niệm cơ bản nhất đến các chủ đề nâng cao, tất cả đều được trình bày một cách 
                        sinh động qua hình ảnh và thực hành trực tiếp.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center p-6">
                        <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="video" class="w-8 h-8 text-red-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Chất lượng HD</h3>
                        <p class="text-gray-600">Video được quay với chất lượng cao, hình ảnh và âm thanh rõ nét</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="subtitles" class="w-8 h-8 text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Phụ đề đầy đủ</h3>
                        <p class="text-gray-600">Tất cả video đều có phụ đề tiếng Việt và tài liệu đi kèm</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="code" class="w-8 h-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Thực hành trực tiếp</h3>
                        <p class="text-gray-600">Coding trực tiếp trên màn hình với giải thích từng bước chi tiết</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Playlists -->
    <section class="py-16 bg-gray-50">
        
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Playlist nổi bật</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Các khóa học video được tổ chức thành các playlist theo chủ đề</p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button class="level-badge text-white px-6 py-2 rounded-full text-sm font-medium">Tất cả</button>
                <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-300 transition">Cơ bản</button>
                <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-300 transition">Trung cấp</button>
                <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-300 transition">Nâng cao</button>
                <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-300 transition">Project</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Video 1 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">25 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-medium">Cơ bản</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python cho người mới bắt đầu</h3>
                        <p class="text-gray-600 mb-4">Học Python từ con số 0 với các ví dụ thực tế và bài tập thực hành.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>12 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>2.5K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Cú pháp và biến</li>
                                <li>• Vòng lặp và điều kiện</li>
                                <li>• Functions và Classes</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">18 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full text-xs font-medium">Trung cấp</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">JavaScript ES6+ Complete</h3>
                        <p class="text-gray-600 mb-4">Nắm vững JavaScript hiện đại với ES6+ features và best practices.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>15 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>3.2K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Arrow functions và Destructuring</li>
                                <li>• Promises và Async/Await</li>
                                <li>• Modules và Classes</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">32 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs font-medium">Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Build Full-Stack Web App</h3>
                        <p class="text-gray-600 mb-4">Xây dựng ứng dụng web hoàn chỉnh với React, Node.js và MongoDB.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>25 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>4.1K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• React Hooks và Context</li>
                                <li>• Express.js API</li>
                                <li>• MongoDB và Authentication</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Video 4 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">20 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-medium">Nâng cao</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Data Structures & Algorithms</h3>
                        <p class="text-gray-600 mb-4">Nắm vững thuật toán và cấu trúc dữ liệu với C++ và Python.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>18 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>1.8K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Arrays, Linked Lists, Trees</li>
                                <li>• Sorting và Searching</li>
                                <li>• Dynamic Programming</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Video 5 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">15 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-xs font-medium">Trung cấp</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile App với Flutter</h3>
                        <p class="text-gray-600 mb-4">Phát triển ứng dụng di động đa nền tảng với Flutter và Dart.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>20 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>2.9K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Dart language basics</li>
                                <li>• Widgets và Layouts</li>
                                <li>• State management</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Video 6 -->
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center">
                            <button class="play-button w-16 h-16 rounded-full flex items-center justify-center">
                                <i data-feather="play" class="w-8 h-8 text-gray-700 ml-1"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">12 videos</span>
                        </div>
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Cơ bản</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Git & GitHub Mastery</h3>
                        <p class="text-gray-600 mb-4">Làm chủ version control với Git và collaboration trên GitHub.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                <span>8 giờ</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="users" class="w-4 h-4 mr-1"></i>
                                <span>3.5K views</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Git commands và workflow</li>
                                <li>• Branching và merging</li>
                                <li>• GitHub actions và CI/CD</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem playlist
                            <i data-feather="play-circle" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                    Xem thêm playlist
                </button>
            </div>
        </div>
    </section>

    <!-- Learning Paths -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Lộ trình học tập</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Các lộ trình học tập được thiết kế có hệ thống từ cơ bản đến chuyên sâu</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-8">
                    <!-- Path 1 -->
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl" data-aos="fade-right">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Frontend Developer</h3>
                                <p class="text-gray-600 mb-4">HTML/CSS → JavaScript → React → Advanced Topics</p>
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">35 videos</span>
                                    <span class="text-sm text-gray-500">40+ giờ</span>
                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">3 months</span>
                                </div>
                            </div>
                            <div class="ml-6">
                                <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Bắt đầu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Path 2 -->
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl" data-aos="fade-left">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Backend Developer</h3>
                                <p class="text-gray-600 mb-4">Python/Node.js → Database → API → DevOps</p>
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">42 videos</span>
                                    <span class="text-sm text-gray-500">50+ giờ</span>
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">4 months</span>
                                </div>
                            </div>
                            <div class="ml-6">
                                <a href="#" class="bg-green-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-green-700 transition">Bắt đầu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Path 3 -->
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 rounded-xl" data-aos="fade-right">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile Developer</h3>
                                <p class="text-gray-600 mb-4">Flutter/React Native → State Management → Publishing</p>
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm text-gray-500">28 videos</span>
                                    <span class="text-sm text-gray-500">30+ giờ</span>
                                    <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs">3 months</span>
                                </div>
                            </div>
                            <div class="ml-6">
                                <a href="#" class="bg-purple-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-purple-700 transition">Bắt đầu</a>
                            </div>
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
                    <div class="text-3xl md:text-4xl font-bold mb-2">200+</div>
                    <div class="text-blue-200">Video Tutorials</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl md:text-4xl font-bold mb-2">300+</div>
                    <div class="text-blue-200">Giờ nội dung</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl md:text-4xl font-bold mb-2">15K+</div>
                    <div class="text-blue-200">Lượt xem</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl md:text-4xl font-bold mb-2">20</div>
                    <div class="text-blue-200">Lộ trình học</div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
