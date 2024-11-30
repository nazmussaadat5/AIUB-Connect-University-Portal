<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}

include("../model/mydb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new model();
    $conn = $db->OpenCon();

    $user_id = $_POST['id']; 
    $msg = $_POST['msg'];

    $result = $db->InsertWarning($conn, 'warning', $user_id, $msg);
    if ($result === TRUE) {
        echo "Warning added successfully.";
    } else {
        echo "Error: " . $conn->error; 
    }

    $conn->close();
}
?>
