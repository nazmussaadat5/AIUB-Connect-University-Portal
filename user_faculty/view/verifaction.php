<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}
require("../controller/verifactioncheck.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifaction</title>
    <link rel="stylesheet" href="../styles/verifaction.css">
</head>

<body>
    <div id="wrapper">
        <div class="sidebar">
            <div class="sidebar-item"><img src="../assets/css/home-button_5974636.png" alt="" id="img-home"><a href="home.php">Home</a></div>
            <div class="sidebar-item"><img src="../assets/css/notification-bell_7245856.png" alt="" id="img-not"><a href="Notification.php">Notification</a></div>
            <div class="sidebar-item"><img src="../assets/css/user_3177440.png" alt="" id="img-profile"><a href="profile.php">Profile</a></div>
            <div class="sidebar-item"><img src="../assets/css/settings_3132084.png" alt="" id="img-setting"><a href="logout.php">Logout</a></div>
            <div class="sidebar-item"><img src="../assets/css/list_295653.png" alt="" id="img-follow"><a href="follow.php">Friend List</a></div>
            <div class="sidebar-item"><img src="../assets/css/icons8-verified-24.png" alt="" id="img-verifaction"><a href="verifaction.php">Verifaction</a></div>
        </div>
        <div class="Middle-bar">
            <div class="verification-container">
                <div class="profile-pic">
                    <?php
                    if (isset($_SESSION['profile_picture'])) {
                        echo "<img src='../assets/" . $_SESSION['profile_picture'] . "' alt=''>";
                    } else {
                        echo "<img src='../assets/css/default.jpg' alt=''>";
                    }
                    ?>
                </div>

                <div class="infomation">
                    <h2><?php echo $name ?></h2>
                </div>

                <div class="verifaction">
                    <form action="" method="post">
                        <label for="email">Registered Email:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="department">Department:</label>
                        <input type="text" id="department" name="department" required>
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position" required>
                        <button type="submit" name="BTN_VER">Submit Verification</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</body>

</html>