<?php
include("../model/mydb.php");


if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    
    $mydb = new model();
    $connobj = $mydb->OpenCon();

    
    $result = $mydb->getUserDataById($connobj, "registration", $user_id);

 
    if ($result->num_rows > 0) {
  
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $username = $row["username"];
        $email = $row["email"];
        $dob = $row["dob"];
        $gender = $row["gender"];
    } else {
        echo "User not found.";
        exit; 
    }
} else {
    echo "Invalid user ID.";
    exit; 
}

?>
