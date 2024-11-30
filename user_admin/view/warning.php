<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles/warningpage.css">
</head>
<body>
    <div id="login" align="left">
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend><h3>Warning Page</h3></legend>
                        <div align="center">
                            <table>
                                <form action="../controller/warningcontrol.php" method="POST">
                                    <label for="id">User ID:</label><br>
                                    <input type="number" id="id" name="id"><br>
                                    <label for="msg">Enter Warning Message:</label><br>
                                    <textarea id="msg" name="msg" rows="4" cols="50"></textarea><br>
                                    <input type="submit" value="Submit">
                                </form>
                            </table>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
