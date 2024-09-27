<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "practice";

try {
    $con = new PDO("mysql:host={$servername};dbname={$db}",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    $err->getMessage();
}
?>