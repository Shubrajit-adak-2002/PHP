<?php

try {
    $con = new mysqli("localhost","root","","php_crud");
    // echo "OK";
} catch (Exception $err) {
    echo $err->getMessage();
}
$name_err = $email_err = $salary_err = ""; // Initialize error variables
$name = $email = $salary = "";
$inserted = "";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $salary = trim($_POST['salary']);
        if (empty($_POST['name'])) {
            $name_err = "Please enter your name";
        }if (empty($_POST['email'])) {
            $email_err = "Please enter your email";
        }if (empty($_POST['salary'])) {
            $salary_err = "Please enter your salary";
        }
    }
    
    if (empty($name_err) && empty($email_err) && empty($salary_err)) {
    
        $sql = "INSERT INTO `employee` (`name`,`email`,`salary`) VALUES (?,?,?)";
        $query = $con->prepare($sql);
        $query->bind_param("sss",$name,$email,$salary);
    
        if ($query->execute()) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        }
    
    }
}
if (isset($_REQUEST['success'])) {
    $inserted = "Data inserted";
    $name = $email = $salary = "";
}

$sql2 = "SELECT * FROM `employee`";
$data = $con->query($sql2);


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name: <input type="text" name="name" id=""><br>
    <span><?php echo $name_err; ?></span><br>
    Email: <input type="text" name="email" id=""><br>
    <span><?php echo $email_err; ?></span><br>
    Salary: <input type="text" name="salary" id=""><br>
    <span><?php echo $salary_err; ?></span><br>
    <input type="submit" name="submit" id="">
</form>
<?php if (!empty($inserted)): ?>
<p><?php echo $inserted?></p>
<?php
endif;
?>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $data->fetch_assoc()) {?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['salary']?></td>
                <td><a href="index.php?ed_id=<?php echo $row['id']?>">Edit</a> | <a href="index.php?del_id=<?php echo $row['id']?>">Delete</a></td>
            </tr>
        <?php    
        }
        ?>
    </tbody>
</table>
<?php
$e_id = isset($_REQUEST['ed_id']) ? $_REQUEST['ed_id'] : null;

if ($e_id) { 
    // Now it's safe to use $e_id in the query
    $sql = "SELECT * FROM `employee` WHERE `id`=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $e_id);  // "i" = integer type
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row2 = $result->fetch_assoc()) {
        // echo "Editing: " . htmlspecialchars($row['name']); // Show the name
    } else {
        echo "No record found!";
    }
}

?>
<br><br> 
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="id" value="<?php echo isset($row2['id']) ? $row2['id'] : ""?>" id="">
    Name: <input type="text" value="<?php echo isset($row2['name']) ? $row2['name'] : ""?>" name="e-name" id=""><br>
    Email: <input type="text" value="<?php echo isset($row2['email']) ? $row2['email'] : ""?>" name="e-email" id=""><br>
    Salary: <input type="text" value="<?php echo isset($row2['salary']) ? $row2['salary'] : ""?>" name="e-salary" id=""><br>
    <input type="submit" name="update" id="">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    if (isset($_POST['update'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $e_name = isset($_POST['e-name']) ? $_POST['e-name'] : "";
        $e_email = isset($_POST['e-email']) ? $_POST['e-email'] : "";
        $e_salary = isset($_POST['e-salary']) ? $_POST['e-salary'] : "";

        if (empty($id)) {
            die("Error: ID is missing, cannot update.");
        }

        $sql3 = "UPDATE `employee` SET `name`=?, `email`=?, `salary`=? WHERE id=?";
        $stmt = $con->prepare($sql3);
        $stmt->bind_param("sssi", $e_name, $e_email, $e_salary, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
            header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
            exit();
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
}

if (isset($_GET['del_id'])) {
    $del_id = $_REQUEST['del_id'];
    $sql4 = "DELETE FROM `employee` WHERE `id`='$del_id'";
    $query2 = $con->query($sql4);

    if ($query2) {
        header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
        exit();
    }
}

?>