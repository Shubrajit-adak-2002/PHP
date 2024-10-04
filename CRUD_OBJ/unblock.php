<?php
include('connection.php');
$unblock_id = $_GET['unblk'];
$sql = "UPDATE `user_obj` SET `auth`='0' WHERE user_id='$unblock_id'";
$query = $con->query($sql);

if ($query) {
    echo "<script>alert('User unblocked')</script>";
} else {
    echo "<script>alert('User not unblocked')</script>";
}
?>