<?php
include('../controller/regcheck.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/reg.css">
</head>

<body>
    <div class="Reg-container">
        <div class="Reg-header">
            <h1>SIGN UP AS FACULTY</h1>
        </div>
        <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">

                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-name">
                <span class="error"><?php echo $nameErr; ?></span>
            </div>

            <div class="input-group">

                <input type="text" name="username" id="username" placeholder="Enter your username" class="form-username">
                <span class="error"><?php echo $usernameErr; ?></span>
            </div>

            <div class="input-group">

                <input type="text" name="email" id="email" placeholder="Enter your email" class="form-email">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>

            <div class="input-group">

                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-pass">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>

            <div class="input-group">
                <label for="dob" class="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" class="form-dob">
                <span class="error"><?php echo $dobErr; ?></span>
            </div>

            <div class="radio-group">
                <label>Gender</label>

                <input type="radio" name="gender" value="Male" id="male" class="form-gender">
                Male


                <input type="radio" name="gender" value="Female" id="female" class="form-gender">
                Female

                <span class="error"><?php echo $genderErr; ?></span>
            </div>

            <div class="submit-group">
                <input type="submit" name="Registration" value="Registration" class="form-btn">
            </div>

            <div class="register-group">
                <a href="login.php">Go To Login</a>
            </div>
            <?php if (!empty($success)) : ?>
                <div class="success-message">
                    <p class="success-text"><?php echo $success; ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($chckuserErr)) : ?>
                <div class="error-message">
                    <p class="error-text"><?php echo $chckuserErr; ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($validErr)) : ?>
                <div class="error-message">
                    <p class="error-text
                    "><?php echo $validErr; ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($successErr)) : ?>
                <div class="error-message">
                    <p class="error-text
                    "><?php echo $successErr; ?></p>
                </div>
            <?php endif; ?>




        </form>
        <!-- <div class="success-message hidden">
        <p class="success-text">Form submitted successfully!</p>
      </div> -->
    </div>

    <script src="../js/register.js"></script>
</body>

</html>