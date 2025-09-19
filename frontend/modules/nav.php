<!-- Navigation Bar -->
<nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/Main" class="text-xl font-bold text-blue-600">CLB Tin Học</a>
            </div>
            
            <!-- Menu Items -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/Main" class="text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'main') ? 'text-blue-600 font-medium' : ''; ?>">Trang chủ</a>
                <a href="/Ebook" class="text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'ebook') ? 'text-blue-600 font-medium' : ''; ?>">E-books</a>
                <a href="/Video" class="text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'video') ? 'text-blue-600 font-medium' : ''; ?>">Video</a>
                <a href="/TapChi" class="text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'tapchi') ? 'text-blue-600 font-medium' : ''; ?>">Tạp chí</a>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Đăng nhập</a>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-600">
                    <i data-feather="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-lg hidden">
        <div class="px-6 py-4 space-y-2">
            <a href="/Main" class="block text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'main') ? 'text-blue-600 font-medium' : ''; ?>">Trang chủ</a>
            <a href="/Ebook" class="block text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'ebook') ? 'text-blue-600 font-medium' : ''; ?>">E-books</a>
            <a href="/Video" class="block text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'video') ? 'text-blue-600 font-medium' : ''; ?>">Video</a>
            <a href="/TapChi" class="block text-gray-700 hover:text-blue-600 transition <?php echo (isset($page) && $page == 'tapchi') ? 'text-blue-600 font-medium' : ''; ?>">Tạp chí</a>
            <a href="#" class="block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-center">Đăng nhập</a>
        </div>
    </div>
</nav>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>