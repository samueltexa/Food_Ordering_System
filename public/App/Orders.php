<?php
// order.php
include '../config/db_connection.php';

// Add input validation and error handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (empty($_POST['items'])) {
            throw new Exception("Please select at least one item to order");
        }

        $items = $_POST['items'];
        $totalPrice = 0;
        $conn->beginTransaction(); // Add transaction support

        // Insert order with customer info and timestamp
        $stmt = $conn->prepare("INSERT INTO orders (total_price, order_status, created_at) VALUES (:total_price, 'pending', NOW())");
        $stmt->execute(['total_price' => 0]);
        $orderId = $conn->lastInsertId();

        // Process each item with validation
        foreach ($items as $item) {
            if (empty($item['quantity']) || $item['quantity'] <= 0) {
                continue; // Skip items with zero or negative quantity
            }
            
            $dishName = htmlspecialchars($item['dish_name']);
            $quantity = (int)$item['quantity'];

            // Check if item is still available
            $stmt = $conn->prepare("SELECT price, available FROM menu WHERE dish_name = :dish_name");
            $stmt->execute(['dish_name' => $dishName]);
            $dish = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$dish || !$dish['available']) {
                throw new Exception("Sorry, {$dishName} is currently unavailable");
            }

            $price = $dish['price'] * $quantity;
            $totalPrice += $price;

            // Insert into order_items
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, dish_name, quantity, price) VALUES (:order_id, :dish_name, :quantity, :price)");
            $stmt->execute([
                'order_id' => $orderId,
                'dish_name' => $dishName,
                'quantity' => $quantity,
                'price' => $price
            ]);
        }

        // Update total price in orders table
        $stmt = $conn->prepare("UPDATE orders SET total_price = :total_price WHERE id = :order_id");
        $stmt->execute(['total_price' => $totalPrice, 'order_id' => $orderId]);

        $conn->commit();
        
        // Return JSON response for better API support
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => "Order placed successfully!",
            'order_id' => $orderId,
            'total_price' => number_format($totalPrice, 2)
        ]);
        exit;

    } catch (Exception $e) {
        $conn->rollBack();
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
        exit;
    }
}

// Modify menu fetch to only get available items
$stmt = $conn->prepare("SELECT * FROM menu WHERE available = 1 ORDER BY category, dish_name");
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group menu items by category
$menuByCategory = [];
foreach ($menuItems as $item) {
    $menuByCategory[$item['category']][] = $item;
}
?>

<!-- Improve the HTML structure and add basic styling -->
<!DOCTYPE html>
<html>
<head>
    <title>Place Your Order</title>
    <style>
        .menu-category { margin-bottom: 20px; }
        .menu-item { margin: 10px 0; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Place Your Order</h1>
    <div id="error-message" class="error"></div>
    <form method="POST" action="order.php" id="orderForm">
        <?php foreach ($menuByCategory as $category => $items): ?>
            <div class="menu-category">
                <h2><?php echo htmlspecialchars($category); ?></h2>
                <?php foreach ($items as $item): ?>
                    <div class="menu-item">
                        <label>
                            <?php echo htmlspecialchars($item['dish_name']); ?> - 
                            $<?php echo number_format($item['price'], 2); ?>
                            <?php if ($item['description']): ?>
                                <small>(<?php echo htmlspecialchars($item['description']); ?>)</small>
                            <?php endif; ?>
                        </label>
                        <input type="number" 
                               name="items[<?php echo htmlspecialchars($item['dish_name']); ?>][quantity]" 
                               min="0" 
                               value="0">
                        <input type="hidden" 
                               name="items[<?php echo htmlspecialchars($item['dish_name']); ?>][dish_name]" 
                               value="<?php echo htmlspecialchars($item['dish_name']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit">Submit Order</button>
    </form>
</body>
</html>
