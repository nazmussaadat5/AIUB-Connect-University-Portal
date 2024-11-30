<?php


include("../model/mydb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new model();
    $conn = $db->OpenCon();

    if (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id']; 

        $result = $db->deleteUser($conn, 'registration', $id); 

        if ($result === TRUE) {
            echo "User account deleted successfully.";
        } else {
            echo "Error: Unable to delete user account.";
        }
    } else {
        echo "Error: User ID not provided.";
    }

    $conn->close();
}
?>
