<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ez"; // ชื่อ ที่ตั้ง แต่ละคนไม่เหมือนกัน

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
};
