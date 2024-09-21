<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="action.php" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" id=""><br>
        Email: <input type="text" name="email" id=""><br>
        Password: <input type="text" name="pass" id=""><br>
        Phone No: <input type="text" name="ph_no" id=""><br>
        <label for="">Degree</label>
        <select name="degree" id="">
            <option value="BCA">BCA</option>
            <option value="MCA">MCA</option>
            <option value="B.tech">B.tech</option>
            <option value="M.tech">M.tech</option>
        </select><br>
        <label for="">Gender</label><br>
        Male <input value="Male" type="radio" name="gen" id="">
        Female <input value="Female" type="radio" name="gen" id="">
        Others <input value="Others" type="radio" name="gen" id=""><br>
        <label for="">Language</label><br>
        English <input value="English" type="checkbox" name="language" id="">
        Bengali <input value="Bengali" type="checkbox" name="language" id="">
        Hindi <input value="Hindi" type="checkbox" name="language" id="">
        Tamil <input value="Tamil" type="checkbox" name="language" id="">
        <input type="file" name="img" id="">
        <button>Submit</button>
    </form>
</body>
</html>