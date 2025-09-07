
<!-- Main Content -->
<div class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-12 gap-6">
    <!-- Left Sidebar -->
    <div class="md:col-span-3 space-y-4 hidden md:block">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                    <i data-feather="user"></i>
                </div>
                <div class="font-medium">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo htmlspecialchars($_SESSION['username']);
                    } else {
                        echo 'Anonymous User';
                    }
                    ?>
                </div>
            </div>
            <div class="space-y-2">
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-100">
                    <i data-feather="home" class="text-blue-500"></i>
                    <span>Home</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-100">
                    <i data-feather="compass" class="text-blue-500"></i>
                    <span>Explore</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-100">
                    <i data-feather="bookmark" class="text-blue-500"></i>
                    <span>Saved</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-100">
                    <i data-feather="settings" class="text-blue-500"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>
    </div>