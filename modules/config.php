
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load file .env
$dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('Y-m-d h:i:z');
$timez = date('h:i');
session_start();
$base_url = $_ENV['APP_URL'] ?? 'http://localhost/';
$weblock = 0;
$admin_url = $base_url . 'admin/';
$sign = md5($timez);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once('include/Exception.php');
require_once('include/PHPMailer.php');
require_once('include/SMTP.php');
$license_day = "22-1-2023";
class KNCMS
{
    private $ketnoi;
    function ketnoi()
    {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']) or die('Vui lòng kết nối đến DATABASE');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function disketnoi()
    {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }

    function getUser($user)
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("SELECT * FROM `users` WHERE `Username` = '$user'")->fetch_array();
        return $row;
    }
    function getUserByID($uid)
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("SELECT * FROM `users` WHERE `id` = '$uid'")->fetch_array();
        return $row;
    }

    function getCharacter($char)
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("SELECT * FROM `players` WHERE `PlayerName` = '$char'")->fetch_array();
        return $row;
    }

    function getSite()
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("SELECT * FROM `kncms_settings`")->fetch_array();
        return $row;
    }
    function escape($str)
    {
        $this->ketnoi();
        return $this->ketnoi->real_escape_string($str);
    }
    function query($sql, $id = false)
    {
        $this->ketnoi();
        $sqlz = $sql;

        // echo $sqlz;
        $row = $this->ketnoi->query($sqlz);
        if (!$id) return $row;
        else return $this->ketnoi->insert_id;
    }
    function get_row($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    function num_rows($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    function get_list($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    function gettime()
    {
        return date('Y/m/d H:i:s', time());
    }
    function anti_text($text)
    {
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
        //$text=str_replace(" ","-", $text);
        $text = str_replace("--", "", $text);
        $text = str_replace("@", "", $text);
        $text = str_replace("/", "", $text);
        $text = str_replace("\\", "", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace("\"", "", $text);
        $text = str_replace("'", "", $text);
        $text = str_replace("<", "", $text);
        $text = str_replace(">", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace(".", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("$", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace("́", "", $text);
        $text = str_replace("̀", "", $text);
        $text = str_replace("̃", "", $text);
        $text = str_replace("̣", "", $text);
        $text = str_replace("̉", "", $text);
        $text = str_replace("*", "", $text);
        $text = str_replace("!", "", $text);
        $text = str_replace("%", "", $text);
        $text = str_replace("#", "", $text);
        $text = str_replace("^", "", $text);
        $text = str_replace("=", "", $text);
        $text = str_replace("+", "", $text);
        $text = str_replace("~", "", $text);
        $text = str_replace("`", "", $text);
        return $text;
    }


    function to_slug($str)
    {
        $str = trim($str);
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        // $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    function xoadau($strTitle)
    {
        $strTitle = strtolower($strTitle);
        $strTitle = trim($strTitle);
        $strTitle = str_replace(' ', '-', $strTitle);
        $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
        $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
        $strTitle = str_replace('đ', 'd', $strTitle);
        $strTitle = str_replace('Đ', 'd', $strTitle);
        $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
        return $strTitle;
    }
    function xoadauvn($str)
    {
        $unicode = [
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        ];

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }

        // Thay thế nhiều khoảng trắng thành một khoảng trắng
        $str = preg_replace('/\s+/', ' ', $str);

        return trim($str);
    }

    function format_cash($price)
    {
        return str_replace(",", ".", number_format($price));
    }
    function exitsql($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function curl_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);

        curl_close($ch);
        return $data;
    }
    function rows_sql($dataz)
    {
        if ($dataz->num_rows != 0) { // da co du lieu
            $kt = True;
        } else {
            $kt = False; // chua co du lieu
        }
        return $kt;
    }
    function msg_success($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thành Công", "' . $text . '","success");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
    function msg_error($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
    function msg_warning($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
}
$KNCMS = new KNCMS;
function capbac($data)
{
    if ($data == 1) return 'Thành Viên';
    if ($data == 2) return 'Nhân viên';
    else if ($data == 3) return 'Admin';
}
function getUserModel($user)
{
    $KNCMS = new KNCMS;
    $user_sql = $KNCMS->get_row("SELECT * FROM `players` WHERE `PlayerName` = '$user' ");
    $url = '/lib/model/skins/' . $user_sql['Skin'] . '';
    return $url;
}
function isLogin()
{
    if (isset($_SESSION['username'])) {
        $kiemtra = True;
    } else {
        $kiemtra = False;
    }
    return $kiemtra;
}

function ResetUserSesson($usernames)
{
    if (isLogin()) {
        $_SESSION['username'] = $usernames;
        header('location: ' . hUrl('Home'));
    }
}

function Logout($usernames)
{
    if (isLogin()) {
        $_SESSION['username'] = $usernames;
        header('location: ' . hUrl('Home'));
    }
}
if (isset($_SESSION['username'])) {
    $username = $KNCMS->anti_text($_SESSION['username']);
    $user_ss = $KNCMS->query("SELECT * FROM `users` WHERE `Username` = '$username'")->fetch_array();
    $uid = $user_ss['id'];
}
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if ($ip == "::1") {
        $ip = '127.0.0.1';
    }
    return $ip;
}
function TelegramLog($msg)
{
    global $time, $base_url;
    $badshbdfashjvfaasd = '7031089850:AAHaOZUn7BpGzIiyrn9J6eRSJDkqG27bloY';
    $fafasfasdafwfawfaw = '-4273094399';
    $log = $msg . ' | Thời gian ' . $time . ' @Tyler88200 @KhNguyenDev';
    $fafawfageewg = "https://api.telegram.org/bot$badshbdfashjvfaasd/sendMessage?chat_id=$fafasfasdafwfawfaw&text=" . $log;
    $gafasawfawfaw = file_get_contents($fafawfageewg);
    return $gafasawfawfaw;
}
function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung, $link = "", $btn = "")
{
    $mail = new PHPMailer();
    $smtp = new SMTP();
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'tls://smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kngyen205@gmail.com';                     //SMTP username
    $mail->Password   = 'mzyqwsoolydwnfup';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('MaztechWork@gmail.com', "uHelp");
    $mail->addAddress($mail_nhan, $ten_nhan);     //Add a recipient
    $mail->addReplyTo('maztechwork@gmail.com', 'Not Reply');
    $mail->addCC($mail_nhan);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $chu_de;
    $mail->Body    = MailHTML($ten_nhan, $chu_de, $noi_dung, $link, $btn);
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}
function check_rows($table, $field, $data)
{
    $KNCMS = new KNCMS;
    $querycheck  = $KNCMS->query("SELECT * FROM `$table` WHERE `$field` = '$data'");
    if ($querycheck->num_rows > 0) {
        return true;
    } else return false;
}

function hUrl($url)
{
    global $base_url;
    $new_url = str_replace("//", "/", $url);
    $new_url = $base_url . $url;
    return $new_url;
}

function XoaKiTuDacBiet($str)
{
    $pattern = '/[^\p{L}\p{N}\s]/u';
    $cleanedStr = preg_replace($pattern, '', $str);
    $cleanedStr = trim(preg_replace('/\s+/', ' ', $cleanedStr));
    return $cleanedStr;
}


if (isLogin()) {
    $userinfo = $KNCMS->getUser($_SESSION['username']);
    $uid = $userinfo['id'];
}
function LogUser($uid, $log)
{
    global $KNCMS, $time;
    $KNCMS->query("INSERT INTO `log` (uid, log, createdtime) VALUES ($uid, '$log', 'NOW()')");
}
function KNCMS_Log($text, $uid)
{
    $KNCMS = new KNCMS;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timezz = date('d-m-Y h:i:z');
    $text = $KNCMS->anti_text($text);
    return $KNCMS->query("INSERT INTO `log` SET 
    `log` = '$text', 
    `uid` = '$uid',
    `createdtime` = '$timezz'
    ");
    // UTF8Encodez($text);
}
function GetTransStatus($data)
{
    if ($data == 1) return '<span class="badge badge-success fs-7 fw-bold">Thành công</span>';
    else if ($data == 0) return '<span class="badge badge-warning7 fw-bold">Đợi duyệt</span>';
    else return '<span class="badge badge-error fs-7 fw-bold">Thất bại</span>';
}

// $setting = $KNCMS->query("SELECT * FROM `settings` LIMIT 1")->fetch_array();

function MailHTML($ten_nhan, $title, $content, $link = "", $btn = "")
{
    $noi_dung = '
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xác Thực Email</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: #fdf8e4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
            .header { background: #ffcc00; padding: 20px; text-align: center; color: #333; font-size: 22px; font-weight: bold; }
            .content { padding: 20px; text-align: center; color: #555; }
            .content p { font-size: 16px; line-height: 1.6; }
            .btn { display: inline-block; background: #ffcc00; color: #333; padding: 12px 25px; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px; margin-top: 20px; }
            .footer { padding: 15px; text-align: center; font-size: 14px; color: #777; background: #fdf8e4; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">' . $title . '</div>
            <div class="content">
                <p>Chào <strong>' . $ten_nhan . '</strong>,</p>
                <p>' . $content . ':</p>
                <a href="' . $link . '" class="btn">' . $btn . '</a>
                <p>Nếu bạn không yêu cầu điều này, hãy bỏ qua email này.</p>
            </div>
            <div class="footer">
                &copy; 2025 uHelp. Mọi quyền được bảo lưu.
            </div>
        </div>
    </body>
    </html>
    ';
    return $noi_dung;
}

function checkLogin()
{
    global $KNCMS;
    if (!isset($_SESSION['username'])) {
        return $KNCMS->msg_error("Bạn cần đăng nhập để thực hiện chức năng này.", hUrl('Login'), 3000);
    }
    return true;
}

$total_user = 100;
$total_order = 3000;

if (isLogin()) {
    if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
        $uinfo = $KNCMS->getUser($_SESSION['username']);
        if ($uinfo['Level'] == 3) {
            $_SESSION['Admin'] = true;
        }
    }
}

function checkAdmin()
{
    global $KNCMS;
    if (!isLogin()) {
        return $KNCMS->msg_error("Bạn cần đăng nhập để thực hiện chức năng này.", hUrl('Login'), 3000);
    }
    if (!isset($_SESSION['Admin']) || $_SESSION['Admin'] == true) return true;
    return false;
}
function statusOrder($status)
{
    if ($status == 0) return '<span class="badge badge-warning fs-7 fw-bold">Chờ dọn</span>';
    if ($status == 1) return '<span class="badge badge-warning fs-7 fw-bold">Đang dọn</span>';
    if ($status == 2) return '<span class="badge badge-success fs-7 fw-bold">Đã dọn</span>';
    if ($status == 3) return '<span class="badge badge-danger fs-7 fw-bold">Đã hủy</span>';

    if ($status == 99) return '<span class="badge badge-danger fs-7 fw-bold">Đang tìm nhân viên</span>';
    if ($status == 98) return '<span class="badge badge-danger fs-7 fw-bold">Nhân viên đã nhận</span>';
}
function mysql_escape($str)
{
    global $KNCMS;
    return $KNCMS->escape($str);
}


function getDateFromPackage($package)
{
    // echo $package;
    global $KNCMS;
    $pkg = check_rows('bookings', 'Package', $package);
    if ($pkg) {
        $pkg_data = $KNCMS->query("SELECT * FROM `services` WHERE `service` = '$package'")->fetch_array();
        return $pkg_data;
    }
    return false;
}


function sendAuthMail($chude ,$email, $code, $username, $content, $link = "")
{
    $mail = sendCSM(
        $email,
        $username,
        $chude,
        $content.'<br><b>Mã xác thực:'. $code,
        $link,
        "Xác thực"
    );
    return $mail;
}
