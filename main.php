<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    nav {
        background-color: #f4f4f4;
        padding: 10px 0;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    li a {
        text-decoration: none;
        color: #333;
        padding: 8px 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    li a:hover {
        background-color: #333;
        color: #fff;
    }

    #content {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    </style>
    <script>
    function navigateTo(page) {
        window.location.href = page;
    }
    </script>
</head>

<body>
    <header>
        <h1>Trang chủ</h1>
    </header>

    <nav>
        <ul>
            <li><a href="xemNV.php">Xem nhân viên</a></li>
            <li><a href="xemPB.php">Xem phòng ban</a></li>

            <?php
            session_start();
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                // Hiển thị các chức năng khác cho người dùng đã đăng nhập
                echo '<li><a href="timkiem.php">Tìm kiếm</a></li>';
                echo '<li><a href="chen.php">Chèn</a></li>';
                echo '<li><a href="capnhat.php">Cập nhật</a></li>';
                echo '<li><a href="xoaNV.php">Xóa</a></li>';
                echo '<li><a href="logout.php">Đăng xuất</a></li>';
            } else {
                // Hiển thị mục "Đăng nhập" khi chưa đăng nhập
                echo '<li><a href="login.php">Đăng nhập</a></li>';
            }
            ?>
        </ul>
    </nav>

    <div id="content">
        <!-- Nội dung của trang sẽ được chèn vào đây -->
    </div>

</body>

</html>