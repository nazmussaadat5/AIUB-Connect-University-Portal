<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}
include("../controller/suserprofilecheck.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searched User Profile</title>
    <link rel="stylesheet" href="../styles/searcheduser.css">
</head>

<body>
    <h2 class="Name"><?php echo $name; ?></h2>
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

            <div class="cover-container">
                <div class="cover-pic">

                    <?php
                    if (isset($_SESSION['cover_picture'])) {
                        echo "<img src='../assets/" . $_SESSION['cover_picture'] . "' alt=''>";
                    } else {
                        echo "<img src='../assets/css/cover.png' alt=''>";
                    }
                    ?>
                </div>
                <div class="infomation">
                    <h2><?php echo $name; ?></h2>
                    <p>@<?php echo $username; ?></p>

                    <?php
                    if (isset($_SESSION['bio'])) {
                        echo "<p>" . $_SESSION['bio'] . "</p>";
                    }
                    ?>
                </div>
                <div class='follow-btn-container'>
                    <form action="" method="post">
                        <input type="hidden" name="followed_username" value="<?php echo isset($username) ? $username : ''; ?>">

                        <button type="submit" name="BTN_FOLLOW" class="follow-btn">Follow</button>



                    </form>

                </div>
            </div>
            <div class="profile-container">
                <div class="top-profile-pic">
                    <?php
                    if (isset($_SESSION['profile_picture'])) {
                        echo "<img src='../assets/" . $_SESSION['profile_picture'] . "' alt=''>";
                    } else {
                        echo "<img src='../assets/css/default.jpg' alt=''>";
                    }
                    ?>
                </div>
            </div>

            <div id="recent-tweets">
                <h2>Recent posts</h2>
                <?php
                if ($viewsearchres && $viewsearchres->num_rows > 0) {
                    while ($row = $viewsearchres->fetch_assoc()) {
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

                        echo "<a href='comment.php?post_id=" . $row["post_id"] . "'><img src='../assets/css/icons8-comment-24.png' alt=''></a>";

                        echo "</div>";


                        echo "</div>";
                    }
                } else {
                    echo "<p>No tweets found.</p>";
                }
                ?>
                <?php





                if ($commentResult && $commentResult->num_rows > 0) {
                    while ($row = $commentResult->fetch_assoc()) {
                        echo "<div class='comment'>";
                        echo "<p><strong>" . $row["from_username"] . "</strong></p>";
                        echo "<p>" . $row["comment_text"] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No comments found</p>";
                }

                ?>









            </div>

            <div class="right-side-bar">
                <div id="search">
                    <form method="POST" action="">
                        <input type="text" name="searchuser" id="searchuser" placeholder="Search by username" onkeyup="searchUSER()">
                        <button type="submit" name="BTN_SEARCH" class="searchbutton"><img src="../assets/css/icons8-search-24.png" alt=""></button>

                    </form>

                </div>
                <div id="search-results">

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