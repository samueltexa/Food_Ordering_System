<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            animation: slideIn 0.5s forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }

        .form {
            display: none;
            padding: 40px;
            text-align: center;
        }

        .form.active {
            display: block;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        button.toggle-btn {
            background-color: transparent;
            color: #5cb85c;
            border: none;
            font-size: 14px;
            margin-top: 15px;
        }

        button.toggle-btn:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="form login active">
        <h2>Login</h2>
        <input type="text" placeholder="Username" required>
        <input type="password" placeholder="Password" required>
        <button>Login</button>
        <button class="toggle-btn" onclick="toggleForm()">Don't have an account? Sign up</button>
    </div>
    <div class="form signup">
        <h2>Signup</h2>
        <input type="text" placeholder="Username" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <button>Signup</button>
        <button class="toggle-btn" onclick="toggleForm()">Already have an account? Login</button>
    </div>
</div>

<script>
    function toggleForm() {
        const loginForm = document.querySelector('.login');
        const signupForm = document.querySelector('.signup');
        loginForm.classList.toggle('active');
        signupForm.classList.toggle('active');
    }
</script>

</body>
</html>
