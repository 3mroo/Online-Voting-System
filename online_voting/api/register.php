<?php

include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if ($password == $confirm_password) {
    move_uploaded_file($tmp_name,"../upload/$image");
    $insert = mysqli_query($connect, "INSERT INTO user_vote (name, mobile, address, password, photo, role, status, votes) VALUES ('$name','$mobile','$address','$password','$image','$role', 0, 0)");
    if ($insert) {
        echo '<script>
    alert("Registration Successfull!");
    window.location = "../";
    </script>
    ';
    }else{
        echo '<script>
    alert("Some error occured!");
    window.location = "../routes/register.html";
    </script>
    ';
    }
} else {
    echo '<script>
    alert("Password and Confirm password does not match!");
    window.location = "../routes/register.html";
    </script>
    ';
}


?>
