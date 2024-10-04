<?php
include('connection.php');
$block_id = $_GET['block_id'];
$sql = "UPDATE `user_obj` SET `auth`='1' WHERE user_id='$block_id'";
$query = $con->query($sql);

if ($query) {
    echo "<script>alert('User blocked')</script>";
    echo "<script>window.location.href='displayadmin.php'</script>";
} else {
    echo "<script>alert('User not blocked')</script>";
}

?>