<?php


include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["username"])) {
    $viewedUsername = $_GET["username"];
    $viewsearchres = $model->fetchSearchedUserPosts($conn, "users", "userhome", "userprofile", $viewedUsername);
    $userresult = $model->getuserdata($conn, "users", $viewedUsername);

    if ($userresult && $userresult->num_rows > 0) {
        $row = $userresult->fetch_assoc();
        $name = $row["name"];
        $username = $row["username"];
        $getresult = $model->getinfo($conn, "userprofile", $viewedUsername);

        if ($getresult && $getresult->num_rows > 0) {
            $row = $getresult->fetch_assoc();
            $_SESSION['cover_picture'] = $row['cover_pic'];
            $_SESSION['profile_picture'] = $row['pro_pic'];
            $_SESSION['bio'] = $row['bio'];
        }
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
//follow
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["BTN_FOLLOW"])){
    $followedUsername=$_POST["followed_username"];
    $followerUsername=$_SESSION["username"];
    $fresult=$model->followuser($conn,"follow",$followerUsername,$followedUsername);
    $from_username=$_SESSION["username"];
    $to_username=$followedUsername;
    $notificationText=$from_username." followed you";
    $notificationDate=date("Y-m-d H:i:s");
    $crnotresult=$model->createNotification($conn, "notifications", $from_username, $to_username, $notificationText, $notificationDate);
    if($fresult){
        header("Location: searcheduserprofile.php?username=$followedUsername");
        exit;
    }
}
//like
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["BTN_LIKE"])){
    $post_id=$_POST["post_id"];
    $liked_username=$_SESSION["username"];

    $like_date = date("Y-m-d H:i:s");
    $result = $model->fetchSpcPosts($conn, "userhome", $post_id);
    if($result && $result->num_rows>0){
        $row=$result->fetch_assoc();
        
        $got_liked=$row["username"];
        $likeResult = $model->likePost($conn, "likes", $post_id, $liked_username, $got_liked, $like_date);
       if( $likeResult){
              $notificationText = $liked_username . " liked your post";
              $notificationDate = date("Y-m-d H:i:s");
              $crnotresult = $model->createNotification($conn, "notifications", $liked_username, $got_liked, $notificationText, $notificationDate);
                header("Location: searcheduserprofile.php?username=$got_liked");
                exit;
               
       }
       else{
              echo "Error liking post";
             
       }
    }
    else{
        echo "Error fetching post";
       
    }
}


//comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_COMMENT"])) {
    $post_id = $_POST["post_id"];
    $comment_text = $_POST["comment_text"];
    $comment_date = date("Y-m-d H:i:s");
    $from_username = $_SESSION["username"];
    $to_username = ""; 

    
    $result = $model->fetchspcposts($conn, "userhome", $post_id);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $to_username = $row["username"]; 
       
    } else {
        echo "Error fetching post";
        exit;
    }

 
    $commentResult = $model->createcomment($conn, "comments", $post_id, $from_username, $to_username, $comment_text, $comment_date);
    if ($commentResult) {
        $notificationText = $from_username . " commented on your post";
        $notificationDate = date("Y-m-d H:i:s");
        $crnotresult = $model->createNotification($conn, "notifications", $from_username, $to_username, $notificationText, $notificationDate);
      

        header("Location: searcheduserprofile.php?username=$to_username");
        exit;
    }

}

$post_text = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $result = $model->fetchspcposts($conn, "userhome", $post_id);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $post_text = $row["post_text"];
    } else {
        echo "Error fetching post";
        exit;
    }
} else {
   
    $post_text = "";
}

//fetch comment
$commentResult=$model->fetchComment($conn,"comments","users","userprofile",$_SESSION['username']);

$model->CloseCon($conn);
?>