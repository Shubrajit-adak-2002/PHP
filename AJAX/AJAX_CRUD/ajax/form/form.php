<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'form');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1>Form!!</h1>
    <form action="" method="post">
        Name: <input type="text" name="" id=""><br>
        Email: <input type="text" name="" id=""><br>
        <select name="" id="" onchange="myfun(this.value)">
            <option value="">Choose any one</option>
            <?php 
                $query = 'SELECT * FROM `degree`';
                $result = mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result)) {?>
                    <option value="<?php echo $row['mid']; ?>"><?php echo $row['degrees']; ?></option>
                <?php    
                }
            ?>
        </select>
        <select name="" id="data">
            <option value="">Choose any one</option>
            
        </select><br>
        <button>Submit</button>
    </form>
    <script>
        function myfun(datavalue){
            $.ajax({
                url:'class.php',
                method:"POST",
                data:{datapost:datavalue},

                success:function(result){
                    $('#data').html(result)
                }
                
            })
        }
    </script>
</body>
</html>