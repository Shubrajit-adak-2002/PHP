<?php

$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'form');

$mid = $_POST['datapost'];

$query = "SELECT * FROM `classes` WHERE `mid`='$mid'";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) { ?>
    <option value=""><?php echo $row['class']; ?></option>
<?php
}
