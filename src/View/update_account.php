<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include '../../config/db_connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $first_name = $conn->real_escape_string(trim($_POST['first_name'] ?? ''));
    $last_name = $conn->real_escape_string(trim($_POST['last_name'] ?? ''));
    $username = $conn->real_escape_string(trim($_POST['username'] ?? ''));
    $email = $conn->real_escape_string(trim($_POST['email'] ?? ''));



    // Handle file upload
    $photo_path = null; // Default value if no photo is uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "../../public/images/"; // Change this to your uploads folder path
        if (!is_dir($upload_dir) && !mkdir($upload_dir, 0755, true)) {
            echo "Failed to create upload directory.";
            exit;
        }

        $file_name = basename($_FILES['photo']['name']);
        $target_file = $upload_dir . $file_name;

        // Check if file is a valid image
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_type, $valid_extensions)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $photo_path = $target_file;
                // Insert the file path into the database
                $photo_path= "public/images/" . $file_name;
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit;
        }
    }

    // Assuming user ID is stored in session
    $user_id = $_SESSION['user_id'] ?? null; // Replace with actual logic to get user ID
    if (!$user_id) {
        echo "User ID not found. Please log in.";
        exit;
    }

    // Update database
    $query = "UPDATE user SET 
                firstName = '$first_name', 
                lastName = '$last_name', 
                username = '$username', 
                email = '$email'";

    // Add photo path to the query if photo was uploaded
    if ($photo_path) {
        $query .= ", image = '$photo_path'";
    }

    $query .= " WHERE id = $user_id";

    if ($conn->query($query) === TRUE) {
        $_SESSION['error_message'] = "Account updated successfully";
        // Redirect to login again
        header("Location: useraccount.php");
    } else {
        echo "Error updating account: " . $conn->error;
    }

    $conn->close();
}
?>
