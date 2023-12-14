<!DOCTYPE html>
<html>

<head>
    <title>Trang Đăng nhập</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .error {
        color: red;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form action="xulylogin.php" method="POST">
            <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
            <?php } ?>
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>

</html>