<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
</head>

<body>

    <div class="main-container">
        <div class="forgot-password-container">
            <h1>Forgot Password</h1>
            <form id="forgot-password-form" action="process_forgot_password.php" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required />
                <button type="submit">Send Reset Link</button>
            </form>
            <div class="back-to-login">
                <a href="Login.php"><i class="fas fa-arrow-left"></i> Back to Login</a>
            </div>
        </div>
    </div>
</body>

</html>