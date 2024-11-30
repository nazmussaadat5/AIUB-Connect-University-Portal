<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $commentresult = $model->fetchcomment($conn, "comments", "users", $post_id);
}
