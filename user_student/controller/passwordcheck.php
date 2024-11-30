<?php
include("../model/mydb.php");
$password="";
$passwordErr="";
$haserror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $password = isset($_POST["password"]) ? test_input($_POST["password"]) : "";

if(empty($password)){
    $passwordErr="*Password is required";
    $haserror = true;
}
else
{

    if(!preg_match("/^(?=.*[a-z]).{6,}$/",$password))
    {
        $passwordErr="Password must be at least 6 characters long and contain at least 1 lowercase letter";
        $haserror = true;
    }
}


    if ($haserror == false) {
        
        $conn = new model();
        $conobj = $conn->OpenCon();
        $result = $conn->enterpass($conobj, "users", $password);
        if ($result && $result->num_rows > 0) {
       
            header("Location: delete.php");
            exit;
        } else {
            $successErr = "Check the credentials and try again.";
        }
        $conn->CloseCon($conobj);

}
else{
    $validErr="Complete the form properly.";
}
}
?>