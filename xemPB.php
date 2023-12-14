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

    a {
        color: red;
        text-decoration: none;
    }
}
</style>



<body>

    <h1>Danh sách phòng ban</h1>

    <?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "102210132_thong";

    $connect = new mysqli($dbhost, $dbuser, $dbpass, $db);
    // Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
        die("Không kết nối :" . $connect->connect_error);
        exit();
    }
    $sql = "SELECT * FROM phongban";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu từ kết quả truy vấn
        echo "<table>";
        echo "<tr><th>Mã Phòng Ban</th><th>Tên Phòng Ban</th><th>Mô tả</th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["IDPB"] . "</td><td>" . $row["TenPB"] . "</td><td>" . $row["Mota"] . "</td><td><a href='xemNV.php?idpb=" . $row["IDPB"] . "'>Xem</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu.";
    }

    // Đóng kết nối MySQL
    $connect->close();
    ?>


</body>

</html>