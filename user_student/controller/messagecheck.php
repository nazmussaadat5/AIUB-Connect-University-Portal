<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["username"])) {
    $viewedUsername = $_GET["username"];
    
    $userresult = $model->getuserdata($conn, "users", $viewedUsername);

    if ($userresult && $userresult->num_rows > 0) {
        $row = $userresult->fetch_assoc();
        $name = $row["name"];
        $username = $row["username"];
        $getresult = $model->getinfo($conn, "userprofile", $viewedUsername);

        if ($getresult && $getresult->num_rows > 0) {
            $row = $getresult->fetch_assoc();
            
            $_SESSION['profile_picture'] = $row['pro_pic'];
            
        }
    }
    


}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["BTN_SEND"])){
    $sender_username = $_SESSION['username'];
    $recipient_username = $_GET["username"];
    $message_text = $_POST["message_text"];
    $message_date = date('Y-m-d H:i:s');
    $msgresult=$model->createmessage($conn,"messages", $sender_username, $recipient_username, $message_text, $message_date);
 if($msgresult){
    header("Location:Message.php?username=".$recipient_username);
    exit;
 }
    else{
        echo "Error sending message";
    }

}

if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["username"])){
    $recipient_username=$_GET["username"];
    $sender_username=$_SESSION["username"];
    $getmsgresult=$model->getmessage($conn,"messages","users","userprofile",$sender_username,$recipient_username);
}


?>