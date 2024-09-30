<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="process.php" method="POST" id="sign-up-form">
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <input type="text" name="username" id="username" placeholder="Username" required />
            <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required />
            <input type="email" name="email" id="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required id="password" />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required id="confirm-password" />
            <p class="message" id="error-message">Passwords do not match!</p>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="process.php" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <input type="text" name="user" placeholder="Username / Phone Number" required />
            <input type="password" name="password" placeholder="Password" required />
            <p class="message" id="login-error-message" style="display:none;"></p> <!-- Error message -->
            <a href="#">Forgot your password?</a>
            <button type="submit" name="login">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Sign in to continue connecting with friends.</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey smooth communication.</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>


<script src="script.js"></script>
<script>
    document.getElementById('sign-up-form').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const errorMessage = document.getElementById('error-message');

        if (password !== confirmPassword) {
            event.preventDefault(); // Prevent form submission
            errorMessage.style.display = 'block';
            document.getElementById('confirm-password').classList.add('shake');
            setTimeout(() => {
                document.getElementById('confirm-password').classList.remove('shake');
            }, 500);

            // Hide the message after 5 seconds
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        } else {
            errorMessage.style.display = 'none';
        }
    });

  
</script>
</body>
</html>