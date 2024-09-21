<?php
session_start();
include('connection.php');
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM `crikcketer` WHERE `email` =:email AND `password`=:pass";
$query = $con->prepare($sql);
$query->bindParam(':email',$email);
$query->bindParam(':pass',$pass);
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);

if ($query->rowCount() > 0) {
    $_SESSION['id'] = $data['user_id'];
    header('location:display.php');
} else {
    echo "<script>alert('Login failure')</script>";
}


?>