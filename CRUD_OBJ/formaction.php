<?php
include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$ph_no = $_POST['ph_no'];

$sql = "SELECT * FROM `user_obj` WHERE email='$email'";
$data = $con->query($sql);
$result = $data->fetch_assoc();

if ($result['email'] == $email) {
    echo "<script>alert('Email existed')</script>";
} else {
    
    $sql_query = "INSERT INTO `user_obj`(`user_id`, `name`, `email`, `password`, `phone`,`user_type`)
     VALUES ('','$name','$email','$pass','$ph_no','CLIENT')";

    $con->query($sql_query);
    
    if ($con->affected_rows) {;
        echo "<script>alert(\"Data inserted\")</script>";
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "Connection Unsuccessful";
    }

}


?>