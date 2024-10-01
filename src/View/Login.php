<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/assets/css/login_register.css">
</head>
<body>

<div class="container" id="container">
    <!-- login form -->
    <div class="form-container sign-in-container">
        <form id="login-form">
            <h1>Sign in</h1>
            <img class="logo" src="../../public/images/logo.png">
            <input type="user" id="login_username" placeholder="Username or email"/>
            <div class="error-message" id="username_error_message"></div>
            <input type="password" id="login_password" placeholder="Password"/>
            <div class="error-message" id="password_error_message"></div>
            <a href="forgot_password.php">Forgot your password?</a>
            <button type="submit" name="login">SIGN IN</button>
        </form>
    </div>
    <!-- register form -->
    <div class="form-container sign-up-container">
        <form id="sign-up-form">
            <h1>Create Account</h1>
            <img class="logo" src="../../public/images/logo.png">
            <input type="text" name="username" id="register_username" placeholder="Enter username"/>
            <div class="error-message" id="register_username_error_message"></div>
            <input type="text" name="email" id="email" placeholder="Enter email"/>
            <div class="error-message" id="email_error_message"></div>
            <input type="password" name="password" id="register_password" placeholder="Enter password"/>
            <div class="error-message" id="register_password_error_message"></div>
            <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm password"/>
            <div class="error-message" id="confirm_password_error_message"></div>
            <button type="submit" name="signup">REGISTER</button>
        </form>
    </div>
    <!-- Quick Access -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Order with Ease</h1>
                <p>Enjoy meals together with loved ones</p>
                <button class="ghost" id="signIn">SIGN IN</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Welcome, Food Lover!</h1>
                <p>Enter your details and dive into a world of flavors!</p>
                <button class="ghost" id="signUp">REGISTER</button>
            </div>
        </div>
    </div>
</div>
<script src="../../public/assets/js/main.js"></script>
</body>
</html>
