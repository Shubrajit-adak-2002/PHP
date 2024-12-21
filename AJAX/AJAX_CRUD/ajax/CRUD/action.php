<?php
$con = mysqli_connect('localhost', 'root','','ajax');

if (!$con) {
    echo "Failed";
}




if (isset($_POST['read'])) {
    $data = '<div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>';

    $query = "SELECT * FROM `details`";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $id = 1;
        while ($rows = mysqli_fetch_array($result)) {
            $data .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $id . '</th>
                        <td class="px-6 py-4">' . $rows['name'] . '</td>
                        <td class="px-6 py-4">' . $rows['email'] . '</td>
                        <td class="px-6 py-4"><button onclick="getDetails('.$rows['id'].')" class="text-red-500">Edit</button> | <button onclick="Delete('.$rows['id'].')" class="text-red-500">Delete</button></td>
                      </tr>';
            $id++;
        }
    } else {
        $data .= '<tr><td colspan="4" class="px-6 py-4 text-center">No records found</td></tr>';
    }

    $data .= '</tbody></table></div>';
    echo $data;
}



if (isset($_POST["name"]) && isset($_POST["email"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];


    $query = "INSERT INTO `details`(`name`, `email`) VALUES ('$name','$email')";
    mysqli_query($con, $query);
}


if (isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    $del_query = "DELETE FROM `details` WHERE `id`= '$del_id'";
    mysqli_query($con,$del_query);
}
