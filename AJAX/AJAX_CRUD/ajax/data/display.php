<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajax');

$query = "SELECT * FROM `user`";

$result = mysqli_query($con,$query);

if (mysqli_num_rows($result)>0) {
    while ($rows = mysqli_fetch_array($result)) {?>
        <tr>
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['email']; ?></td>
        </tr>
    <?php    
    }
    
}