<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
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
                        <a href="src/View/Login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
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

    <!-- Recently searched -->
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

    <?php include '/components/footer.php'; ?> <!-- Include the footer -->
</body>

</html>