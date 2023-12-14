<?php
// Mã xử lý của bạn ở đây
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departmentId = $_POST['departmentId'];
    $departmentName = $_POST['departmentName'];
    $departmentDescription = $_POST['departmentDescription'];

    // Xử lý cập nhật thông tin phòng ban ở đây

    // Ví dụ: Update thông tin phòng ban vào database
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "102210132_thong";

    $connect = new mysqli($dbhost, $dbuser, $dbpass, $db);

    if ($connect->connect_error) {
        die("Không kết nối: " . $connect->connect_error);
    }

    $updateDepartmentSql = "UPDATE PHONGBAN SET TenPB='$departmentName', Mota='$departmentDescription' WHERE IDPB='$departmentId'";

    if ($connect->query($updateDepartmentSql) === TRUE) {
        echo "Đã cập nhật thông tin phòng ban thành công.";
    } else {
        echo "Lỗi khi cập nhật thông tin phòng ban: " . $connect->error;
    }

    $connect->close();
}
?>