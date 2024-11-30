<?php
include('../controller/logincheck.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="login-container">
        <form method="post" class="form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <header class="login-header">
                <h1>LOGIN TO AIUB CONNECT</h1>
            </header>
            <div class="input-group">
                <input type="text" name="username" id="username" placeholder="Enter your username" class="form-username">
                <span class="error"><?php echo $usernameErr; ?></span>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-pass">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="submit-group">
                <input type="submit" name="login" value="Login" class="form-btn">
    
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



            <div class="register-group">
              
                <a href="reg.php">Register</a>
            </div>
        </form>
    </div>


    <script src="../js/login.js"></script>
</body>
</html>