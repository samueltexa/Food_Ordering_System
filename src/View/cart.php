<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #ff5722;
    color: white;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

header .logo {
    margin: 0;
    font-size: 24px;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

/* Cart Page Layout */
.cart-main {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: #f5f5f5;
}

.cart-section {
    width: 70%;
}

.cart-item {
    display: flex;
    align-items: center;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    margin-bottom: 10px;
}

.cart-item img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}

.item-details {
    flex: 1;
    padding: 0 15px;
}

.item-details h3 {
    margin: 0;
    font-size: 16px;
    color: #333;
}

.item-details .price {
    color: #ff5722;
    font-weight: bold;
}

.remove-button {
    background: none;
    border: none;
    color: #ff5722;
    font-weight: bold;
    cursor: pointer;
    padding: 5px 0;
}

.remove-button:hover {
    text-decoration: underline;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty-button {
    background-color: #ff5722;
    border: none;
    color: white;
    font-size: 18px;
    padding: 5px 10px;
    border-radius: 50%;
    cursor: pointer;
}

.cart-summary {
    width: 25%;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.cart-summary h2 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
}

.summary-details {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.checkout-button {
    background-color: #ff5722;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    width: 100%;
    cursor: pointer;
    border-radius: 5px;
}

.checkout-button:hover {
    background-color: #e64a19;
}

    </style>
</head>

<body>

    <main class="cart-main">
        <section class="cart-section">
            <h2>CART(4)</h2>
            <div class="cart-item">
                <img src="public/images/fried_fish.jpeg" alt="Fried Fish">
                <div class="item-details">
                    <h3>Crispy fried fish, served with spicy rice</h3>
                    <span class="price">Shs: 150,000</span>
                    <button class="remove-button">REMOVE</button>
                </div>
                <div class="quantity-controls">
                    <button class="qty-button">-</button>
                    <span class="quantity">1</span>
                    <button class="qty-button">+</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="public/images/fried_fish.jpeg" alt="Fried Fish">
                <div class="item-details">
                    <h3>Crispy fried fish, served with spicy rice</h3>
                    <span class="price">Shs: 150,000</span>
                    <button class="remove-button">REMOVE</button>
                </div>
                <div class="quantity-controls">
                    <button class="qty-button">-</button>
                    <span class="quantity">1</span>
                    <button class="qty-button">+</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="public/images/fried_fish.jpeg" alt="Fried Fish">
                <div class="item-details">
                    <h3>Crispy fried fish, served with spicy rice</h3>
                    <span class="price">Shs: 150,000</span>
                    <button class="remove-button">REMOVE</button>
                </div>
                <div class="quantity-controls">
                    <button class="qty-button">-</button>
                    <span class="quantity">1</span>
                    <button class="qty-button">+</button>
                </div>
            </div>
            <!-- Repeat .cart-item for additional items as needed -->
        </section>

        <aside class="cart-summary">
            <h2>CART SUMMARY</h2>
            <div class="summary-details">
                <p>Subtotal</p>
                <p>UGX 118,268</p>
            </div>
            <button class="checkout-button">CHECKOUT UGX 118,268</button>
        </aside>
    </main>

    <footer>
        <?php include 'src/components/footer.php'; ?>
    </footer>

</body>

</html>
