<?php
include('../model/mydb.php');
$model = new model();
$conn = $model->OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
    $username = $_SESSION['username'];
    $new_cover = "";
    $new_pro_pic = "";
    $new_bio = $_POST['bio'];


    if (isset($_FILES["cover_pic"]) && $_FILES["cover_pic"]["name"] !== '') {
        $new_cover = $_FILES['cover_pic']['name'];
        $cover_pic_temp = $_FILES['cover_pic']['tmp_name'];
        move_uploaded_file($cover_pic_temp, "../assets/$new_cover");
    } else {

        $getresult = $model->getinfo($conn, "userprofile", $username);
        if ($getresult && $getresult->num_rows > 0) {
            $row = $getresult->fetch_assoc();
            $new_cover = $row['cover_pic'];
        }
    }

    
    if (isset($_FILES["pro_pic"]) && $_FILES["pro_pic"]["name"] !== '') {
        $new_pro_pic = $_FILES['pro_pic']['name'];
        $pro_pic_temp = $_FILES['pro_pic']['tmp_name'];
        move_uploaded_file($pro_pic_temp, "../assets/$new_pro_pic");
    } else {
        
        $getresult = $model->getinfo($conn, "userprofile", $username);
        if ($getresult && $getresult->num_rows > 0) {
            $row = $getresult->fetch_assoc();
            $new_pro_pic = $row['pro_pic'];
        }
    }

    $up_result = $model->updateprofile($conn, "userprofile", $username, $new_cover, $new_pro_pic, $new_bio);
    if ($up_result) {
        echo "update successful";
        header('Location:profile.php');
        exit;
    } else {
        echo "update failed";
    }
}

$getresult = $model->getinfo($conn, "userprofile", $_SESSION['username']);

$cover_pic = "";
$pro_pic = "";
$bio = "";

if ($getresult && $getresult->num_rows > 0) {
    $row = $getresult->fetch_assoc();
    $cover_pic = $row['cover_pic'];
    $pro_pic = $row['pro_pic'];
    $bio = $row['bio'];
}

$model->CloseCon($conn);
?>
