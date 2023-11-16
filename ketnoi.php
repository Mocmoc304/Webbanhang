<?php
$dbHost = "localhost";
$dbUser = "root";
$dbpPass = "";
$dbName = "ban_hang";

$conn = mysqli_connect($dbHost, $dbUser, $dbpPass, $dbName);

if($conn) {
    mysqli_set_charset($conn, 'utf8');
} else {
    die("Kết nối thất bại!".mysqli_connect_error());
}
?>