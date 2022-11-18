<?php

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "root";

$conn = new mysqli($host,$username,$password,$dbname);

if(!$conn) {
    die("connection failed: ". mysqli_connect_error());
}

// echo "connected successfully";
?>

