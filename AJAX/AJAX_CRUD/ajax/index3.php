<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div>
        <div id="loaddata">It's gonna be change</div>
        <button id="submit">Submit</button>
    </div>
    <script>
        // This is get method
        // $(document).ready(function(){
        //     $('#submit').click(function(){
        //         $.get('get.php',function(data,status){
        //             $('#loaddata').html(data)
        //             alert(status)
        //         })
        //     })
        // })

        $(document).ready(function(){
            $('#submit').click(function(){
                $.post('post.php',{
                    name: 'Shubrajit Adak',
                    age: 22
                },function(data,status){
                    $('#loaddata').html(data)
                    alert(status)
                })
            })
        })
    </script>
</body>
</html>