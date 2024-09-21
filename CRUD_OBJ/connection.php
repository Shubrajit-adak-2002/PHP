<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'connection';

$con = new mysqli($server,$username,$password,$db);

try {
    // echo "Successfull";
} catch (Exception $err) {
    $err->getMessage();
}


?>