<?php
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$lang = $_POST['lang'];
$gen = $_POST['gen'];
$image = $_FILES['img'];
$filename = $_FILES['img']['name'];
$tempname = $_FILES['img']['tmp_name'];
$upload = 'upload/'.$filename;
move_uploaded_file($tempname,$upload);

echo $name,$email,$pass,$lang,$gen,$filename;

$sql = "INSERT INTO `details`( `name`, `email`, `password`,`language`,`gender`,`image`) VALUES (:name,:email,:pass,:lang,:gen,:img)";
$query = $con->prepare($sql);
$query->bindParam(':name',$name);
$query->bindParam(':email',$email);
$query->bindParam(':pass',$pass);
$query->bindParam(':lang',$lang);
$query->bindParam(':gen',$gen);
$query->bindParam(':img',$filename);

$data = $query->execute();

if ($data) {
    // echo "<script>alert('Data inserted')</script>";
} else {
    echo "<script>alert('Data not inserted')</script>";
}


?>