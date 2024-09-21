<?php
session_start();
include('connection.php');
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM `crikcketer` WHERE `user_id`=:user_id";

if (!$user_id) {
  echo "Session ID not set.";
  exit();
}

$query = $con->prepare($sql);
$query->bindParam(':user_id',$user_id);
$query->execute();

?>

<table border="2">
    <tr>
        <th>Player no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
        <?php
        $i = 1;
         while ($result = $query->fetch(PDO::FETCH_ASSOC)) {?>
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['password']; ?></td>
            <td><a href="edit.php?ed_id=<?php echo $result['user_id'] ?>">edit</a></td>
          </tr>
        <?php    
        } ?>
    
</table>