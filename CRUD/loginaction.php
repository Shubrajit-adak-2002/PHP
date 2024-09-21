<?php
session_start();
include('connection.php');
$email = $_POST['email'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM `info` WHERE email = '$email' AND password ='$pass'";
$data = mysqli_query($con,$sql);
$logindata = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$auth = $result['auth'];
$user_type = $result['user_type'];


if ($logindata) {
    if ($auth == 0) {
        if ($user_type == 'ADMIN') {
            header('location:showadmin.php');
        } else {
            $_SESSION['id'] = $result['user_id'];
            echo "<script>window.location.href='show.php'</script>";
        }
        
    } else {
        echo "<script>alert('You are blocked')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
    
} else {
    echo "Login failure";
}


?>