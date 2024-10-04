<?php
session_start();
include('connection.php');
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM `details` WHERE `user_id`=:user_id";
$query = $con->prepare($sql);
$query->bindParam(':user_id',$user_id);
$query->execute();

?>

<table border="2">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Language</th>
        <th>Gender</th>
        <th>Image</th>
    </tr>
    <?php
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td><?php echo $result['user_id']; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><?php echo $result['language']; ?></td>
            <td><?php echo $result['gender']; ?></td>
            <td><?php echo $result['image']; ?></td>
        </tr>
        <?php
        }
     ?>
</table>