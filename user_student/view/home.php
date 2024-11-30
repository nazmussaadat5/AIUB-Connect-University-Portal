<?php


include("../controller/homecheck.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/home.css">

</head>

<body>


<div id="wrapper">
  <div class="sidebar">
    <div class="sidebar-item" ><img src="../assets/css/home-button_5974636.png" alt="" id="img-home"><a href="home.php">Home</a></div>
    <div class="sidebar-item"><img src="../assets/css/notification-bell_7245856.png" alt="" id="img-not"><a href="Notification.php">Notification</a></div>

    <div class="sidebar-item"><img src="../assets/css/user_3177440.png" alt="" id="img-profile"><a href="profile.php">Profile</a></div>
    <div class="sidebar-item"><img src="../assets/css/settings_3132084.png" alt="" id="img-setting"><a href="logout.php">Logout</a></div>
    <div class="sidebar-item"><img src="../assets/css/list_295653.png" alt="" id="img-follow"><a href="follow.php">Friend List</a></div>
    <div class="sidebar-item"><img src="../assets/css/delete.png" alt="" id="img-delete"><a href="password.php">Delete Account</a></div>


   </div>
   <div class="Middle-bar">
   <div id="post-tweet">
        <form method="post" action="" enctype="multipart/form-data">
            
        <textarea name="post_text" rows="4" cols="50" placeholder="What's happening?"></textarea><br/>
<label for="image" class="upload-pic">
<img src="../assets/css/color-picker_12206192.png" alt="">



</label>
    
        <input type="file" name="image" id="image">
        <button class="tweet_post" type="submit" name="BTN_POST">POST</button>
        </form>
   </div>
   <div id="recent-tweets">
            <h2>
                Recent posts
            </h2>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='tweet'>";
                        echo "<div class='post-container'>";
                        echo "<div class='profile-pic'>";
                        if (!empty($row["pro_pic"])) {
                            echo "<img src='../assets/" . $row["pro_pic"] . "' alt=''>";
                        } else {
                            echo "<img src='../assets/css/default.jpg' alt=''>";
                        }
                        echo "</div>";
                      echo "<div class='post-info'>";
                        echo "<p><strong>" . $row["name"] . "</strong> @" . $row["username"] . " " . $row["post_date"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='posts'>";
                        echo "<p>" . $row["post_text"] . "</p>";
                        if (!empty($row["image"])) {
                            echo "<img src='../assets/" . $row["image"] . "' alt=''>";
                        }
                        echo "</div>";
                        echo "<div class='post-actions'>";
                echo "<button class='like'><img src='../assets/css/icons8-love-24.png' alt=''></button>";
                echo "<a href='comment.php?post_id=" . $row["post_id"] . "'><img src='../assets/css/icons8-comment-24.png' alt=''></a>";
                

                echo "<a href='editpost.php?post_id=" . $row["post_id"] . "'><img src='../assets/css/icons8-edit-24.png' alt=''></a>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='post_id' value='" . $row["post_id"] . "'>";
                echo "<button type='submit' class='delete' name='BTN_DELETE'><img src='../assets/css/icons8-delete-24.png' alt=''></button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                
            }
        } else {
        echo "<p>No tweets found.</p>";
           }
        ?>





   </div>
   <div class="right-side-bar">
    <div id="search">
    <form method="POST" action="">
        <input type="text" name="searchuser" id="searchuser" placeholder="Search by username" onkeyup="searchUser()">
        <button type="submit" name="BTN_SEARCH" class="searchbutton"><img src="../assets/css/icons8-search-24.png" alt=""></button>
    </form>

    </div>
        <div id="search-results">


    
  


        </div>

<script src="../ajax/searchuser.js"></script>

</div>

</body>
</html>