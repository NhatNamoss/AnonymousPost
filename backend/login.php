<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$username || !$password) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ.']);
        exit;
    }

    $stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        echo json_encode(['success' => false, 'message' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
        exit;
    }

    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['success' => true]);
    exit;
}
?>

<!-- Simple HTML form -->
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
<form method="post">
    <input name="username" placeholder="Username"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
</body>
</html>