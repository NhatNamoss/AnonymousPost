<?php
    $page = "main";
    $page_title = "CLB Tin Học - ITC GEN 3.0";
    include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
    include "modules/head.php";
?>

<?php include "modules/nav.php"; ?>
    <!-- Hero Section -->
    <section id="hero" class="hero-section text-white min-h-screen flex items-center relative overflow-hidden pt-16">
        <div id="vanta-globe" class="absolute inset-0"></div>
        <div class="container mx-auto px-6 relative z-10 py-20">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">ITC GEN 3.0</h1>
                <p class="text-xl md:text-2xl mb-8">Kết sức mạnh - Nối tri thức</p>
                <div class="flex justify-center space-x-4">
                    <a href="#about" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300">Đăng Nhập</a>
                    <a href="#publications" class="border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-blue-600 transition duration-300">Nổi bật</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hành trình phát triển</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">CLB Tin Học đã trải qua nhiều giai đoạn phát triển với những dấu mốc quan trọng</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="relative">
                    <!-- Timeline Item 1 -->
                    <div class="timeline-item mb-12 pl-8 relative" data-aos="fade-right">
                        <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-blue-200"></div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Giai đoạn thành lập (XXXX)</h3>
                        <p class="text-gray-600">Text Here.</p>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="timeline-item mb-12 pl-8 relative" data-aos="fade-left">
                        <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-blue-200"></div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Giai đoạn phát triển (XXXX - XXXX)</h3>
                        <p class="text-gray-600">Text Here</p>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="timeline-item mb-12 pl-8 relative" data-aos="fade-right">
                        <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-blue-200"></div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Giai đoạn bứt phá (XXXX - XXXX)</h3>
                        <p class="text-gray-600">Text Here</p>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="timeline-item pl-8 relative" data-aos="fade-left">
                        <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-blue-200"></div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Giai đoạn hiện tại (XXXX - XXXX)</h3>
                        <p class="text-gray-600">Text Here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Publications Section -->
    <section id="publications" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nổi bật</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Những sản phẩm tri thức được CLB Tin Học nghiên ccứu và phát triển</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Publication 1 -->
                <div class="publication-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in">
                    <img src="http://static.photos/technology/640x360/1" alt="Tạp chí công nghệ" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Tạp chí Tin Học</h3>
                        <p class="text-gray-600 mb-4">Xuất bản hàng quý với các bài viết chuyên sâu về công nghệ mới, xu hướng phát triển và chia sẻ từ chuyên gia.</p>
                        <a href="/TapChi" class="text-blue-500 font-medium inline-flex items-center">
                            Xem thêm
                            <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Publication 2 -->
                <div class="publication-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <img src="http://static.photos/education/640x360/2" alt="E-book lập trình" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">E-book Lập trình</h3>
                        <p class="text-gray-600 mb-4">Bộ sách điện tử tổng hợp kiến thức từ cơ bản đến nâng cao về các ngôn ngữ lập trình phổ biến.</p>
                        <a href="/Ebook" class="text-blue-500 font-medium inline-flex items-center">
                            Xem thêm
                            <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Publication 3 -->
                <div class="publication-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <img src="http://static.photos/workspace/640x360/3" alt="Video tutorial" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Video Tutorial</h3>
                        <p class="text-gray-600 mb-4">Thư viện video hướng dẫn thực hành với các dự án thực tế, phù hợp cho người mới bắt đầu.</p>
                        <a href="/Video" class="text-blue-500 font-medium inline-flex items-center">
                            Xem thêm
                            <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Bạn muốn tham gia CLB Tin Học?</h2>
                <p class="text-xl mb-8">Hãy trở thành một phần của cộng đồng công nghệ năng động và sáng tạo</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300">Đăng ký ngay</a>
                    <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-lg font-medium hover:bg-white hover:text-blue-600 transition duration-300">Liên hệ</a>
                </div>
            </div>
        </div>
    </section>
    
<?php include "modules/footer.php"; ?>