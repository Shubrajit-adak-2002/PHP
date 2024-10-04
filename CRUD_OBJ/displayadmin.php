<?php
include('connection.php');
$sql = "SELECT * FROM `user_obj` WHERE `user_type`='CLIENT'";
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
    while ($result = mysqli_fetch_assoc($data)) {?>
        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['phone']; ?></td>
            <td><a href="block.php?block_id=<?php echo $result['user_id']; ?>">Block</a> | <a href="unblock.php?unblk=<?php echo $result['user_id']; ?>">Unblock</a></td>
        </tr>
    <?php    
    }
    ?>
</table>