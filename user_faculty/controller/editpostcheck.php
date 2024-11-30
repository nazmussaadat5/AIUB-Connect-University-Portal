<?php
include("../model/mydb.php");

$model = new model();
$conn = $model->OpenCon();


$post_text = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $result = $model->fetchspcposts($conn, "userhome", $post_id);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $post_text = $row["post_text"];
    } else {
        echo "Error fetching post";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["BTN_POST"])) {
    $post_id = $_POST["post_id"];
    $newpost = $_POST["post_text"];


    if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
        $newimage = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $destination = "../assets/" . $newimage;
        move_uploaded_file($tmp_name, $destination);
    } else {

        $result = $model->fetchspcposts($conn, "userhome", $post_id);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $newimage = $row["image"];
        } else {
            echo "Error fetching post";
            exit;
        }
    }

    $result = $model->editposts($conn, "userhome", $post_id, $newpost, $newimage);
    if ($result) {
        echo "Post updated successfully";
        header("Location:../view/home.php?post_edited=true");
        exit;
    } else {
        echo "Error updating post";
    }
    $model->CloseCon($conn);
}
