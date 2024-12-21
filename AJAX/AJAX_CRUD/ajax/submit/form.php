<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <form>
        Name: <input type="text" name="name" id=""><br>
        Email: <input type="text" name="email" id=""><br>
        <select name="" id="" onchange="myfun(this.value)">
            <option value="">Select State</option>
            <option >West Bengal</option>
            <option >Maharastra</option>
            <option >Tamil Nadu</option>
        </select>
        <select name="" id="city">
            <option value="">Select City</option>
        </select><br>
        <button>Submit</button>
    </form>

    <script>
        function myfun(data) {
            // alert(data)
            let req = new XMLHttpRequest();
            req.open('GET',"http://localhost/ajax/submit/response.php?datavalue="+data,true)
            req.send()

            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('city').innerHTML = req.responseText
                }
            }
        }
    </script>
</body>
</html>