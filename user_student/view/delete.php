<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;

}
include("../controller/deletecheck.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="../styles/delete.css">
</head>
<body>
<form action="" method="post">
        <div class="delete-container">
            <h2>Delete Account</h2>
         
            <button type="submit" name="DLT_ACC">Delete Account</button>
            <a href="home.php">Cancel Delete</a>
        </div>
    </form>



    
</body>
</html>