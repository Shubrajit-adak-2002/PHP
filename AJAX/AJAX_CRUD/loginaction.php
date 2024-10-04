<?php
include('connection.php');
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM `details` WHERE email =:email AND password =:pass";
$query = $con->prepare($sql);
$query->bindParam(':email',$email);
$query->bindParam(':pass',$pass);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if ($query->rowCount() > 0) {
    $_SESSION['id'] = $result['user_id'];
    // header('location:login.php');
} else {
    echo "<script>alert('Login failure')</script>";
}


?>