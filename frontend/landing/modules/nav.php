<body>
    <div class="hidden md:flex space-x-6">
        <a href="index.php" 
        class="<?= ($page=='index') ? 'text-blue-600 font-medium active' : 'text-gray-600 hover:text-blue-600 transition' ?>">
        Trang chủ
        </a>

        <a href="ebook-lap-trinh.php" 
        class="<?= ($page=='ebook') ? 'text-blue-600 font-medium active' : 'text-gray-600 hover:text-blue-600 transition' ?>">
        E-book Lập trình
        </a>

        <a href="tap-chi-tin-hoc.php" 
        class="<?= ($page=='tapchi') ? 'text-blue-600 font-medium active' : 'text-gray-600 hover:text-blue-600 transition' ?>">
        Tạp chí Tin học
        </a>

        <a href="video-tutorial.php" 
        class="<?= ($page=='video') ? 'text-blue-600 font-medium active' : 'text-gray-600 hover:text-blue-600 transition' ?>">
        Video Tutorial
        </a>
    </div>
</body>