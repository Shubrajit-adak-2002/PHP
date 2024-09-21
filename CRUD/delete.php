<?php
include("connection.php");
$delete_id = $_GET['del_id'];
$sql = "DELETE FROM `info` WHERE user_id ='$delete_id'";
$data = mysqli_query($con,$sql);

if ($data) {
    echo "<script>alert('Data deleted')</script>";
    echo "<script>window.location.href='show.php'</script>";
} else {
    
}


?>