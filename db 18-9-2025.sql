CREATE TABLE users (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    MaTK VARCHAR(50) UNIQUE,
    MK VARCHAR(100),
    ho_dem VARCHAR(100),
    ten VARCHAR(50),
    lop_khoa VARCHAR(100),
    ma_ban VARCHAR(2),
    ban VARCHAR(100),
    fullname VARCHAR(150)
);