<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();

// Get the follower list
$followerUsername = $_SESSION['username'];
$followerlistresult=$model->getfollowerlist($conn,"users","follow","userprofile",$followerUsername);

//unfollow

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["btn_unfollow"])){
    $followerUsername = $_SESSION['username'];
    $followedUsername = $_POST["followedUsername"];
    $result = $model->unfollowUser($conn, "follow", $followerUsername, $followedUsername);
    if($result){
        echo "Unfollowed successfully";
    }
    else{
        echo "Error unfollowing user";
    }
}


$model->CloseCon($conn);




?>