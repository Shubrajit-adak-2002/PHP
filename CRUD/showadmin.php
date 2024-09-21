<?php

include('connection.php');
$sql = "SELECT * FROM `info` WHERE user_type ='CLIENT'";
$data = mysqli_query($con, $sql);
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
    while ($result = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?php echo $i;
                $i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['Phone_no']; ?></td>
            <td><?php echo $result['degree']; ?></td>
            <td><?php echo $result['gender']; ?></td>
            <td><?php echo $result['language']; ?></td>
            <td><?php echo $result['image']; ?></td>
            <td><a href="block.php?block_id=<?php echo $result['user_id']; ?>">Block</a> |
                <a href="unblock.php?unblock_id=<?php echo $result['user_id']; ?>">Unblock</a>
                | <a href="logout.php">Logout</a>
            </td>
        </tr>
    <?php
    } ?>
</table>
<center></center>