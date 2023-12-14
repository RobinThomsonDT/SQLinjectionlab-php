<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "102210132_thong";

$connect = new mysqli($dbhost, $dbuser, $dbpass, $db);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối: " . $connect->connect_error);
    exit();
}

// Xử lý tìm kiếm khi form được gửi đi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchCriteria = $_POST['searchCriteria'];
    $keyword = $_POST['keyword'];

    if (empty($keyword)) {
        echo "Vui lòng nhập từ khóa tìm kiếm.";
    } else {
        // Xây dựng câu truy vấn dựa trên tiêu chí tìm kiếm được chọn
      //  $sql = "SELECT * FROM NHANVIEN WHERE $searchCriteria LIKE '%$keyword%'";
      $sql = "SELECT * FROM NHANVIEN WHERE IDNV ='$keyword'";
        $result = $connect->query($sql);
        // Kiểm tra và hiển thị kết quả
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Mã nhân viên</th><th>Họ tên</th><th>Mã phòng ban</th><th>Địa chỉ</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["IDNV"] . "</td><td>" . $row["Hoten"] . "</td><td>" . $row["IDPB"] . "</td><td>" . $row["Diachi"] . "</td></tr> ";
            }
            echo "</table>";
        } else {
            echo "Không có kết quả tìm kiếm.";
        }
    }
}

// Hiển thị biểu mẫu tìm kiếm
echo '
<form method="POST" action="">
    <label for="searchCriteria">Tiêu chí tìm kiếm:</label>
    <select name="searchCriteria" id="searchCriteria">
        <option value="IDNV">IDNV</option>
        <option value="IDPB">IDPB</option>
        <option value="Hoten">Họ tên</option>
        <option value="Diachi">Địa chỉ</option>
    </select>
    <br>
    <label for="keyword">Từ khóa:</label>
    <input type="text" name="keyword" id="keyword">
    <br>
    <input type="submit" value="Tìm kiếm">
</form>';

// Đóng kết nối MySQL
$connect->close();

?>