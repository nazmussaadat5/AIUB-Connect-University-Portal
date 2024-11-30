<?php
class model{
    function OpenCon(){
        $conn=new mysqli("localhost","root","","myusers");
        return $conn;

    }
    function InsertUser($conn,$table,$name,$username,$email,$password,$dob,$gender)
    {
        $sql = "INSERT INTO $table (name, username, email, password, dob, gender) VALUES('$name','$username','$email','$password','$dob','$gender')";
        $result = $conn->query($sql);
        return $result;
    }

    function CheckUser($conn,$table,$username){
        $sql = "SELECT * FROM $table WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function enterpass($conn,$table,$password){
        $sql = "SELECT * FROM $table WHERE password='$password'";
        $result = $conn->query($sql);
        return $result;
    }


    function fetchUser($conn,$table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username='$username' AND  password='$password'";
        $result = $conn->query($sql);
        return $result;
    }

    function crposts($conn,$table,$username,$post_text,$post_date,$image){
        $sql="INSERT INTO $table(username,post_text,post_date,image) VALUES('$username','$post_text','$post_date','$image')";
        $result = $conn->query($sql);
        return $result;
    }
    function fetchposts($conn, $table1, $table2, $table3, $username) {
        $sql = "SELECT u.name, uh.username, uh.post_text, uh.post_date, uh.image, uh.post_id, up.pro_pic
                FROM $table1 u
                JOIN $table2 uh ON u.username = uh.username
                LEFT JOIN $table3 up ON u.username = up.username
                WHERE uh.username = '$username'
                ORDER BY uh.post_date DESC";
        $result = $conn->query($sql);
        return $result;
    }
    function fetchSearchedUserPosts($conn, $table1, $table2, $table3, $viewedUsername) {
        $sql = "SELECT u.name, uh.username, uh.post_text, uh.post_date, uh.image, uh.post_id, up.pro_pic
                FROM $table1 u
                JOIN $table2 uh ON u.username = uh.username
                LEFT JOIN $table3 up ON u.username = up.username
                WHERE uh.username = '$viewedUsername'
                ORDER BY uh.post_date DESC";
        $viewsearchres = $conn->query($sql);
        return $viewsearchres;
    }
    function fetchspcposts($conn,$table,$post_id){
        $sql="SELECT *FROM $table WHERE post_id='$post_id'";
        $result = $conn->query($sql);
        return $result;

    }
    function editposts($conn,$table,$post_id,$newpost,$newimage){
        $sql="UPDATE $table SET post_text='$newpost', image='$newimage' WHERE post_id='$post_id'";
        echo "SQL Query: " . $sql; 
        $result = $conn->query($sql);
        return $result;
    }
    function deleteposts($conn,$table,$post_id){
        $sql="DELETE FROM $table WHERE post_id='$post_id'";
        $result = $conn->query($sql);
        return $result;

    }
       function getuserdata($conn,$table,$username){
        $sql="SELECT * FROM $table WHERE username='$username'";
        $userresult = $conn->query($sql);
        return $userresult;
    }
    function uploadpic($conn,$table,$pro_pic,$cover_pic,$username,$bio){
        $sql = "INSERT INTO $table (username, pro_pic, cover_pic,bio) VALUES ('$username', '$pro_pic', '$cover_pic','$bio')";
                                               
        $imageresult = $conn->query($sql);
        return $imageresult;
    }
    function getinfo($conn,$table,$username){
        $sql="SELECT * FROM $table WHERE username='$username'";
        $getresult = $conn->query($sql);
        return $getresult;
    }

    function updateprofile($conn,$table,$username,$new_cover,$new_pro_pic,$new_bio){

        $sql="UPDATE $table SET cover_pic='$new_cover', pro_pic='$new_pro_pic', bio='$new_bio' WHERE username='$username'";
        $up_result = $conn->query($sql);    
        return $up_result;
    }
    function searchuser($conn,$table1,$table2,$username){
        $sql= " SELECT u.username, u.name, up.pro_pic
                FROM $table1 u
                LEFT JOIN $table2 up ON u.username = up.username WHERE u.username LIKE '%$username%'";
        $usersearch = $conn->query($sql);
        return $usersearch;
    }

    function followuser($conn,$table,$follower_username,$followed_username){
        $sql="INSERT INTO $table(follower_username,followed_username) VALUES('$follower_username','$followed_username')";
        $fresult = $conn->query($sql);
        return $fresult;
    }

    function getfollowerlist($conn,$table1,$table2,$table3,$followerUsername){
  $sql="SELECT u.name,u.username,up.pro_pic
        FROM $table1 u
        INNER JOIN $table2 f ON f.followed_username=u.username
        LEFT JOIN $table3 up ON u.username=up.username
        WHERE f.follower_username='$followerUsername'";
        
        $followerlistresult = $conn->query($sql);
        return $followerlistresult;

        
        
    }

    function unfollowuser($conn,$table,$followerUsername,$followedUsername){
        $sql="DELETE FROM $table WHERE follower_username='$followerUsername' AND followed_username='$followedUsername'";
        $result = $conn->query($sql);
        return $result;
    }

function createnotification($conn,$table,$from_username,$to_username,$notification_text,$notification_date){
    $sql="INSERT INTO $table(from_username,to_username,notification_text,notification_date) VALUES('$from_username','$to_username','$notification_text','$notification_date')";
    $crnotresult = $conn->query($sql);
    return  $crnotresult;

}
function getnotification($conn,$table1,$table2,$to_username){
    $sql="SELECT n.notification_id,n.notification_text,n.from_username,n.to_username,n.notification_date
          FROM $table1 n
          JOIN $table2 u ON n.to_username=u.username
          WHERE n.to_username='$to_username'
          ORDER BY n.notification_date DESC";
    
    $notificationResult = $conn->query($sql);
    return $notificationResult;

    
}
function likePost($conn, $table, $post_id, $liked_username, $got_liked, $like_date) {
    $sql = "INSERT INTO $table (post_id, liked_username, got_liked, like_date) VALUES ('$post_id', '$liked_username', '$got_liked', '$like_date')";
    $likeResult = $conn->query($sql);
    return $likeResult;
}

function createcomment($conn, $table, $post_id, $from_username, $to_username, $comment_text, $comment_date){
    $sql = "INSERT INTO $table (post_id, from_username, to_username, comment_text, comment_date) VALUES ('$post_id', '$from_username', '$to_username', '$comment_text', '$comment_date')";
    $commentResult = $conn->query($sql);
    return $commentResult;
}
function fetchComment($conn, $table1, $table2, $table3, $from_username) {
    $sql = "SELECT c.comment_id, c.post_id, c.from_username, c.to_username, c.comment_text, c.comment_date, u.name, up.pro_pic
          FROM $table1 c
          JOIN $table2 u ON c.from_username = u.username
          LEFT JOIN $table3 up ON c.from_username = up.username
          WHERE c.from_username = '$from_username'
          ORDER BY c.comment_date DESC";
    $commentResult = $conn->query($sql);
    return $commentResult;
}

function createmessage($conn,$table,$sender_username,$recipient_username,$message_text,$message_date){
    $sql="INSERT INTO $table(sender_username,recipient_username,message_text,message_date) VALUES('$sender_username','$recipient_username','$message_text','$message_date')";
    $msgresult = $conn->query($sql);
    return $msgresult;
}
function getmessage($conn,$table1,$table2,$table3,$sender_username,$recipient_username){
    $sql="SELECT m.message_id,m.sender_username,m.recipient_username,m.message_text,m.message_date,u.name,up.pro_pic
            FROM $table1 m
            JOIN $table2 u ON m.sender_username=u.username
            LEFT JOIN $table3 up ON m.sender_username=up.username
            WHERE (m.sender_username='$sender_username' AND m.recipient_username='$recipient_username') OR (m.sender_username='$recipient_username' AND m.recipient_username='$sender_username')
            ORDER BY m.message_date ASC";  
    $getmsgresult = $conn->query($sql);
    return $getmsgresult;

}

function deleteAccount($conn, $table, $userID) {
    $sql = "DELETE FROM $table WHERE ID = '$userID'";
    $result = $conn->query($sql);
    return $result;
}






    
    
    




    


















    function CloseCon($conn)
    {
        $conn -> close();
    }


}


?>