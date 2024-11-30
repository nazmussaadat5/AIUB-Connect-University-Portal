<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}

include("../controller/editprofilecheck.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="../styles/ediprofile.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit-container">
            <div class="header-container">
                <h2>Edit your profile</h2>
            </div>
            <div class="cover-container">
                <div class="cover-pic">
                    <input type="file" name="cover_pic" id="cover_pic">
                    <img src="../assets/<?php echo $cover_pic; ?>" alt="">
                </div>
            </div>
            <div class="profile-container">
                <div class="profile-pic">
                    <input type="file" name="pro_pic" id="pro_pic">
                    <img src="../assets/<?php echo $pro_pic; ?>" alt="">
                </div>
            </div>
            <div class="info-container">
                <label for="bio">Bio:</label>
                <textarea name="bio" id="bio" cols="30" rows="10"><?php echo $bio; ?></textarea>
            </div>
            <div class="button-container">
                <button type="submit" name="update_profile">Update</button>
            </div>
        </div>
    </form>
</body>

</html>