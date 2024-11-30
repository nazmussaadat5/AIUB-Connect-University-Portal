<?php
include("../model/mydb.php");
$model = new model();
$conn = $model->OpenCon();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["DLT_ACC"])) {
$userID = $_SESSION["ID"];
    $result = $model->deleteAccount($conn, "users", $userID);

    if ($result) {
        session_destroy();
        header("Location: login.php");
        exit;
    } else {
        echo "Error deleting account";
    }
}
$model->CloseCon($conn);


?>