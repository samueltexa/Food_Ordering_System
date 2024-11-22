<?php
try {
    $host = 'localhost';
    $dbname = 'fooddb';
    $username = 'root';  // Replace with your database username
    $password = '';      // Replace with your database password

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
