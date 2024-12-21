<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajax');


$name = $_POST['name'];
$email = $_POST['email'];


if (isset($_POST['submit'])) {
    $query = "INSERT INTO `user`(`name`, `email`) VALUES ('$name','$email')";
    $result = mysqli_query($con,$query);
    header('location:data.php');
}
?>