<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    headeR("Location: index.php");
}
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username = '$username' OR email='$email'");
        if(mysqli_num_rows($duplicate)>0){
            echo "
            <script>alert('Username or Email has already taken');</script>
            ";
        }
        else{
            if($password == $confirmpassword){
                $query = "INSERT INTO tbl_user VALUE('','$name','$username','$email','$password')";
                mysqli_query($conn,$query);
                echo "<script>alert('Registration Successful');</script>";
            }
            else{
                echo"
                <script>alert('Password Does Not Match');</script>
                ";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    label{
        padding-right: 10px;
    }
    input{
        margin-bottom: 20px;
    }
</style>
<body>
   <div class="container m-5">
        <h2>Registration</h2>
        <form action="" class="" method="post" autocomplete="off">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" required value=""><br>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" required value=""><br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required value=""><br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required value=""><br>
            <label for="confirmpassword">Confirm Password: </label>
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
            <button type="submit" name="submit" class="btn  btn-success">Register</button>
        </form>
        <br>
        <a href="login.php">Login</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </div>   
</body>
</html>