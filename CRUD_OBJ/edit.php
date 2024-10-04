<?php
include('connection.php');
$edit_id = $_GET['ed_id'];
$sql = "SELECT * FROM `user_obj` WHERE user_id = '$edit_id'";
$query = $con->query($sql);
$result = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="editaction.php" method="post">
        <input type="hidden" name="id" id="" value="<?php echo $result['user_id'] ?>">
        Name: <input type="text" name="name" id="" value="<?php echo $result['name'] ?>"><br>
        Email: <input type="text" name="email" id="" value="<?php echo $result['email'] ?>"><br>
        Phone: <input type="text" name="phone" id="" value="<?php echo $result['phone'] ?>"><br>
        <button>Update</button>
    </form>
</body>
</html>