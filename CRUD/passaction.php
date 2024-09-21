<?php
session_start();
include("connection.php");
$user_id = $_SESSION['id'];

$old_pass = md5($_POST['oldp']);
$new_pass = md5($_POST['newp']);
$conf_pass =md5( $_POST['confp']);

$sql = "SELECT password FROM `info` WHERE password = '$old_pass'";
$data = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($data);
$dbpass = $result['password'];

if ($dbpass == $old_pass) {
    if ($old_pass != $new_pass) {
        if ($new_pass == $conf_pass) {
            $update_pass = "UPDATE `info` SET `password`='$conf_pass' WHERE user_id='$user_id'";
            $data = mysqli_query($con,$update_pass);
            echo "<script>alert('Password updated')</script>";
            echo "<script>window.location.href=\"show.php\"</script>";
        } else {
            echo "New password and confirm password are not matching are not matching";
            echo "<script>window.location.href='changepass.php'</script>";
        }
    } else {
        echo "Old password and new password are not matching";
        echo "<script>window.location.href='changepass.php'</script>";
    }
} else {
    echo "Old password are not matching";
    echo "<script>window.location.href='changepass.php'</script>";
}


?>