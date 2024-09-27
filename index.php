<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Food-System</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
    <style>
        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal-content input[type='text'],
        .modal-content input[type='password'] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .modal-content button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #218838;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
<header>
    <div>
        <h1 class="logo">FEASTHIVE</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">MENU</a></li>
            <li><a href="#">BLOGS</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i> HELP</a></li>
            <li class="dropdown">
                <a href="#"><i class="fas fa-user"></i> ACCOUNT<i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    <a href="#" id="loginButton"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a href="#"><i class="fas fa-user"></i> Account</a>
                    <a href="#"><i class="fas fa-box"></i> Orders</a>
                </div>
            </li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> CART</a></li>
        </ul>
    </nav>
</header>

    <!-- Hero Section -->
<section class="hero">
    <div class="hero-button">
        <div class="dropdown">
            <button class="menu-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">About Us</a>
                <a href="#">Contact us</a>
                <a href="#">Settings</a>
            </div>
        </div>
        <h2>Delicious Meals Delivered To You</h2>
    </div>
    <div class="hero-content">
        <p class="paragraph">Order your favorite meals with ease and get them delivered hot and fresh!</p>
        <a href="#" class="explore-button">Explore Menu</a>
    </div>
</section>

    <!-- Featured Dishes Section -->
    <section>
        <h2>Featured Dishes</h2>
        <div class="dishes-container">
            <div class="dish">
                <img class="image" src="public/images/chicken.jpg" alt="Dish 1">
                <h3>Spicy Chicken Wings</h3>
                <p>Succulent chicken wings with a spicy kick.</p>
            </div>
            <div class="dish">
                <img class="image" src="public/images/burger.jpg" alt="Dish 2">
                <h3>Classic Cheeseburger</h3>
                <p>Juicy beef patty with melted cheese and fresh toppings.</p>
            </div>
            <div class="dish">
                <img class="image" src="public/images/pizza.jpeg" alt="Dish 3">
                <h3>Vegetarian Pizza</h3>
                <p>A delightful mix of fresh veggies and gooey cheese.</p>
            </div>
            <div class="dish">
                <img class="image" src="public/images/fish.jpeg" alt="Dish 3">
                <h3>Fried Fish</h3>
                <p>Golden-brown fried fish served with vegetables and lemon wedges</p>
            </div>
        </div>
    </section>


    <section>
        <h2>Recently searched</h2>
        <div class="dishes-container">
            <div class="dish">
                <img class="image" src="public/images/Pancakes.jpeg" alt="Dish 1">
                <h3>Pancakes</h3>
            </div>
            <div class="dish">
                <img class="image" src="public/images/Turkey.jpeg" alt="Dish 2">
                <h3>Fried Turkey</h3>
            </div>
            <div class="dish">
                <img class="image" src="public/images/Avocado.jpeg" alt="Dish 3">
                <h3>Ovacado Toast</h3>
            </div>
            <div class="dish">
                <img class="image" src="public/images/Rolex.jpeg" alt="Dish 3">
                <h3>Rolex</h3>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p class="paragraph">&copy; 2024 FeastHive. All rights reserved.</p>
    </footer>

 <!-- Login Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Added content starts here -->
        <div>
            <img src="public/images/logo.png" alt="FeastHive Logo">
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
        <!-- Added content ends here -->
    </div>
</div>

    <script>
        // Get modal and button elements
        var modal = document.getElementById("loginModal");
        var btn = document.getElementById("loginButton");
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the login button, open the modal
        btn.onclick = function () {
            modal.style.display = "flex";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function (event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>
</body>

</html>
