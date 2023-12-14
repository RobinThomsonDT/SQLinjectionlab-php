<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    h1 {
        background-color: #3498db;
        color: white;
        padding: 20px;
        margin: 0;
    }

    table {
        width: 80%;
        margin: 50px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    /* Zebra striping */
    tr:nth-of-type(odd) {
        background: #f9f9f9;
    }

    th {
        background: #3498db;
        color: white;
        font-weight: bold;
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 18px;
    }

    td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 16px;
    }

    /* Responsive table styling */
    @media only screen and (max-width: 760px) {
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
</head>

<body>

    <h1>Tìm Kiếm</h1>

    <?php
    include 'xulytimkiem.php';
    ?>

</body>

</html>