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
        <th>Action</th>
    </tr>
    <?php
    $i = 1;
    while ($result = $data->fetch_assoc()) {?>
        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['phone']; ?></td>
            <td><a href="edit.php?ed_id=<?php echo $result['user_id'] ?>">Edit</a> | <a href="delete.php?del_id=<?php echo $result['user_id'] ?>">Delete</a><a href="changepass.php">Change password</a></td>
        </tr>
    <?php    
    }
    ?>
</table>