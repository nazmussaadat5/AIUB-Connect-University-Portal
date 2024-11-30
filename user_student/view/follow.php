<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;

}
include('../controller/followcheck.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
    <link rel="stylesheet" href="../styles/followlist.css">
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
    <div class="friend-container">
      <h2>Friend List</h2>
      <?php
      if($followerlistresult && $followerlistresult->num_rows>0){
        while($row=$followerlistresult->fetch_assoc()){
          echo "<a href='profile.php?username=" . $row["username"] . "' class='friend-item'>";
          echo "<div class='profile-pic'>";
          if (!empty($row["pro_pic"])) {
              echo "<img src='../assets/" . $row["pro_pic"] . "' alt=''>";
          } else {
              echo "<img src='../assets/css/default.jpg' alt=''>";
          }
          echo "</div>";
          echo "<div class='user-info'>";
          echo "<p><strong>" . $row["name"] . "</strong></p>";
          echo "<p>@" . $row["username"] . "</p>";
          echo "</div>";
          echo "<div class='unfollow-btn-container'>";
          echo "<form action='' method='post' >";
          echo "<input type='hidden' name='followedUsername' value='" . $row["username"] . "'>";
          echo "<button type='submit' name='btn_unfollow' value='unfollow'  >Unfollow</button>";
          echo "</form>";
          echo "</div>";
          echo "</a>";

        }
      }
      else{
        echo "<p>No friends found.</p>";
      }




      ?>



        


    </div>
  </div>


  <div class="right-side-bar">
    <div id="search">
    <form method="POST" action="">
        <input type="text" name="searchuser" id="searchuser" placeholder="Search by username">
        <button type="submit" name="BTN_SEARCH" class="searchbutton"><img src="../assets/css/icons8-search-24.png" alt=""></button>
    </form>
    </div>
        <div id="search-results">
            <h2>
                Search Results
            </h2>
            <?php
            if (isset($usersearch) && $usersearch !== null) {
                if ($usersearch->num_rows > 0) {
                    while ($row = $usersearch->fetch_assoc()) {
                        echo "<div class='search-result'>";
                        echo "<div class='profile-pic'>";
                        echo "<img src='../assets/" . $row["pro_pic"] . "' alt=''>";
                        echo "</div>";
                        echo "<div class='user-info'>";
                 
                        echo "<a href='searcheduserprofile.php?username=" . $row["username"] . "'>";
                        echo "<p><strong>" . $row["name"] . "</strong></p>";
                        echo "<p>@" . $row["username"] . "</p>";
                        echo "</a>";
                        echo "</div>";
                        echo "<div class='follow-btn-container'>";
                        echo "<button class='follow-btn'>Follow</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No users found.</p>";
                }
            }
            ?>


        </div>



</div>
  
</body>
</html>