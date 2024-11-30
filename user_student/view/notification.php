<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;

}
include('../controller/notcheck.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="../styles/notification.css">
</head>
<body>
<div id="wrapper">
  <div class="sidebar">
    <div class="sidebar-item" ><img src="../assets/css/home-button_5974636.png" alt="" id="img-home"><a href="home.php">Home</a></div>
    <div class="sidebar-item"><img src="../assets/css/notification-bell_7245856.png" alt="" id="img-not"><a href="Notification.php">Notification</a></div>
    <div class="sidebar-item"><img src="../assets/css/user_3177440.png" alt="" id="img-profile"><a href="profile.php">Profile</a></div>
    <div class="sidebar-item"><img src="../assets/css/settings_3132084.png" alt="" id="img-setting"><a href="logout.php">Logout</a></div>
    <div class="sidebar-item"><img src="../assets/css/list_295653.png" alt="" id="img-follow"><a href="follow.php">Friend List</a></div>

   </div>
   <div class="Middle-bar">
    <div class="notification-bar">
        <h2>Notification</h2>
        <?php
        if ($notificationResult && $notificationResult->num_rows > 0) {
            while ($row = $notificationResult->fetch_assoc()) {
                echo "<div class='notification-item'>";
                echo "<p>" . $row["notification_text"] . "</p>";
                echo "<p>From: " . $row["from_username"] . "</p>";
                echo "<p>Date: " . $row["notification_date"] . "</p>";
                
                echo "</div>";
            }
        } else {
            echo "<p>No notifications found.</p>";
        }


        ?>



        
    </div>

   </div>
  

</div>    

</body>
</html>