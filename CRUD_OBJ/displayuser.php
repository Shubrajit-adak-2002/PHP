<?php
session_start();
include('connection.php');
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM `user_obj` WHERE `user_id`='$user_id'";
$data = $con->query($sql);

?>
<table border="2">
    <tr>
        <th>User Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone no</th>
    </tr>
    <?php
    $i = 1;
    while ($result = mysqli_fetch_assoc($data)) {?>
        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['phone']; ?></td>
        </tr>
    <?php    
    }
    ?>
</table>