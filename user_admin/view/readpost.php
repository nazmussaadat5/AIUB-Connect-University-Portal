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
    <title>Read Post</title>
    <link rel="stylesheet" href="../styles/readpost.css">
</head>
<body>
    <div id="login" align="left">
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend><h3>Read Post</h3></legend>
                        <div align="center">
                            <table>
                                <tr>
                                    <form action="../controller/readpostcontrol.php" method="POST">
                                        <td><input type="number" id="post_id" name="post_id" placeholder="Enter Post ID"required></td>
                                        <td><input type="submit" value="Read Post"></td>
                                    </form>
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
