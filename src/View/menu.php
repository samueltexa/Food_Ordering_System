<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}


.menu-section {
    padding: 20px;
}

.menu-section h2 {
    margin: 20px 0;
    font-size: 24px;
    color: #ff5722;
}

.menu-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.menu-item {
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
    padding: 10px;
    text-align: center;
    position: relative;
}

.menu-item img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.menu-item h3 {
    margin: 10px 0;
    font-size: 18px;
    color: #333;
}

.menu-item p {
    font-size: 14px;
    color: #666;
}

.menu-item span {
    font-weight: bold;
    color: #ff5722;
    display: block;
    margin-top: 10px;
}

.add-button {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: #ff5722;
    border: none;
    color: white;
    font-size: 18px;
    padding: 5px 10px;
    border-radius: 50%;
    cursor: pointer;
}

.add-button:hover {
    background-color: #e64a19;
}

    </style>
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
        <?php include 'src/components/footer.php'; ?>
    </footer>

</body>

</html>
