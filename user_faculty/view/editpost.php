<?php
include("../controller/editpostcheck.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../styles/editpost.css">
</head>

<body>
    <div class="container">
        <h1>Edit Post</h1>

        <form method="post" action="" enctype="multipart/form-data">

            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <textarea name="post_text" rows="4" cols="50"><?php echo $post_text; ?></textarea>

            <label for="image" class="upload-pic">
                <img src="../assets/css/color-picker_12206192.png" alt="Upload Icon"> Upload Image
            </label>

            <input type="file" name="image" id="image">
            <button type="submit" name="BTN_POST">Update Post</button>

        </form>
    </div>
</body>

</html>