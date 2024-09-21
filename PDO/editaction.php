<?php 
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];
$sql = "UPDATE `crikcketer` SET `name`=:name,`email`=:email WHERE user_id = :user_id";
$query = $con->prepare($sql);
$query->bindParam(':name',$name);
$query->bindParam(':email',$email);
$query->bindParam(':user_id',$user_id);
$data = $query->execute();

if ($data) {
    echo "<script>alert('Data updated')</script>";
} else {
    echo "<script>alert('Data not updated')</script>";
}


?>