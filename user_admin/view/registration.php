<?php
include('../controller/registrationcontrol.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Registration </title>
        <link rel="stylesheet" href="../styles/registration.css">
    </head>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div id="login" align="left">   
            <table>
                <tr>
                    <td>
                        <fieldset>
                        <legend class="signup-header"><h3>Sign Up Page</h3></legend>
                       
                        <table>
                            <tr>
                                <td colspan = "3" align="center">
                                <?php echo $success; ?>
                                <?php echo $successErr; ?>
                                <?php echo $validErr; ?>   
                                </td>
                            </tr>
                            <tr>
                                <td><label for="name">Name:</label></td>
                                <td><input type="text" name="name" id="name" placeholder="Enter your name"></td>
                                <td><span class="error"><?php echo $nameErr;?></span></td>
                            </tr>
                            <tr>
                                <td><label for="username">Username:</label></td>
                                <td><input type="text" name="username" id="username" placeholder="Enter your username"></td>
                                <td><span class="error"><?php echo $usernameErr;?></span></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email:</label></td>
                                <td><input type="text" name="email" id="email" placeholder="Enter your email"></td>
                                <td><span class="error"><?php echo $emailErr;?></span></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password:</label></td>
                                <td><input type="password" name="password" id="password" placeholder="Enter your password"></td>
                                <td><span class="error"><?php echo $passwordErr;?></span></td>
                            </tr>
                            <tr>
                                <td><label for="dob">Date of Birth:</label></td>
                                <td><input type="date" name="dob" id="dob" ></td>
                                <td><span class="error"><?php echo $dobErr;?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="gender">Gender:</label>
                                </td>
                                <td>
                                    <input type="radio" name="gender" value="Male"<?php echo isset($gender) && $gender=="Male" ?  : ""; ?>>
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="Female"<?php echo isset($gender) && $gender=="Female" ?  : ""; ?>>
                                    <label for="female">Female</label>
                                    <span class="error"><?php echo $genderErr; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                <input type="submit" name="Registration" value="Sign Up">
                                <input type="reset" name="reset" value="Reset">
                            </tr>
                            <tr>
                                <td colspan="2" align="center" adv><br>Already a member?
                                <input type="submit" name="GoToLogin" value="Login">
                            </tr>
                        </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script src="../js/registration.js"></script>
</body>
</html>
