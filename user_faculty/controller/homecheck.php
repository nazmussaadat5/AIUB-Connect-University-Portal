<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}

include("../model/mydb.php");

$model = new model();
$conn = $model->OpenCon();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_POST"])) {
    $post_text = $_POST["post_text"];
    $post_date = date("Y-m-d");
    $image = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $destination = "../assets/" . $image;
    move_uploaded_file($tmp_name, $destination);

    $name = $_SESSION['name'];
    $username = $_SESSION['username'];

    $result = $model->crposts($conn, "userhome", $username, $post_text, $post_date, $image);

    if ($result) {
        echo "Post created successfully";
        header("Location: home.php");
        exit;
    } else {
        echo "Error creating post";
    }
}


$result = $model->fetchposts($conn, "users", "userhome", "userprofile", $_SESSION['username']);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_DELETE"])) {
    $post_id = $_POST["post_id"];
    $result = $model->deleteposts($conn, "userhome", $post_id);
    if ($result) {
        echo "Post deleted successfully";
        header("Location:home.php");
        exit;
    } else {
        echo "Error deleting post";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchuser"])) {
    $searchusername = $_POST["searchuser"];
    $usersearch = $model->searchuser($conn, "users", "userprofile", $searchusername);

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

            echo "</div>";
        }
    } else {
        echo "<p>No users found.</p>";
    }
    exit;
}



$model->CloseCon($conn);
