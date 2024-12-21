<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1>Data Insert!</h1>
    <form id="form" action="insert.php" method="post">
        Name: <input type="text" name="name" id="name"><br>
        Email: <input type="text" name="email" id="email"><br>
        <button name="submit">Submit</button>
    </form><br><br>
    <button id="display">Display</button>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <tbody id="res">

        </tbody>
    </table>


    <script>
        $(document).ready(function(){
            $('#submit').click(function(){
                $.ajax({
                    url:'insert.php',
                    type:"post",
                    data:$('#form input').val(),
                })
            })
            
        })
    </script>

    <script>
        $('#display').click(function(){
            $.ajax({
                url:'display.php',
                method:'post',
                success:function(data){
                    $('#res').html(data)
                }
            })
        })
    </script>
</body>
</html>