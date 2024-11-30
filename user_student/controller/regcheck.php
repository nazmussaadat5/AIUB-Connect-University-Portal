<?php

include('../model/mydb.php');

$email= $name=$password=$gender=$dob=$username=$success="" ;
$emailErr= $nameErr=$passwordErr=$genderErr=$dobErr=$usernameErr=$successErr=$chckuserErr=$validErr="";
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

    $name = isset($_POST["name"]) ? test_input($_POST["name"]) : "";
    $username = isset($_POST["username"]) ? test_input($_POST["username"]) : "";
    $email = isset($_POST["email"]) ? test_input($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? test_input($_POST["password"]) : "";
    $dob = isset($_POST["dob"]) ? test_input($_POST["dob"]) : "";
    $gender = isset($_POST["gender"]) ? test_input($_POST["gender"]) : "";

    if(empty($name))
    {
        $nameErr="*Name is required";
        $haserror = true;
    }
    else {

       
        if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $nameErr = "* Only letters and white space allowed";
            $haserror = true;
           
        }

    }

    if(empty($username)){
        $usernameErr="*Username is required";
        $haserror = true;
    }
    else {
    
       
        if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/", $username)) {
            $usernameErr = "* Username must contain at least one letter (uppercase or lowercase) and one number";
            $haserror = true;
          
        }
    }

    if(empty($email))
    {
        $emailErr = "*Email is required";
        $haserror = true;
    }
    else
    {
       
        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_REQUEST["email"]))
        {
            $emailErr = "Invalid email format: ";
            $haserror = true;
        }
    }

    if(empty($password))
    {
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

  
    if(empty($dob)) {
        $dobErr="*Date of Birth is required";
        $haserror = true;
    }

    if (empty($gender)) {
        $genderErr = "*Gender is required";
        $haserror = true;
    }

   
    if($haserror == false) {
        $conn = new model();
        $conobj = $conn->OpenCon();

        if ($conobj->connect_error) {
            die("Connection failed: " . $conobj->connect_error);
        }

        $checkexist = $conn->CheckUser($conobj, "users", $username);
        if($checkexist === true) {
            $chckuserErr = "Username already exists";
            $haserror = true;
        } else {
            $result = $conn->InsertUser($conobj, "users", $name, $username, $email, $password, $dob, $gender);
            if($result === true) {
                $success = "Registration Successful";
            } else {
                $successErr = "Registration Failed " . $conobj->error;
            }
        }

        $conn->CloseCon($conobj);
    } else {
        $validErr = "Complete the validation first";
    }
}








?>