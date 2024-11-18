<?php
// db_connection.php
$host = 'localhost'; // or your database host
$username = 'root'; // your MySQL username
$password = ''; // your MySQL password
$database = 'fooddb';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
