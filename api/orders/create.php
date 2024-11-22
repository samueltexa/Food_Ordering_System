<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/database.php';

try {
    // Get JSON data from request body
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    // Validate required fields
    if (!isset($data['dish_name']) || !isset($data['price']) || !isset($data['quantity'])) {
        throw new Exception('Missing required fields');
    }

    // Start transaction
    $conn->beginTransaction();

    // 1. First create the main order
    $orderStmt = $conn->prepare("
        INSERT INTO orders (
            total_price,
            order_status
        ) VALUES (
            :total_price,
            'pending'
        )
    ");

    $orderStmt->execute([
        ':total_price' => $data['price']
    ]);

    // Get the order ID
    $orderId = $conn->lastInsertId();

    // 2. Then create the order item
    $itemStmt = $conn->prepare("
        INSERT INTO order_items (
            order_id,
            dish_name,
            quantity,
            price
        ) VALUES (
            :order_id,
            :dish_name,
            :quantity,
            :price
        )
    ");

    $itemStmt->execute([
        ':order_id' => $orderId,
        ':dish_name' => $data['dish_name'],
        ':quantity' => $data['quantity'],
        ':price' => $data['price']
    ]);

    // Commit transaction
    $conn->commit();

    // Send success response
    echo json_encode([
        'success' => true,
        'message' => 'Order created successfully',
        'order_id' => $orderId
    ]);

} catch (Exception $e) {
    // Rollback transaction on error
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    
    // Send error response
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} 