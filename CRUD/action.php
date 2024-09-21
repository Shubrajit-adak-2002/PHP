<?php
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$ph_no = $_POST['ph_no'];
$deg = $_POST['degree'];
$gen = $_POST['gen'];
$lan = $_POST['language'];
$file = $_FILES['img'];

$checkEmail = "SELECT * FROM `info` WHERE email = '$email'";
$matchEmail = mysqli_query($con,$checkEmail);
$dataEmail = mysqli_fetch_assoc($matchEmail);

if ($dataEmail['email'] == $email) {
    echo "<script>alert('Email already existed')</script>";

} else {
    $sql_query = "INSERT INTO `info`(`user_id`, `name`, `email`, `password`, `Phone_no`, `degree`, `gender`, `language`, `image`, `user_type`, `auth`) VALUES
     ('','$name','$email','$pass','$ph_no','$deg','$gen','$lan','$file','CLIENT','0')";


    $data = mysqli_query($con, $sql_query);

    if ($data) {
        // header('location:show.php');
        echo "<script>alert(\"Data inserted\")</script>";
        echo "<script>window.location.href=\"login.php\"</script>";
    } else {
        echo "Connection Unsuccessful";
    }
}
