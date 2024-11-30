<?php
include("../model/mydb.php");

$model = new model();
$conn = $model->OpenCon();


// Fetch posts
$result = $model->fetchposts($conn, "users", "userhome", "userprofile", $_SESSION['username']);

// Fetch user data
$userresult = $model->getuserdata($conn, "users", $_SESSION['username']);

if ($userresult && $userresult->num_rows > 0) {
    $row = $userresult->fetch_assoc();
    $name = $row["name"];
    $username = $row["username"];
}

// Fetch user profile information
$getresult = $model->getinfo($conn, "userprofile", $_SESSION['username']);

if ($getresult && $getresult->num_rows > 0) {
    $row = $getresult->fetch_assoc();
    $_SESSION['cover_picture'] = $row['cover_pic'];
    $_SESSION['profile_picture'] = $row['pro_pic'];
    $_SESSION['bio'] = $row['bio'];
}

// Handle post deletion
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_SEARCH"])) {
    $searchusername = $_POST["searchuser"];
    $usersearch = $model->searchuser($conn, "users", "userprofile", $searchusername);
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["username"])) {
    $viewedUsername = $_GET["username"];
    $viewsearchres = $model->fetchSearchedUserPosts($conn, "users", "userhome", "userprofile", $viewedUsername);
}  
$model->CloseCon($conn);
?>