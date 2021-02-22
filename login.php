<? php include('scripts/userManagement.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="shortcut icon" type="image/x-icon" href="srcs/favicon.ico" />
    </head>
    <body style="background-color:#4682b4">
        <div class="loginbox">
            <h1>Login</h1>

            <form name="login-form" method="post" action="scripts/userManagement.php">
                <p>Username:</p>
                <input type="text" name="username-input" id="username-input" placeholder="Enter Username">
                <p>Password:</p>
                <input type="password" name="password-input" id="password-input" placeholder="Enter Password">
                <button type="submit" name="login-button">Login</button>
                <a class="button" id="signup-button" href="signup">Sign Up</a>
            </form>

        </div>
    </body>
</html>