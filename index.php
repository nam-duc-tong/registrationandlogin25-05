<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE id= $id");
        $row = mysqli_fetch_assoc($result);
       
    }
    else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and registration</title>
</head>
<body>
    <h1>Welcome <?=$row["name"];?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>