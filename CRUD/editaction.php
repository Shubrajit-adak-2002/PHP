<?php
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$ph_no = $_POST['ph_no'];
$deg = $_POST['degree'];
$gen = $_POST['gen'];
$lan = $_POST['language'];

$user_id = $_POST['user_id'];

$sql = "UPDATE `info` SET `name`='$name',`email`='$email',
`degree`='$deg',`gender`='$gen',`language`='$lan',`Phone_no`='$ph_no' WHERE user_id='$user_id'";

$data = mysqli_query($con,$sql);

if ($data) {
    echo "<script>alert('Updated')</script>";
    echo "<script>window.location.href='show.php'</script>";
} else {
    echo "Not updated";
}


?>