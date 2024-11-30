<?php
class model
{
    function OpenCon()
    {
        $conn = new mysqli("localhost", "root", "", "myuser");
        return $conn;
    }

    function InsertUser($conn, $table, $name, $username, $email, $password, $dob, $gender)
    {
        $sql = "INSERT INTO $table (name, username, email, password, dob, gender) VALUES('$name','$username','$email','$password','$dob','$gender')";
        $result = $conn->query($sql);
        return $result;
    }

    function SelectLogin($conn, $table, $username, $password)
    {
        $sql = "SELECT username, password from $table WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        return $result;
    }

    function searchuser($conn, $table, $search_query)
    {
        $sql = "SELECT id, username, email, name FROM $table WHERE username LIKE '%$search_query%' OR email LIKE '%$search_query%' OR id = '$search_query'";
        $usersearch = $conn->query($sql);
        return $usersearch;
    }

    function getUserDataById($conn, $table, $user_id) {
        $sql = "SELECT * FROM $table WHERE id = '$user_id'";
        $result = $conn->query($sql);
        return $result;
    }

    function UpdateUser($conn, $table, $user_id, $name, $email, $dob, $gender) {
        $sql = "UPDATE $table SET name='$name', email='$email', dob='$dob', gender='$gender' WHERE id='$user_id'";
        $result = $conn->query($sql);
        return $result;
    }

    function InsertWarning($conn, $table, $user_id, $msg)
    {
        $msg = $conn->real_escape_string($msg);
        $timestamp = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO $table (id, msg, time) VALUES ('$user_id', '$msg', '$timestamp')";
        $result = $conn->query($sql);
        return $result;
    }

    function deleteUser($conn, $table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    function getUserPostById($conn, $table, $post_id)
        {
            $stmt = $conn->prepare("SELECT post_text FROM $table WHERE post_id = ?");
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc();
        }

        function updatePost($conn, $table, $post_id, $updated_post_text)
        {
            $stmt = $conn->prepare("UPDATE $table SET post_text = ? WHERE post_id = ?");
            $stmt->bind_param("si", $updated_post_text, $post_id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        
}
?>