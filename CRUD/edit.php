<?php

include("connection.php");
$edit_id = $_GET['ed_id'];
$sql = "SELECT * FROM `info` WHERE user_id = '$edit_id'";
$data = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($data);

// print_r($result);
// die();
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
        <input type="hidden" name="user_id" value="<?php echo $result['user_id'] ?>">
        Name: <input value="<?php echo $result['name'] ?>" type="text" name="name" id="">
        Email: <input value="<?php echo $result['email'] ?>" type="text" name="email" id="">
        Phone No: <input value="<?php echo $result['Phone_no'] ?>" type="number" name="ph_no" id=""><br>
        <label for="">Degree</label>
        <select name="degree" id="">
            <option value="BCA" <?php if ($result['degree'] == 'BCA') echo 'selected' ?>>BCA</option>
            <option value="MCA" <?php if ($result['degree'] == 'MCA') echo 'selected' ?>>MCA</option>
            <option value="B.tech" <?php if ($result['degree'] == 'B.tech') echo 'selected' ?>>B.tech</option>
            <option value="M.tech" <?php if ($result['degree'] == 'M.tech') echo 'selected' ?>>M.tech</option>
        </select><br>
        <label for="">Gender</label><br>
        <input type="radio" name="gen" value="Male" <?php if ($result['gender'] == 'Male') echo 'checked' ?>> Male<br>
        <input type="radio" name="gen" value="Female" <?php if ($result['gender'] == 'Female') echo 'checked' ?>> Female<br>
        <input type="radio" name="gen" value="Others" <?php if ($result['gender'] == 'Others') echo 'checked' ?>> Others<br>
        <label for="">Language</label><br>
        <input type="checkbox" name="language[]" value="English" <?php if (strpos($result['language'], 'English') !== false) echo 'checked' ?>> English<br>
        <input type="checkbox" name="language[]" value="Bengali" <?php if (strpos($result['language'], 'Bengali') !== false) echo 'checked' ?>> Bengali<br>
        <input type="checkbox" name="language[]" value="Hindi" <?php if (strpos($result['language'], 'Hindi') !== false) echo 'checked' ?>> Hindi<br>
        <input type="checkbox" name="language[]" value="Tamil" <?php if (strpos($result['language'], 'Tamil') !== false) echo 'checked' ?>> Tamil<br>
        <button>Update</button>
    </form>
</body>
</html>