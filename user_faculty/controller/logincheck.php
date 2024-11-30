<?php
include('../model/mydb.php');


$username = $password = $success = "";
$usernameErr = $passwordErr = $successErr = $validErr = "";
$haserror = false;
$login = false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = isset($_POST["username"]) ? test_input($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? test_input($_POST["password"]) : "";
    if (empty($username)) {
        $usernameErr = "*Username is required";
        $haserror = true;
    } else {


        if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/", $username)) {
            $usernameErr = "* Username must contain at least one letter (uppercase or lowercase) and one number";
            $haserror = true;
        }
    }
    if (empty($password)) {
        $passwordErr = "*Password is required";
        $haserror = true;
    } else {

        if (!preg_match("/^(?=.*[a-z]).{6,}$/", $password)) {
            $passwordErr = "Password incorrect";
            $haserror = true;
        }
    }


    if ($haserror == false) {

        $conn = new model();
        $conobj = $conn->OpenCon();
        $result = $conn->fetchUser($conobj, "users", $username, $password);
        if ($result && $result->num_rows > 0) {
            $login = true;
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['ID'];

            unset($_SESSION['cover_picture']);
            unset($_SESSION['profile_picture']);
            unset($_SESSION['bio']);
            $success = "Login Successful";
            header("Location: home.php");
            exit;
        } else {
            $successErr = "Check the credentials and try again.";
        }
        $conn->CloseCon($conobj);
    } else {
        $validErr = "Please enter correct information";
    }
}

