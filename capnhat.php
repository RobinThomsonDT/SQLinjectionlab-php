<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật thông tin phòng ban</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
    }

    form {
        width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    label,
    input {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="submit"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        margin-top: 20px;
        background-color: #333;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
    </style>
</head>

<body>
    <h1>Cập nhật thông tin phòng ban</h1>

    <?php include 'xulycapnhat.php'; ?>

    <form method="POST" action="">
        <label for="departmentId">Mã phòng ban:</label>
        <input type="text" name="departmentId" id="departmentId" required>

        <label for="departmentName">Tên phòng ban:</label>
        <input type="text" name="departmentName" id="departmentName" required>

        <label for="departmentDescription">Mô tả:</label>
        <input type="text" name="departmentDescription" id="departmentDescription" required>

        <input type="submit" value="Cập nhật">
    </form>
</body>

</html>