<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}

include("../controller/setupcheck.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../styles/setup.css">

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit-container">
            <div class="header-container">
                <h2>Setup your profile</h2>
            </div>
            <div class="cover-container">
                <div class="cover-pic">
                    <input type="file" name="cover_pic" id="">
                    <img src="../assets/css/cover.png" alt="">
                </div>
            </div>
            <div class="profile-container">
                <div class="profile-pic">
                    <input type="file" name="pro_pic" id="">
                    <img src="../assets/css/default.jpg" alt="">
                </div>
            </div>
            <div class="info-container">
                <label for="Bio">Bio:</label>
                <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
            </div>
            <div class="button-container">
                <button type="submit" name="uploadimg">Setup</button>

            </div>
        </div>



    </form>

</body>

</html>