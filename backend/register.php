<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if (!$username || !$password) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ.']);
        exit;
    }
    if ($password !== $password2) {
        echo json_encode(['success' => false, 'message' => 'Mật khẩu không khớp.']);
        exit;
    }

    // check username exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Tên đăng nhập đã tồn tại.']);
        exit;
    }

    $pwHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $pwHash]);

    $_SESSION['user_id'] = $pdo->lastInsertId();
    echo json_encode(['success' => true]);
    exit;
}
?>

<!-- Simple HTML form if someone visits directly -->
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
<form method="post">
    <input name="username" placeholder="Username"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <input name="password2" type="password" placeholder="Confirm password"><br>
    <button type="submit">Register</button>
</form>
</body>
</html>