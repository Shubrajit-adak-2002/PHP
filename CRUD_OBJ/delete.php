<?php
include('connection.php');
$user_id = $_GET['del_id'];
$sql = "DELETE FROM `user_obj` WHERE user_id='$user_id'";
$query = $con->query($sql);

if ($query) {
    echo '<script>alert(\'Data deleted\')</script>';
    echo '<script>window.location.href=\'login.php\'</script>';
} else {
    echo '<script>alert(\'Data not deleted\')</script>';
}

?>