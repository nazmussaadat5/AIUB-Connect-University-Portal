<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}
?>
<?php include('../controller/homecontrol.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="../styles/homepage.css">
    <script src="../ajax/search.js"></script> 
</head>
<body>
    <form action="updateuserprofile.php" method="post">
        <div id="login" align="left">
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend><h3>Homepage</h3></legend>
                            <table>
                                <tr>
                                    <td><label for="username">Search user:</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" id="searchInput" placeholder="ID, Username, or Email">
                                        <button type="button" onclick="searchUser()">Search</button> 
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div id="searchResult"></div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left" adv> 
                                    <input type="submit" name="GoToupdateuserprofile" value="Update User" class="update-user-btn"><br><br>
                                        <a href="deleteuser.php">Delete account</a><br> <br>
                                        <a href="readpost.php">Read post</a><br><br>
                                        <a href="updatepost.php">Update post</a>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
