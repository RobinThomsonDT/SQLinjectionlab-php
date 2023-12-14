<!DOCTYPE html>
<html>
<style>
table {
    width: 750px;
    border-collapse: collapse;
    margin: 50px auto;
}

/* Zebra striping */
tr:nth-of-type(odd) {
    background: #eee;
}

th {
    background: #3498db;
    color: white;
    font-weight: bold;
}

td,
th {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
    font-size: 18px;
}

/* 
    Max width before this PARTICULAR table gets nasty
    This query will take effect for any screen smaller than 760px
    and also iPads specifically.
    */
@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

    table {
        width: 100%;
    }

    /* Force table to not be like tables anymore */
    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr {
        border: 1px solid #ccc;
    }

    td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
    }

    td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        /* Label the data */
        content: attr(data-column);

        color: #000;
        font-weight: bold;
    }

}
</style>

<body>

    <h1>Bai tap luyen them</h1>

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

    // Xử lý xóa khi form được gửi đi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employeesToDelete = $_POST['employeesToDelete'];

        if (empty($employeesToDelete)) {
            echo "Vui lòng chọn ít nhất một nhân viên để xóa.";
        } else {
            $employeeIds = implode(",", $employeesToDelete);
            // Xây dựng câu truy vấn xóa các nhân viên đã chọn
            $sql = "DELETE FROM NHANVIEN WHERE IDNV IN ($employeeIds)";
            if ($connect->query($sql) === TRUE) {
                echo "Đã xóa thành công các nhân viên đã chọn.";
            } else {
                echo "Lỗi khi xóa nhân viên: " . $connect->error;
            }
        }
    }

    // Hiển thị biểu mẫu xóa
    echo '
    <form method="POST" action="">
        <table>
            <tr>
                <th></th>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Mã phòng ban</th>
                <th>Địa chỉ</th>
            </tr>';

    // Lấy dữ liệu nhân viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM NHANVIEN";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="employeesToDelete[]" value="' . $row['IDNV'] . '"></td>';
            echo '<td>' . $row['IDNV'] . '</td>';
            echo '<td>' . $row['Hoten'] . '</td>';
            echo '<td>' . $row['IDPB']. '</td>';
            echo '<td>' . $row['Diachi'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">Không có dữ liệu nhân viên.</td></tr>';
    }

    echo '
        </table>
        <input type="submit" value="Xóa nhân viên">
    </form>';

    // Đóng kết nối
    $connect->close();

    ?>

</body>

</html>