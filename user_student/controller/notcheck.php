<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();

$to_username=$_SESSION["username"];
$notificationResult=$model->getnotification($conn, "notifications", "users", $to_username);



$model->CloseCon($conn);


?>