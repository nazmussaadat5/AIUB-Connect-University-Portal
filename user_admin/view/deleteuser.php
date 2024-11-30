<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <link rel="stylesheet" href="../styles/deleteuser.css">
</head>
<body>
    <h3><br>Delete User</h3>
    <form action="../controller/deletecontrol.php" method="post">
        <input type="number" id="userId" placeholder="Enter User ID"name="delete_id" required><br><br> 
        <input type="submit" name="deleteUser" value="Delete">
    </form>
</body>
</html>
