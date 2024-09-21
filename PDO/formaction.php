<?php
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "INSERT INTO `crikcketer`(`name`, `email`, `password`)
 VALUES (:nm,:em,:p)";

$query = $con->prepare($sql);
$query->bindParam(':nm',$name);
$query->bindParam(':em',$email);
$query->bindParam(':p',$pass);
$data = $query->execute();

if ($data) {
    echo "<script>alert('Data inserted')</script>";
    echo "<script>window.location.href='login.php'</script>";
} else {
    echo "<script>alert('Data not inserted')</script>";
}


?>