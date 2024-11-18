<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../../public/assets/css/menu.css">
</head>

<body>
    <main>
    <?php include '../components/header.php'; ?>
        <section class="menu-section">
            <h2>Breakfast</h2>
            <div class="menu-container">
                <div class="menu-item">
                    <img src="../../public/images/Pancakes.jpeg" alt="Pancakes">
                    <h3>Pancakes</h3>
                    <p>Contains wheat, milk, and eggs.</p>
                    <span>Shs: 15,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/toasted_bread.jpeg" alt="Toasted Bread">
                    <h3>Toasted Bread</h3>
                    <p>Crispy brown toasted bread served with butter.</p>
                    <span>Shs: 10,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/fried_eggs.jpeg" alt="Fried Eggs">
                    <h3>Fried Eggs</h3>
                    <p>Over-easy fried eggs, served with a hot cup of tea.</p>
                    <span>Shs: 10,000</span>
                    <button class="add-button">+</button>
                </div>
            </div>
        </section>

        <section class="menu-section">
            <h2>Lunch</h2>
            <div class="menu-container">
                <div class="menu-item">
                    <img src="../../public/images/fried_rice.jpeg" alt="Fried Rice">
                    <h3>Fried Rice</h3>
                    <p>Savory fried rice with vegetables, eggs, and beef.</p>
                    <span>Shs: 75,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/katoogo.jpeg" alt="Katoogo">
                    <h3>Katoogo</h3>
                    <p>A traditional dish with plantains, beans, and meat.</p>
                    <span>Shs: 50,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/Rolex.jpeg" alt="Rolex">
                    <h3>Rolex</h3>
                    <p>Rolled chapati filled with eggs, tomatoes, and onions.</p>
                    <span>Shs: 25,000</span>
                    <button class="add-button">+</button>
                </div>
            </div>
        </section>

        <section class="menu-section">
            <h2>Dinner</h2>
            <div class="menu-container">
                <div class="menu-item">
                    <img src="../../public/images/spaghetti.jpeg" alt="Spaghetti">
                    <h3>Spaghetti</h3>
                    <p>Classic spaghetti with rich tomato sauce, seasoned with spices.</p>
                    <span>Shs: 65,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/chicken.jpg" alt="Fried Chicken">
                    <h3>Fried Chicken</h3>
                    <p>Crispy fried chicken pieces served with rice.</p>
                    <span>Shs: 100,000</span>
                    <button class="add-button">+</button>
                </div>
                <div class="menu-item">
                    <img src="../../public/images/fish.jpeg" alt="Fried Fish">
                    <h3>Fried Fish</h3>
                    <p>Crispy fried fish served with spicy rice.</p>
                    <span>Shs: 150,000</span>
                    <button class="add-button">+</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>

</body>

</html>

