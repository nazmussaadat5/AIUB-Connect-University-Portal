<?php
include("../model/mydb.php");

$usernameErr = $nameErr = $emailErr = $dobErr = $genderErr = "";
$username = $name = $email = $dob = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['SearchUser'])) {
    $user_id = $_POST['user_id'];

    $mydb = new model();
    $connobj = $mydb->OpenCon();
    $result = $mydb->getUserDataById($connobj, "registration", $user_id);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $dob = $row['dob'];
        $gender = $row['gender'];
    } else {
        
        echo "User not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Update'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    

    $mydb = new model();
    $connobj = $mydb->OpenCon();
    $result = $mydb->UpdateUser($connobj, "registration", $user_id, $name, $email, $dob, $gender);
    if ($result === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connobj->error;
    }
}
if(isset($_POST['GoToBack']))
{
    header("Location: homepage.php");
    exit;
}
?>
