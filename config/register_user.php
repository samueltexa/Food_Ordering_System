<?php
include 'db_connection.php';
if (isset($_POST['signup'])) {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize inputs to avoid SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if ($conn->query($query) === TRUE) {
        // Registration successful, redirect to login page or another page
        header("Location: /Food_Ordering_System/");
        exit();
    } else {
        // Handle errors
        echo "Error: " . $conn->error;
    }
}
?>
