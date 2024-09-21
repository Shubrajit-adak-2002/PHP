<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'connection';

try {
    $con = new PDO("mysql:host={$servername};dbname={$db}",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "OK";
} catch (PDOException $err) {
    echo $err->getMessage();
}



?>