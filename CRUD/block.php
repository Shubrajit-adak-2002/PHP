<?php
include("connection.php");
$block_id = $_GET['block_id'];
$sql = "UPDATE `info` SET `auth` = '1' WHERE user_id = '$block_id'";
$data = mysqli_query($con,$sql);

if ($data) {
    echo "<script>alert('You are blocked')</script>";
    echo "<script>window.location.href='showadmin.php'</script>";
}
?>