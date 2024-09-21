<?php
session_start();
include('connection.php');
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM `info` WHERE `user_id`='$user_id'";
$data = mysqli_query($con,$sql);
?>

<table border="2">
    <tr>
        <th>Sl.no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone-no</th>
        <th>degree</th>
        <th>gender</th>
        <th>language</th>
        <th>image</th>
        <th>Action</th>
    </tr>
    <?php 
    $i = 1;
    while ($result = mysqli_fetch_assoc($data)) {?>
        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['Phone_no']; ?></td>
            <td><?php echo $result['degree']; ?></td>
            <td><?php echo $result['gender']; ?></td>
            <td><?php echo $result['language']; ?></td>
            <td><?php echo $result['image']; ?></td>
            <td><a href="edit.php?ed_id=<?php echo $result['user_id']; ?>">Edit</a> |
             <a href="delete.php?del_id=<?php echo $result['user_id'];?>">Delete</a> 
             | <a href="changepass.php">Change password</a></td>
        </tr>
    <?php
    } ?>
</table>