<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/assets/css/main.css">
</head>

<body>
    <section class="login_section">
        <form class="formwrapper" id="formwrapper">
            <div class="logo">
                <img src="../../public/images/logo.png"/>
            </div>
            <h1>Wlcome To FeastHive</h1>
            <p>Log in to your account</p>
            <div class="inner_wrapper">
            <div class="username_wrapper input_wrapper">
                <input type="text" class="username" id="username" placeholder="User Name">
                <div id="username_error_message"></div>
            </div>

            <div class="password_wrapper input_wrapper">
                <input type="password" class="password" id="login_password" placeholder="Password">
                <div id="login_password_error_message"></div>
            </div>

            <button onclick="login_user(event)" id="submit_button">Log in</button>
            <div class="no_account">
                <h4>No account?</h4>
                <a href="Registration.html">Sign up</a>
            </div>

            </div>
        </form>
    </section>
    <script src="js.js"></script>
</body>

</html>
