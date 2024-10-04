<?php
session_start();
include('connection.php');

$user_id = $_SESSION['id'];

$old_pass = $_POST['oldp'];
$new_pass = $_POST['newp'];
$conf_pass = $_POST['confp'];

$sql = "SELECT * FROM `user_obj` WHERE `password`='$old_pass'";
$query = $con->query($sql);
$result = $query->fetch_assoc();
$dbpass = $result['password'];

if ($dbpass == $old_pass) {
    if ($old_pass != $new_pass) {
        if ($new_pass == $conf_pass) {
            $sql = "UPDATE `user_obj` SET `password`='$conf_pass' WHERE `user_id`='$user_id'";
            $query = $con->query($sql);
            echo "<script>alert('Password updated')</script>";
            echo "<script>window.location.href='displayuser.php'</script>";
        } else {
             echo "<script>alert('New password and Confirm password are not same')</script>";
        }
        
    } else {
        echo "<script>alert('Old password and new are same')</script>";
    }
    
} else {
    echo "<script>alert('Old password are not ok')</script>";
}

?>