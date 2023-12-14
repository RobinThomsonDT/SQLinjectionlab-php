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

// Xử lý khi form chèn thông tin nhân viên hoặc phòng ban được gửi đi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['employeeId'])) {
        // Xử lý chèn thông tin nhân viên
        $employeeId = $_POST['employeeId'];
        $employeeName = $_POST['employeeName'];
        $departmentId = $_POST['departmentId'];
        $address = $_POST['address'];

        // Xây dựng câu truy vấn chèn thông tin nhân viên
        $insertEmployeeSql = "INSERT INTO NHANVIEN (IDNV, Hoten, IDPB, Diachi) VALUES ('$employeeId', '$employeeName', '$departmentId', '$address')";

        if ($connect->query($insertEmployeeSql) === TRUE) {
            echo "Đã chèn thông tin nhân viên thành công.";
        } else {
            echo "Lỗi khi chèn thông tin nhân viên: " . $connect->error;
        }
    } elseif (isset($_POST['departmentId'])) {
        // Xử lý chèn thông tin phòng ban
        $departmentId = $_POST['departmentId'];
        $departmentName = $_POST['departmentName'];
        $departmentDescription = $_POST['departmentDescription'];

        // Xây dựng câu truy vấn chèn thông tin phòng ban
        $insertDepartmentSql = "INSERT INTO PHONGBAN (IDPB, TenPB, Mota) VALUES ('$departmentId', '$departmentName', '$departmentDescription')";

        if ($connect->query($insertDepartmentSql) === TRUE) {
            echo "Đã chèn thông tin phòng ban thành công.";
        } else {
            echo "Lỗi khi chèn thông tin phòng ban: " . $connect->error;
        }
    }
}

// Đóng kết nối
$connect->close();

?>