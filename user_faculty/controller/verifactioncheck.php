<?php
include("../model/mydb.php");

$model = new model();
$conn = $model->OpenCon();
$userresult = $model->getuserdata($conn, "users", $_SESSION['username']);

if ($userresult && $userresult->num_rows > 0) {
    $row = $userresult->fetch_assoc();
    $name = $row["name"];
    $username = $row["username"];
}


$getresult = $model->getinfo($conn, "userprofile", $_SESSION['username']);

if ($getresult && $getresult->num_rows > 0) {
    $row = $getresult->fetch_assoc();
    $_SESSION['profile_picture'] = $row['pro_pic'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_VER"])) {
    $email = $_POST["email"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $username = $_SESSION["username"];
    $userresult = $model->getuserdata($conn, "users", $_SESSION['username']);

    if ($userresult && $userresult->num_rows > 0) {
        $row = $userresult->fetch_assoc();
        if ($email === $row["email"]) {
            $Vafresult = $model->verficationfac($conn, "verifaction", $email, $department, $position, $username);
            if ($Vafresult) {
                header("Location:../view/home.php");
                exit;
            } else {
                echo "Error in verifaction";
            }
        } else {
            header("Location:../view/logout.php");
        }
    }
}
$model->CloseCon($conn);
