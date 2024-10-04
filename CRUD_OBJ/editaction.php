<?php 
include('connection.php');
$user_id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE `user_obj` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE user_id='$user_id'";

$query = $con->query($sql);

if ($query) {
    echo "<script>alert('Data updated')</script>";
    echo "<script>window.location.href='displayuser.php'</script>";
} else {
    echo "<script>alert('Data not updated')</script>";
}


?>