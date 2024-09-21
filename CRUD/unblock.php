<?php
include("connection.php");
$unblock_id = $_GET['unblock_id'];
$sql = "UPDATE `info` SET `auth` = '0' WHERE user_id = '$unblock_id'";
$data = mysqli_query($con,$sql);

if ($data) {
    echo "<script>alert('You are unblocked')</script>";
    echo "<script>window.location.href='showadmin.php'</script>";
}



?>