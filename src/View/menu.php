<?php
require_once __DIR__ . '/../../config/database.php';

// Modify the query to join with images table
$stmt = $conn->prepare("
    SELECT m.*, i.imagePath 
    FROM menu m 
    LEFT JOIN images i ON m.image_id = i.id 
    ORDER BY m.category, m.name
");
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group menu items by category
$menuByCategory = [];
foreach ($menuItems as $item) {
    $menuByCategory[$item['category']][] = $item;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Menu</title>
    <style>
        .menu-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .category-section {
            margin-bottom: 40px;
        }
        .category-title {
            color: #333;
            border-bottom: 2px solid #e67e22;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        .menu-item {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-5px);
        }
        .menu-item-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        .menu-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .menu-item-details {
            padding: 15px;
        }
        .dish-name {
            font-size: 1.2em;
            font-weight: bold;
            margin: 0 0 10px 0;
            color: #2c3e50;
        }
        .price {
            color: #e67e22;
            font-weight: bold;
            font-size: 1.1em;
        }
        .description {
            color: #666;
            font-size: 0.9em;
            margin: 10px 0;
        }
        .order-view {
            position: fixed;
            right: -300px;
            top: 0;
            width: 300px;
            height: 100vh;
            background: #fff;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            padding: 20px;
            overflow-y: auto;
            transition: right 0.3s ease;
        }
        .order-view.active {
            right: 0;
        }
        .order-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            margin-bottom: 10px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .quantity-controls button {
            padding: 5px 10px;
            background: #e67e22;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .quantity-input {
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Our Menu</h1>
        <?php foreach ($menuByCategory as $category => $items): ?>
            <div class="category-section">
                <h2 class="category-title"><?php echo htmlspecialchars($category); ?></h2>
                <div class="menu-grid">
                    <?php foreach ($items as $item): ?>

                        <div class="menu-item">
                            <div class="menu-item-image">

                                <?php if (!empty($item['imagePath'])): ?>
                                    <img src="<?php echo '../../'.htmlspecialchars($item['imagePath']); ?>"
                                         alt="<?php echo htmlspecialchars($item['name']); ?>"
                                         onerror="this.src='../../public/images/default-dish.jpg'">
                                <?php else: ?>
                                    <img src="../../public/images/default-dish.jpeg" 
                                         alt="Default dish image">
                                <?php endif; ?>
                            </div>
                            <div class="menu-item-details">
                                <h3 class="dish-name"><?php echo htmlspecialchars($item['name']); ?></h3>
                                <p class="price">$<?php echo number_format($item['price'], 2); ?></p>
                                <?php if (!empty($item['description'])): ?>
                                    <p class="description"><?php echo htmlspecialchars($item['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Add order view container -->
    <div class="order-view">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Your Order</h2>
            <button class="close-cart" style="background: none; border: none; font-size: 1.5em; cursor: pointer;">&times;</button>
        </div>
        <div class="incoming-order-view"></div>
        <div class="order-total">
            <h3>Total: $<span id="order-total-amount">0.00</span></h3>
            <button id="place-order-btn">Place Order</button>
        </div>
    </div>

    <!-- Update JavaScript -->
    <script>
        const orderView = document.querySelector('.order-view');

        // Function to update quantity
        function updateQuantity(button, change) {
            const input = button.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value) + change;
            if (value < 1) value = 1;
            input.value = value;
            updateTotal();
        }

        // Function to update total
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.order-item').forEach(item => {
                const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                total += price * quantity;
            });
            document.getElementById('order-total-amount').textContent = total.toFixed(2);
        }

        // Update click event listener
        document.querySelectorAll(".menu-item").forEach(item => {
            item.addEventListener("click", (event) => {
                orderView.classList.add('active');
                
                const dish = event.currentTarget;
                const dishName = dish.querySelector(".dish-name").textContent;
                const dishPrice = dish.querySelector(".price").textContent;
                const dishDescription = dish.querySelector(".description")?.textContent || '';

                const orderItem = `
                    <div class="order-item">
                        <p class="item-name">${dishName}</p>
                        <p class="item-price">${dishPrice}</p>
                        <p class="item-description">${dishDescription}</p>
                        <div class="quantity-controls">
                            <button class="minus-btn" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" class="quantity-input" value="1" min="1" readonly>
                            <button class="plus-btn" onclick="updateQuantity(this, 1)">+</button>
                        </div>
                    </div>`;

                document.querySelector(".incoming-order-view").insertAdjacentHTML('beforeend', orderItem);
                updateTotal();
            });
        });

        // Add place order functionality
        document.getElementById('place-order-btn').addEventListener('click', () => {
            // Add your order submission logic here
            const orderItems = [];
            document.querySelectorAll('.order-item').forEach(item => {
                orderItems.push({
                    name: item.querySelector('.item-name').textContent,
                    price: item.querySelector('.item-price').textContent,
                    quantity: item.querySelector('.quantity-input').value
                });
            });
            
            console.log('Order items:', orderItems);
            // Here you would typically send this data to your backend
            fetch('../../api/orders/create.php', {
                method: 'POST',
                body: JSON.stringify(orderItems)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Order created:', data);
                // alert the user in a colorful way that the order has been created
                alert(`Order created successfully with ID: ${data.order_id}`);
                // clear the incoming order view
                document.querySelector(".incoming-order-view").innerHTML = '';
                // reset the total
                document.getElementById('order-total-amount').textContent = '0.00';

            })
            .catch(error => console.error('Error creating order:', error));
            // gracefully ask the customer to retry if its a network issue
            // to be done here
        });

        // Add close functionality (optional)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                orderView.classList.remove('active');
            }
        });

        // Add this to your existing script
        document.querySelector('.close-cart').addEventListener('click', () => {
            orderView.classList.remove('active');
        });
    </script>
</body>
</html>

