<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');

if ($conn->connect_error) {
    die("connection failed !" . $conn->connect_error);
}
// else {
//     echo "database connected successfully";
// }
