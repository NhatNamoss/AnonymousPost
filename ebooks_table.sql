-- Tạo bảng ebooks để lưu trữ thông tin sách điện tử
CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `category` varchar(100) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu
INSERT INTO `ebooks` (`title`, `description`, `category`, `author`, `pages`, `cover_image`, `file_path`, `download_count`) VALUES
('Python từ Cơ bản đến Nâng cao', 'Hướng dẫn toàn diện về Python, bao gồm syntax, OOP, web development với Django và Flask.', 'Python', 'ITC Team', 342, NULL, NULL, 0),
('JavaScript Modern ES6+', 'Học JavaScript hiện đại với ES6+, bao gồm async/await, modules, và các framework phổ biến.', 'JavaScript', 'Nguyễn Văn A', 256, NULL, NULL, 0),
('Java Spring Boot Thực hành', 'Xây dựng ứng dụng web và API với Spring Boot, Spring Security và Spring Data JPA.', 'Java', 'Trần Thị B', 428, NULL, NULL, 0),
('C++ và Thuật toán', 'Nắm vững C++ và các thuật toán cơ bản, cấu trúc dữ liệu cho lập trình viên.', 'C++', 'Lê Văn C', 398, NULL, NULL, 0),
('Flutter & Dart cho Mobile', 'Phát triển ứng dụng di động đa nền tảng với Flutter và ngôn ngữ Dart.', 'Mobile', 'Phạm Thị D', 312, NULL, NULL, 0),
('SQL và Quản lý CSDL', 'Hướng dẫn chi tiết về SQL, thiết kế cơ sở dữ liệu và tối ưu hóa truy vấn.', 'Database', 'ITC Database Team', 286, NULL, NULL, 0);