<?php
session_start();
include('connection.php');
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$sql = "SELECT * FROM `user_obj` WHERE `email`='$email' AND `password`='$pass'";
$data = $con->query($sql);
$loginData = $data->num_rows;
$result = $data->fetch_assoc();


if ($loginData > 0) {
    if ($result['auth'] == 0) {
        if ($result['user_type']=='ADMIN') {
            header('location:displayadmin.php');
        } else {
            $_SESSION['id'] = $result['user_id'];
            echo "<script>window.location.href='displayuser.php'</script>";
        }
    } else {
        echo "<script>alert('You are blocked')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
    
    
} else {
    echo "<script>alert('Login Failed')</script>";
}
?>