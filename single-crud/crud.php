<?php
try {
    $con = new mysqli("localhost","root","","php_crud");
} catch (Exception $err) {
    echo $err->getMessage();
}

$name_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $name_err = "Please enter your name";
    }
    if (empty($_POST['email'])) {
        $email_err = "Enter your email";
    }

$name = $email = $imageName = "";
    
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$imageName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$upload = "upload/" . $imageName;
move_uploaded_file($tmpName,$upload);

$sql = "INSERT INTO `gamers` (`name`,`email`,`image`) VALUES ('$name','$email','$upload')";
$data = $con->query($sql);
}

$sql2 = "SELECT * FROM `gamers`";
$data_2 = $con->query($sql2); 

$e_id = isset($_REQUEST['e_id']) ? $_REQUEST['e_id'] : null;
$sql3 = "SELECT * FROM `gamers` WHERE `id`='$e_id'";
$data_3 = $con->query($sql3);
$val = $data_3->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $u_id = $_POST['id'];
    $e_name = $_POST['e_name'];
    $e_email = $_POST['e_email'];


    if (isset($_FILES['e_image']) && $_FILES['e_image']['error'] == UPLOAD_ERR_OK) {
        $e_image = $_FILES['e_image']['name'];
        $e_tmpName = $_FILES['e_image']['tmp_name'];
        $upload2 = "upload/" . $e_image;
        move_uploaded_file($e_tmpName, $upload2);
    }

    if ($upload) {
        $sql4 = "UPDATE `gamers` SET `name`=?,`email`=?,`image`=? WHERE `id`=?";
        $stmt = $con->prepare($sql4);
        $stmt->bind_param("sssi",$e_name,$e_email,$upload2,$u_id);
    }else{
        $sql4 = "UPDATE `gamers` SET `name`=?,`email`=? WHERE `id`=?";
        $stmt = $con->prepare($sql4);
        $stmt->bind_param("ssi",$e_name,$e_email,$u_id);
    }

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
        exit();
    }
}

if (isset($_GET['d_id'])) {
    $d_id = isset($_REQUEST['d_id']) ? $_REQUEST['d_id'] : null;
    $sql5 = "DELETE FROM `gamers` WHERE `id`='$d_id'";
    $execute = $con->query($sql5);
    
    if ($execute) {
        header("Location: ". $_SERVER['PHP_SELF']);
        exit();
    }
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" id=""><br>
    <span><?php if($name_err) echo $name_err ?></span><br>
    Email: <input type="text" name="email" id=""><br>
    <span><?php if($name_err) echo $email_err ?></span><br>
    <input type="file" name="image" id=""><br>
    <input type="submit" name="submit" id="">
</form>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($result = $data_2->fetch_assoc()) {?>

        <tr>
            <td><?php echo $result['name']?></td>
            <td><?php echo $result['email']?></td>
            <td><img src="<?php echo $result['image']?>" alt="" height="100px" width="100px"></td>
            <td><a href="crud.php?e_id=<?php echo $result['id'] ?>">Edit</a> | <a href="crud.php?d_id=<?php echo $result['id']?>">Delete</a></td>
        </tr>
        <?php    
        }
        ?>
    </tbody>
</table>
<br><br>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="" value="<?php echo isset($val['id'])? $val['id'] : "" ?>">
    Name: <input type="text" value="<?php echo isset($val['name'])? $val['name'] : "" ?>" name="e_name" id=""><br>
    Email: <input type="text" value="<?php echo isset($val['email']) ? $val['email'] : ""?>" name="e_email" id=""><br>
    <input type="file" name="e_image" id=""><br>
    <input type="submit" name="update" id="">
</form> 
