<?php
    $page = "tapchi";
    $page_title = "Tạp chí Tin học - CLB Tin Học";
    include "modules/head.php";
?>

<?php include "modules/nav.php"; ?>
    

    <!-- Hero Section -->
    <section class="hero-section text-white pt-36 pb-16">
        <div class="container mx-auto px-6 py-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="mb-6">
                    <i data-feather="file-text" class="w-16 h-16 mx-auto text-white mb-4"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Tạp chí Tin học</h1>
                <p class="text-xl mb-8">Ấn phẩm chuyên sâu về công nghệ thông tin và xu hướng phát triển</p>
                <div class="flex justify-center space-x-4">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">Xuất bản hàng quý</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">12 Số/năm</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">5000+ Độc giả</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Về Tạp chí Tin học ITC</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Tạp chí Tin học ITC là ấn phẩm chính thức của CLB Tin Học, được xuất bản định kỳ hàng quý với mục tiêu 
                        chia sẻ kiến thức, tin tức và xu hướng mới nhất trong lĩnh vực công nghệ thông tin. Tạp chí là nơi 
                        gặp gỡ của các chuyên gia, nghiên cứu viên, sinh viên và những người đam mê công nghệ.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                    <div data-aos="fade-right">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Sứ mệnh</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i data-feather="check" class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Phổ biến kiến thức công nghệ thông tin đến cộng đồng</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check" class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Cập nhật xu hướng và công nghệ mới</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check" class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Kết nối chuyên gia và người học</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check" class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Thúc đẩy nghiên cứu và phát triển</span>
                            </li>
                        </ul>
                    </div>
                    <div data-aos="fade-left">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Nội dung chính</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i data-feather="trending-up" class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Tin tức công nghệ và xu hướng thị trường</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="code" class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Hướng dẫn lập trình và phát triển phần mềm</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="cpu" class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Đánh giá sản phẩm và giải pháp công nghệ</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="users" class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0"></i>
                                <span>Phỏng vấn chuyên gia và startup</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Issues -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Số phát hành gần đây</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Khám phá những số mới nhất với nội dung chất lượng và thông tin hữu ích</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Issue 1 - Latest -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="relative">
                        <div class="h-64 bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                            <div class="text-center text-white">
                                <h3 class="text-3xl font-bold mb-2">Số 45</h3>
                                <p class="text-lg">Q4 2024</p>
                                <i data-feather="star" class="w-8 h-8 mx-auto mt-4"></i>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="issue-badge text-white px-3 py-1 rounded-full text-xs font-medium">MỚI NHẤT</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">AI và Tương lai Lập trình</h3>
                        <p class="text-gray-600 mb-4">Khám phá cách AI đang thay đổi ngành lập trình và những kỹ năng cần thiết cho tương lai.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/12/2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>48 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• ChatGPT và coding assistant</li>
                                <li>• Machine Learning trong thực tế</li>
                                <li>• Phỏng vấn CEO startup AI</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Issue 2 -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-64 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-3xl font-bold mb-2">Số 44</h3>
                            <p class="text-lg">Q3 2024</p>
                            <i data-feather="globe" class="w-8 h-8 mx-auto mt-4"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Web 3.0 và Blockchain</h3>
                        <p class="text-gray-600 mb-4">Tìm hiểu về web phi tập trung, NFT, DeFi và những ứng dụng thực tế của blockchain.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/09/2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>52 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Smart Contract với Solidity</li>
                                <li>• DApps development</li>
                                <li>• Cryptocurrency mining</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Issue 3 -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-64 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-3xl font-bold mb-2">Số 43</h3>
                            <p class="text-lg">Q2 2024</p>
                            <i data-feather="smartphone" class="w-8 h-8 mx-auto mt-4"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile App Development 2024</h3>
                        <p class="text-gray-600 mb-4">Xu hướng phát triển ứng dụng di động với React Native, Flutter và native development.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/06/2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>44 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Flutter vs React Native</li>
                                <li>• App Store Optimization</li>
                                <li>• Mobile UI/UX trends</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Issue 4 -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <div class="h-64 bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-3xl font-bold mb-2">Số 42</h3>
                            <p class="text-lg">Q1 2024</p>
                            <i data-feather="shield" class="w-8 h-8 mx-auto mt-4"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Cybersecurity & Data Protection</h3>
                        <p class="text-gray-600 mb-4">Bảo mật mạng, bảo vệ dữ liệu cá nhân và các mối đe dọa an ninh mạng hiện tại.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/03/2024</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>56 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• GDPR compliance</li>
                                <li>• Ethical hacking</li>
                                <li>• Zero Trust Architecture</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Issue 5 -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-64 bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-3xl font-bold mb-2">Số 41</h3>
                            <p class="text-lg">Q4 2023</p>
                            <i data-feather="cloud" class="w-8 h-8 mx-auto mt-4"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Cloud Computing & DevOps</h3>
                        <p class="text-gray-600 mb-4">Điện toán đám mây, containerization với Docker, Kubernetes và CI/CD pipeline.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/12/2023</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>50 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• AWS vs Azure vs GCP</li>
                                <li>• Docker containers</li>
                                <li>• Microservices architecture</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Issue 6 -->
                <div class="magazine-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-64 bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-3xl font-bold mb-2">Số 40</h3>
                            <p class="text-lg">Q3 2023</p>
                            <i data-feather="monitor" class="w-8 h-8 mx-auto mt-4"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Frontend Frameworks 2023</h3>
                        <p class="text-gray-600 mb-4">So sánh React, Vue, Angular và những framework frontend mới nổi trong năm 2023.</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                <span>15/09/2023</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i data-feather="file" class="w-4 h-4 mr-1"></i>
                                <span>46 trang</span>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="text-sm text-gray-700 font-medium">Nội dung chính:</div>
                            <ul class="text-sm text-gray-600 space-y-1 pl-4">
                                <li>• Next.js 13 features</li>
                                <li>• Vue 3 Composition API</li>
                                <li>• Angular standalone components</li>
                            </ul>
                        </div>
                        <a href="#" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Đọc online
                            <i data-feather="external-link" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                    Xem tất cả số phát hành
                </button>
            </div>
        </div>
    </section>

    <!-- Subscription Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Đăng ký nhận tạp chí</h2>
                <p class="text-xl mb-8">Nhận thông báo mỗi khi có số mới và các nội dung độc quyền</p>
                <div class="max-w-md mx-auto">
                    <div class="flex">
                        <input type="email" placeholder="Nhập email của bạn" class="flex-1 px-4 py-3 rounded-l-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button class="bg-blue-800 px-6 py-3 rounded-r-lg hover:bg-blue-900 transition duration-300 font-medium">
                            Đăng ký
                        </button>
                    </div>
                    <p class="text-sm text-blue-200 mt-2">Hoàn toàn miễn phí và có thể hủy bất cứ lúc nào</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center mt-16">
                <div data-aos="fade-up">
                    <div class="text-3xl md:text-4xl font-bold mb-2">45</div>
                    <div class="text-blue-200">Số phát hành</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl md:text-4xl font-bold mb-2">5000+</div>
                    <div class="text-blue-200">Độc giả</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl md:text-4xl font-bold mb-2">50+</div>
                    <div class="text-blue-200">Tác giả</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl md:text-4xl font-bold mb-2">12</div>
                    <div class="text-blue-200">Năm hoạt động</div>
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
                    <h4 class="font-bold mb-4">Tạp chí</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Số mới nhất</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kho lưu trữ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Đăng ký</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Đóng góp bài viết</a></li>
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
                        <li><a href="ebook-lap-trinh.html" class="text-gray-400 hover:text-white transition">E-book Lập trình</a></li>
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
        });

        feather.replace();
    </script>

<?php include "modules/footer.php"; ?>
</html>
