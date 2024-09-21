<?php
include('connection.php');
$ed_id = $_GET['ed_id'];
$sql = "SELECT * FROM `crikcketer` WHERE `user_id`=:ed_id";
$query = $con->prepare($sql);
$query->bindParam(':ed_id',$ed_id);
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);
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
        <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>" id="">
        Name: <input type="text" value="<?php echo $data['name'] ?>" name="name" id=""><br>
        Email: <input type="text" value="<?php echo $data['email'] ?>" name="email" id=""><br>
        <button>Submit</button>
    </form>
</body>
</html>