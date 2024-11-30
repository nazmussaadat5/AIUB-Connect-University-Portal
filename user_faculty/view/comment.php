<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
}

include_once("../controller/suserprofilecheck.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link rel="stylesheet" href="../styles/comment.css">
</head>

<body>
    <div class="comment-container">
        <h1>Leave Your Comment</h1>
        <div class="post-content">

            <p><?php echo "<label >Reply To This Post:</label>"  . $post_text; ?> </p>
        </div>
        <form action="" method="post">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">



            <textarea name="comment_text" rows="2" cols="50" placeholder="Write your comment here"></textarea>
            <button type="submit" name="BTN_COMMENT">Comment</button>
            <button type="submit" name="BTN_HOME"><a href="home.php">Back To Home</a></button>
        </form>

    </div>
</body>

</html>