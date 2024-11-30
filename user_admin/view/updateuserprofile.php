<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}
?>

<?php
include("../controller/updateuserprofilecontrol.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Info</title>
    <link rel="stylesheet" href="../styles/updateuserprofile.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div id="login" align="left">   
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend><h3>Update Information</h3></legend>
                            <table>

                                <!-- Add field to enter user ID -->
                                <tr>
                                    <td><label for="user_id">User ID:</label></td>
                                    <td><input type="text" name="user_id" id="user_id" placeholder="Enter User ID"></td>
                                    <td><input type="submit" name="SearchUser" value="Search User"></td>
                                </tr>
                                <!-- Form fields for user data -->
                                <tr>
                                    <td><label for="name">Name:</label></td>
                                    <td><input type="text" name="name" id="name" placeholder="Enter New name" value="<?php echo $name; ?>"></td>
                                    <td><?php echo $nameErr; ?></td>
                                </tr>
                                <tr>
                                    <td><label for="email">Email:</label></td>
                                    <td><input type="text" name="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>"></td>
                                    <td><?php echo $emailErr; ?></td>
                                </tr>
                                <tr>
                                    <td><label for="dob">Date of Birth:</label></td>
                                    <td><input type="date" name="dob" id="dob" value="<?php echo $dob; ?>"></td>
                                    <td><?php echo $dobErr; ?></td>
                                </tr>
                                <tr>
                                    <td><label for="gender">Gender:</label></td>
                                    <td>
                                        <select name="gender" id="gender">
                                            <option value="male" <?php if ($gender == "male") echo "selected"; ?>>Male</option>
                                            <option value="female" <?php if ($gender == "female") echo "selected"; ?>>Female</option>
                                        </select>
                                    </td>
                                    <td><?php echo $genderErr; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center"><input type="submit" name="Update" value="Update"></td>
                                </tr>
                                <tr>
                                <td colspan="2" align="center" adv>
                                <input type="submit" name="GoToBack" value="Go Back">
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
