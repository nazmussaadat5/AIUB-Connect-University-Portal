<?php
include("../model/mydb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];

    $mydb = new model();
    $connobj = $mydb->OpenCon();
    $post_data = $mydb->getUserPostById($connobj, "userhome", $post_id);

    if ($post_data !== null) {
        echo "Post Text: " . $post_data['post_text'];
    } else {
        echo "Post not found.";
    }
}
?>
