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

    <h1>Danh sách nhân viên</h1>
    <!-- Form tìm kiếm -->
    <form method="GET">
        <label for="idpb">Tìm nhân viên theo IDPB:</label>
        <input type="text" id="idpb" name="idpb">
        <input type="submit" value="Tìm kiếm">
    </form>


    <?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "102210132_thong";

    $connect = new mysqli($dbhost, $dbuser, $dbpass, $db);
    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
        die("Không kết nối :" . $connect->connect_error);
        exit();
    }

    if (isset($_GET['idpb'])) {
        // Retrieve NHANVIEN data based on the selected IDPB
        $selectedIDPB = $_GET['idpb'];

        // Fetch NHANVIEN data based on the selected IDPB
        $sql = "SELECT * FROM NHANVIEN WHERE IDPB='$selectedIDPB'";
        $result = $connect->query($sql);
        // Loop through the result set and display the data
        if ($result->num_rows > 0) {
            // Hiển thị dữ liệu từ kết quả truy vấn
            echo "<table>";
            echo "<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["IDNV"] . "</td><td>" . $row["Hoten"] . "</td><td>" . $row["IDPB"] . "</td><td>" . $row["Diachi"] . "</td></tr> ";
            }
            echo "</table>";
        } else {
            echo "Không có dữ liệu.";
        }
    } else {
        // Fetch all NHANVIEN data
        $sql = "SELECT * FROM NHANVIEN";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // Hiển thị dữ liệu từ kết quả truy vấn
            echo "<table>";
            echo "<tr><th>IDNV</th><th>Họ tên</th><th>IDPB</th><th>Địa chỉ</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["IDNV"] . "</td><td>" . $row["Hoten"] . "</td><td>" . $row["IDPB"] . "</td><td>" . $row["Diachi"] . "</td></tr> ";
            }
            echo "</table>";
        } else {
            echo "Không có dữ liệu.";
        }
    }

    // Đóng kết nối MySQL
    $connect->close();

    ?>


</body>

</html>