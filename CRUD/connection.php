<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'connection';

$con = mysqli_connect($server,$username,$password,$db);

if ($con) {
    // echo "Successful";
} else {
    echo "Not Successful";

}

?>