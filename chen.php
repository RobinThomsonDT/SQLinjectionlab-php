<!DOCTYPE html>
<html>
<style>
form {
    width: 400px;
    margin: 50px auto;
}

label,
input {
    display: block;
    margin-bottom: 10px;
}

input[type="submit"] {
    margin-top: 20px;
}
</style>

<body>

    <h2>Chèn thông tin nhân viên:</h2>

    <form method="POST" action="xulychen.php">
        <label for="employeeId">Mã nhân viên:</label>
        <input type="text" name="employeeId" id="employeeId" required>

        <label for="employeeName">Họ tên:</label>
        <input type="text" name="employeeName" id="employeeName" required>

        <label for="departmentId">Mã phòng ban:</label>
        <input type="text" name="departmentId" id="departmentId" required>

        <label for="address">Địa chỉ:</label>
        <input type="text" name="address" id="address" required>

        <input type="submit" value="Chèn thông tin nhân viên">
    </form>

    <h2>Chèn thông tin phòng ban:</h2>

    <form method="POST" action="xulychen.php">
        <label for="departmentId">Mã phòng ban:</label>
        <input type="text" name="departmentId" id="departmentId" required>

        <label for="departmentName">Tên phòng ban:</label>
        <input type="text" name="departmentName" id="departmentName" required>

        <label for="departmentDescription">Mô tả:</label>
        <input type="text" name="departmentDescription" id="departmentDescription" required>

        <input type="submit" value="Chèn thông tin phòng ban">
    </form>

</body>

</html>