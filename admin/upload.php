<?php
// Thêm đường dẫn đến autoloader của Composer
require 'vendor/autoload.php';
// Thêm ở đầu file // Cần cài đặt thư viện phpoffice/phpspreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'titcdhsphedu_itc';
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel'])) {
    $filePath = $_FILES['excel']['tmp_name'];
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray(null, true, true, true);

    // Lấy header
    $headers = array_map(function($h){ return preg_replace('/[^a-zA-Z0-9_]/','_', $h); }, $rows[1]);
    $tableName = 'members_' . time();

    // Tạo bảng
    $cols = implode(',', array_map(fn($h)=>"`$h` TEXT", $headers));
    $conn->query("CREATE TABLE `$tableName` ($cols)");

    // Chèn dữ liệu
    for ($i=2; $i<=count($rows); $i++) {
        $values = array_map(fn($v)=>$conn->real_escape_string($v), $rows[$i]);
        $vals = "'" . implode("','", $values) . "'";
        $conn->query("INSERT INTO `$tableName` (`" . implode('`,`', $headers) . "`) VALUES ($vals)");
    }
    echo "Đã lưu dữ liệu vào bảng $tableName";
    exit;
}
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Upload dữ liệu thành viên</title>
  <style>
    body{font-family:sans-serif;max-width:600px;margin:30px auto;padding:20px}
    .card{border:1px solid #ccc;border-radius:10px;padding:20px;box-shadow:0 2px 6px #eee}
    input[type=file]{margin-top:10px}
    .btn{padding:8px 12px;background:#007bff;color:#fff;border:none;border-radius:8px;margin-top:12px;cursor:pointer}
    .muted{color:#666;font-size:14px}
    .columns{margin-top:10px;display:flex;flex-wrap:wrap;gap:10px}
    label.col{border:1px solid #ddd;padding:4px 8px;border-radius:6px;background:#f9f9f9;cursor:pointer}
  </style>
</head>
<body>
  <h2>Upload dữ liệu Excel</h2>
  <div class="card">
    <form method="post" enctype="multipart/form-data">
      <p>Chọn file Excel (.xlsx hoặc .xls)</p>
      <input type="file" name="excel" accept=".xlsx,.xls" required>
      <button type="submit">Lưu vào database</button>
    </form>
  </div>
</body>
</html>
