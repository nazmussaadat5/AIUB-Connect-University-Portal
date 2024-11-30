<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uploadimg"])) {
    $username = $_SESSION['username'];
    $pro_pic = $_FILES["pro_pic"]["name"];
    $cover_pic = $_FILES["cover_pic"]["name"];
    $bio = $_POST["bio"];
    $tmp_name_pro_pic = $_FILES["pro_pic"]["tmp_name"];
    $tmp_name_cover_pic = $_FILES["cover_pic"]["tmp_name"];
    $destination_pro_pic = "../assets/" . $pro_pic;
    $destination_cover_pic = "../assets/" . $cover_pic;
    move_uploaded_file($tmp_name_pro_pic, $destination_pro_pic);
    move_uploaded_file($tmp_name_cover_pic, $destination_cover_pic);


    if ($model->CheckUser($conn, "users", $username)) {
        $imageresult = $model->uploadpic($conn, "userprofile", $pro_pic, $cover_pic, $username, $bio);
        if ($imageresult) {
            echo "Images uploaded successfully";
            header("Location: profile.php");
            exit;
        } else {
            echo "Error uploading images";
        }
    } else {
        echo "User does not exist in the system.";
    }
}

$model->CloseCon($conn);
