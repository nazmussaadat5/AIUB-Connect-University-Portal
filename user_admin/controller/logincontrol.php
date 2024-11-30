<?php
include("../model/mydb.php");

$loginErr=$unameErr=$passErr=$invalid="";
$login=false;
$haserror = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(empty($_POST["username"]))
    {
        $unameErr="*Username is required";
        $haserror = true;
    }
    else
    {
        $username=test_input($_POST["username"]);
    }

    if(empty($_POST["password"]))
    {
        $passErr="*Password is required";
        $haserror = true;
    }
    else
    {
        $password=test_input($_POST["password"]);
    }

    if($haserror==false)
    {
        $mydb = new model();
        $connobj = $mydb->OpenCon();
        $result = $mydb->SelectLogin($connobj,"registration",$username,$password);
        if($result->num_rows == 1)
        {
            $login=true;
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("Location: ../view/homepage.php");
        }
        else
        {
            $loginErr= "Invalid username or password";
        }
    }
    else
    {
        $invalid= "Invalid input";
    }
}

if(isset($_POST['GoToRegistration']))
{
    header("Location: registration.php");
    exit;
}
?>