<?php
include('../controller/logincontrol.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" href="../styles/login.css">
    </head>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div id="login" align="left">   
            <table>
                <tr>
                    <td>
                        <fieldset>
                        <legend><h3>Login Page</h3></legend>
                        <table>
                            <tr>
                                <td colspan = "3" align="center">
                                <?php echo $loginErr; ?>
                                <?php echo $invalid; ?> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td><label for="username">Username:</label></td>
                                <td><input type="text" name="username" id="username" placeholder="username or email"></td>
                                <td><?php echo $unameErr; ?></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password:</label></td>
                                <td><input type="password" name="password" id="password" placeholder="Enter your password"></td>
                                <td><?php echo $passErr; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                <input type="submit" name="login" value="login">
                                <input type="reset" name="reset" value="Reset">
                            </tr>
                            <tr>
                                <td colspan="2" align="center" adv><br>Do not have an account?
                                <input type="submit" name="GoToRegistration" value="Sign Up">
                            </tr>
                        </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script src="../js/login.js"></script>
</body>
</html>
