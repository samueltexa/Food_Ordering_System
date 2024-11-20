<?php
session_start();
include 'db_connection.php';

if (isset($_POST['login'])) {
    // Get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs to avoid SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to check if the user exists
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
    $result = $conn->query($query);

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Check if password matches
        if (password_verify($password, $row['password'])) {
            // Successful login: Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_email'] = $row['email'];

            // Redirect to dashboard or homepage
            header("Location: /Food_Ordering_System/");
            exit();
        } else {
            $_SESSION['$error_message'] = "Invalid password.";
            // Redirect to login again
            header("Location: /Food_Ordering_System/src/View/Login.php");
        }
    } else {
        $_SESSION['error_message'] = "Wrong username or password";
            // Redirect to login again
        header("Location: /Food_Ordering_System/src/View/Login.php");
    }
}

// Close the database connection
$conn->close();
?>

<!-- Display error message -->
<?php if (isset($error_message)): ?>
    <div class="error-message"><?= $error_message ?></div>
<?php endif; ?>
