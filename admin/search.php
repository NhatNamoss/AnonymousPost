<?php
// Kết nối database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'titcdhsphedu_itc';
$conn = new mysqli($host, $user, $pass, $db);

// Xử lý AJAX request
if(isset($_GET['search'])) {
    $q = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM members WHERE CONCAT(ho_dem, ' ', ten) LIKE '%$q%'";
    $result = $conn->query($sql);
    
    $data = [];
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode(['count' => count($data), 'data' => $data]);
    exit;
}
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tìm mã thành viên</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-4">
    <h2 class="mb-4">Tìm mã thành viên</h2>

    <div class="input-group mb-3">
      <input type="text" id="q" class="form-control" placeholder="Nhập tên">
      <button id="btn" class="btn btn-success">Tìm</button>
    </div>

    <div id="result" class="text-muted">Chưa có kết quả.</div>
  </div>

  <script>
    document.getElementById('btn').onclick = doSearch;
    document.getElementById('q').addEventListener('keydown', e => {
      if(e.key === 'Enter') doSearch();
    });

    function doSearch() {
      const q = document.getElementById('q').value.trim();
      const resultDiv = document.getElementById('result');
      
      if(!q) {
        resultDiv.textContent = 'Vui lòng nhập tên.';
        return;
      }
      
      // Hiển thị đang tải
      resultDiv.textContent = 'Đang tìm kiếm...';
      
      // Gửi request AJAX đến server
      fetch(`search.php?search=${encodeURIComponent(q)}`)
        .then(response => response.json())
        .then(data => {
          if(data.count === 0) {
            resultDiv.textContent = 'Không tìm thấy bản ghi nào.';
            return;
          }
          
          // Hiển thị kết quả
          const headers = Object.keys(data.data[0]);
          let html = `<div class="mb-2 fw-semibold">Tìm thấy ${data.count} kết quả</div>`;
          html += `<div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                      <thead class="table-light">
                        <tr>${headers.map(h => `<th>${h}</th>`).join('')}</tr>
                      </thead>
                      <tbody>`;
                      
          data.data.forEach(row => {
            html += `<tr class="table-success">
                      ${headers.map(h => `<td>${row[h]}</td>`).join('')}
                    </tr>`;
          });
          html += '</tbody></table></div>';
          resultDiv.innerHTML = html;
        })
        .catch(error => {
          resultDiv.textContent = 'Lỗi khi tìm kiếm: ' + error.message;
        });
    }
  </script>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
