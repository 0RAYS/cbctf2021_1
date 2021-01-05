<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "root";
$sjk = "cbctf";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $sjk);
 
// 检测连接
if ($conn->connect_error) {
    die("ON: " . $conn->connect_error);
}
