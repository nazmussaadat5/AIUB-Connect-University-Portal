<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;

}
include("../controller/passwordcheck.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="../styles/password.css">
</head>
<body>
<div class="login-container">
        <form method="post" class="form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <header class="login-header">
                <h1>Password To Enter Delete</h1>
            </header>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-pass">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="submit-group">
                <input type="submit" name="login" value="Go To Delete" class="form-btn">
    
            </div>

            <?php if (!empty($validErr)): ?>
                <div class="error-message">
                    <p class="error-text
                    "><?php echo $validErr; ?></p>
                </div>
            <?php endif; ?>
            <?php if(!empty($successErr)): ?>
                <div class="error-message">
                    <p class="error-text
                    "><?php echo $successErr; ?></p>
                </div>
            <?php endif; ?>

        </form>
    </div>

    <script src="../js/login.js"></script>
    
</body>
</html>