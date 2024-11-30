<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}
?>
<?php
include("../controller/userprofilecontrol.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles/userprofile.css">
</head>
<body>
    <div id="login" align="left">
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend><h3>Personal Information</h3></legend>
                        <div align="center">
                            <table>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>User Name:</strong></td>
                                    <td><?php echo $username; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Birth:</strong></td>
                                    <td><?php echo $dob; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td><?php echo $gender; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><br>
                                        
                                        <button onclick="window.location.href='warning.php?id=<?php echo $user_id; ?>'">Warning</button>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
