<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;

}

include("../controller/messagecheck.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/Message.css">

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
   <div class="profile-container">
                <div class="top-profile-pic">
                    <?php
                    if (isset($_SESSION['profile_picture'])) {
                        echo "<img src='../assets/" . $_SESSION['profile_picture'] . "' alt=''>";
                    } else {
                        echo "<img src='../assets/css/default.jpg' alt=''>";
                    }
                    ?>
                     <h2><?php echo $name; ?></h2>
                </div>
                </div>

    <div class="message-container">
    <?php
if ($getmsgresult && $getmsgresult->num_rows > 0) {
    while ($row = $getmsgresult->fetch_assoc()) {
        $sender_pic = $row['pro_pic'] ? "../assets/" . $row['pro_pic'] : "../assets/css/default.jpg";
        ?>
        <div class="message <?php echo ($row['sender_username'] == $sender_username) ? 'sent' : 'received'; ?>">
            <div class="sender-info">
                <img src="<?php echo $sender_pic; ?>" alt="Profile Picture">
               
            </div>
            <p><?php echo $row['message_text']; ?></p>
            <span class="timestamp"><?php echo $row['message_date']; ?></span>
        </div>
        <?php
    }
} else {
    echo "<p>No messages found.</p>";
}
?>

        <form action="" method="post">
        <textarea  name="message_text" id="message" placeholder="Type your message...." rows="4" cols="50" ></textarea>
        <button type="submit" name="BTN_SEND"  id="send">Send</button>


        </form>

 

    </div>
</div>


</div>

</body>
</html>