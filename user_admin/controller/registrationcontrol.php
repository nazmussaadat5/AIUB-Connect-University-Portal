<?php
include("../model/mydb.php");

$email= $name=$password=$gender=$dob=$username=$success="";
$emailErr= $nameErr=$passwordErr=$genderErr=$dobErr=$usernameErr=$successErr=$validErr="";
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


if(empty($_POST["name"]))
{
    $nameErr="Name is required";
    $haserror=true;
}
else
{
    $name=test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
{
    $nameErr="Name Should be only contain Alphabets";
}
}


if(empty($_POST["username"])) {
    $usernameErr = "*Username is required";
    $haserror = true;
} elseif(strlen($_POST["username"]) < 5) {
    $usernameErr = "*At least 5 characters long";
    $haserror = true;
} else {
    $username = test_input($_POST["username"]);
}
    

if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
    $haserror = true;
} else {
    $email = test_input($_POST["email"]);
    if (!strpos($email, '@') || !strpos($email, '.com')) {
        $emailErr = "Invalid email format";
    }
}



if(empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $haserror = true;
} else {
    $password = test_input($_POST["password"]);
    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d@$!%*?&]{5,}$/", $password)) {
        $passwordErr = "At least 5 characters, one uppercase, and one lowercase letter required";
        $haserror = true;
    }
}


    if(empty($_POST["dob"]))
    {
        $dobErr="*Date of Birth is required";
        $haserror = true;
    }
    else
    {
        $dob=test_input($_POST["dob"]);
    }


    if (empty($_POST["gender"])) 
    {
        $genderErr = "*Gender is required";
        $haserror = true;
    }
    else 
    {
        $gender = test_input($_POST["gender"]);
    }

    if($haserror==false)
    {
        
        $mydb = new model();
        $conobj = $mydb->OpenCon();
        $result = $mydb->InsertUser($conobj,"registration",$name,$username,$email,$password,$dob,$gender);
        if($result===TRUE)
        {
            $success= "Registration Successful";
        }
        else
        {
            $successErr= "Registration Failed ".$conobj->error;
        }
        
    }
    
}

if(isset($_POST['GoToLogin']))
{
    header("Location: login.php");
    exit;
}
?>