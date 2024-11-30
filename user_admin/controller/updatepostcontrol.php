<?php
include("../model/mydb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];

    $mydb = new model();
    $connobj = $mydb->OpenCon();
    $post_data = $mydb->getUserPostById($connobj, "userhome", $post_id);

    if ($post_data !== null) {
        
        $post_text = $post_data['post_text'];
    } else {
        
        $post_text = "Post not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_post'])) {
    $updated_post_text = $_POST['updated_post_text'];
    
    $post_id = $_POST['post_id_hidden'];

    $mydb = new model();
    $connobj = $mydb->OpenCon();
    $result = $mydb->updatePost($connobj, "userhome", $post_id, $updated_post_text);

    if ($result === TRUE) {
        echo "Post updated successfully";
    } else {
        echo "Error updating post: " . $connobj->error;
    }
}
?>
