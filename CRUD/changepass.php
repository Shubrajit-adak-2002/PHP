<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form action="passaction.php" method="post">
        Previous Password: <input type="text" name="oldp" id=""><br>
        New Password: <input type="text" name="newp" id=""><br>
        Confirm Password <input type="text" name="confp" id=""><br>
        <button type="submit">Update password</button>
    </form>
</body>
</html>