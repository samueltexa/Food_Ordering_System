<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .Login_Section {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }

        form div {
            margin-bottom: 20px;
        }

        img {
            width: 100px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        h4 {
            font-size: 16px;
            color: #666;
        }

        input[type='text'], input[type='password'] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        .Login_Section a {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <section class="Login_Section">
        <form>
            <div>
                <img src="../../public/images/logo.png" alt="FeastHive Logo">
            </div>
            <div>
                <h1>Welcome To FeastHive</h1>
                <h4>Log into your account</h4>
            </div>
            <div>
                <input type='text' placeholder="Enter email or username">
            </div>
            <div>
                <input type='password' placeholder="Enter password">
            </div>
            <button type='submit'>Login</button>
            <a href='#'>Forgot password?</a>
            <h4>Don't have an account?</h4>
            <a href='#'>Register</a>
        </form>
    </section>

</body>

</html>
