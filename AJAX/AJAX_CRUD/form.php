<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    Name: <input type="text" name="name" id="name"><br>
    Email: <input type="text" name="email" id="email"><br>
    Password: <input type="text" name="pass" id="pass"><br>
    <label for="">Gender</label><br>
    <select name="gen" id="gen">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="">Language</label><br>
    Bengali <input type="checkbox" value="Bengali" name="lang[]" id="lang">
    English <input type="checkbox" value="English" name="lang[]" id="lang">
    Hindi <input type="checkbox" value="Hindi" name="lang[]" id="lang"><br>
    <input type="file" name="img" id="image"><br>
    <button id="btn" type="submit">Submit</button>
    <div id="div"></div>
    <script>
        $(document).ready(function () {
            $('#btn').click(function(){
                let name = $('#name').val();
                let email = $('#email').val();
                let pass = $('#pass').val();
                let gender = $('#gen').val();
                let lang = [];
                $.each($("input[name='lang[]']:checked"),function () {
                    lang.push($(this).val())
                })
                let lan = lang.join(",")
                let image = $('#image')[0].files[0];
                let formData = new FormData();

                formData.append('name',name)
                formData.append('email',email)
                formData.append('pass',pass)
                formData.append('gen',gender)
                formData.append('lang',lan)
                formData.append('img',image)

                $.ajax({
                    type:"post",
                    data:formData,
                    url:"formaction.php",
                    contentType:false,
                    processData:false
                }).done(function(data){
                    $('#div').html(data)
                })

                // $.ajax({
                //     type:"post",
                //     url:"formaction.php",
                //     data:{name:name,email:email,pass:pass,gen:gender,lang:lan}
                // }).done(function(data){
                //     $('#div').html(data)
                // });
            });
        });
    </script>
</body>
</html>