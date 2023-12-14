<?php
session_start();

// Xử lý đăng nhập khi nhấn nút "Đăng nhập"
if (isset($_POST['submit'])) {
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "102210132_thong";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lấy thông tin log
    $ip = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $time = date("Y-m-d H:i:s");
    $path = $_SERVER['REQUEST_URI'];

    // Truy vấn kiểm tra tài khoản
    $sql = "SELECT username, password FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;

        // Ghi log vào bảng logs
        $logSql = "INSERT INTO logs (log_message, ip_address, user_agent, request_time, request_path, user_logged_in) 
            VALUES ('User logged in. Username: $username', '$ip', '$userAgent', '$time', '$path', TRUE)";
        $conn->query($logSql);

        // Chuyển hướng đến trang main.php
        header("Location: main.php");
        exit(); // Đảm bảo không có mã nào được thực hiện sau hàm header
    } else {
        // Đăng nhập thất bại
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng";
    }

    // Đóng kết nối
    $conn->close();
}
?>