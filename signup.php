<? php include('scripts/userManagement.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Create Your Account</title>
        <link rel="stylesheet" href="CSS/signup.css">
        <link rel="shortcut icon" type="image/x-icon" href="srcs/favicon.ico" />
    </head>
    <body style="background-color:#4682b4">
        <div class="loginbox">
            <h1>Sign Up</h1>

            <form action="scripts/userManagement.php" method="post">
                <p>First Name:</p>
                <input type="text" name = "firstname-input" placeholder="Enter your first name">
                <p>Last Name:</p>
                <input type="text" name = "lastname-input" placeholder="Enter your last name">
                <p>Enter Username:</p>
                <input type="text" name = "username-input" placeholder="Enter your username here!">
                <p>Enter Password:</p>
                <input type="text" maxlength='15' id='p1' name = "password-input1" placeholder="Must be between 8-15 characters">
                <p>Confirm Password:</p>
                <input type="text" maxlength='15' id='p2' name = "password-input2" placeholder="Must be between 8-15 characters">
                <div id='passwordMatch'></div>
                <p>Company:</p>
                <input type="text" name = "company-input" placeholder="Enter your company here">
                <button class="btn btn-primary" type="submit" name="signup-submit-button">Create Account</button>
            </form>
        </div>
    </body>
</html>