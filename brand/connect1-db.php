<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmadi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    return $conn;
}
?>
