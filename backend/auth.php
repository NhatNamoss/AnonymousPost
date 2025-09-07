<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

if(isset($_GET['type'])) {
    if($_GET['type'] == 'verify' && isset($_GET['token'])) {
        $token = $_GET['token'];
        if(!check_rows('users', 'Token', $token)) exit;
        $user = $KNCMS->query("UPDATE `users` SET `Token` = 'Verified' WHERE `Token` = '$token'");
        die('<script type="text/javascript">setTimeout(function(){ location.href = "' . hUrl('Home') . '" },' . 1000 . ');</script>');
    }
    if($_GET['type'] == 'forgot_password' && isset($_GET['token'])) {
        $token = $_GET['token'];
        if(!check_rows('users', 'Token', $token)) exit;
        $user = $KNCMS->get_row("SELECT * FROM users WHERE Token = '$token'");
        if($user) {
            // Redirect to password reset page
            die('<script type="text/javascript">setTimeout(function(){ location.href = "' . hUrl('ResetPassword/' . $token) . '" },' . 1000 . ');</script>');
        } else {
            die('<script type="text/javascript">alert("Mã xác thực không hợp lệ!");</script>');
        }
    }
}

if(isset($_POST['email']) && isset($_POST['type'])) {
    $email = $_POST['email'];
    $type = $_POST['type'];

    if($type == 'forgot_password') {
        if(check_rows('users', 'Email', $email)) {
            $user = $KNCMS->get_row("SELECT * FROM users WHERE Email = '".$KNCMS->escape($email)."'");
            $token = md5($email . time());
            $KNCMS->query("UPDATE users SET Token = '$token', `ForgotPwd` = '1' WHERE Email = '" . $KNCMS->escape($email) . "'");
            sendAuthMail("Khôi phục mật khẩu", $email, $token, $user['Username'], 
            'Bạn vừa yêu cầu khôi phục mật khẩu. Vui lòng nhấn vào nút bên dưới để xác thực email.', 
            hUrl('ForgotPassword/' . $token));
            echo json_encode(['status' => 1, 'msg' => 'Mã khôi phục đã được gửi đến email của bạn.']);
        } else {
            echo json_encode(['status' => 0, 'msg' => 'Email không tồn tại!']);
        }
    }
    exit;
}
