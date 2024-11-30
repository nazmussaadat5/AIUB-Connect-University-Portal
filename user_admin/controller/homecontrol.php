<?php


include('../model/mydb.php');

if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];


    $model = new model();
    $conn = $model->OpenCon();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $result = $model->searchuser($conn, "registration", $search_query);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " | Username: " . $row["username"] . " | <a href='userprofile.php?id=" . $row["id"] . "'>View User Information</a><br>";
        }
    } else {
        echo "No user found.";
    }
    $conn->close();
}

if(isset($_POST['GoToupdateuserprofile']))
{
    header("Location: updateuserprofile.php");
    exit;
}


?>
