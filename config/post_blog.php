<?php
// Start session to access the logged-in user's information
session_start();

// Include database connection
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to post a blog.";
    exit;
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Get form data
$post_text = isset($_POST['post_text']) ? htmlspecialchars($_POST['post_text']) : '';
$post_image = null;

if (isset($_FILES['post_image'])) {
    // Handle image upload if provided
    $target_dir = "../../public/images/";
    $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Validate file is an image
    $check = getimagesize($_FILES["post_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    // Validate file extension (JPEG, PNG, GIF)
    $allowed_types = ['jpeg', 'jpg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        echo "Only JPEG, PNG, and GIF images are allowed.";
        exit;
    }

    // Check file size (e.g., max 5MB)
    if ($_FILES["post_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large. Maximum file size is 5MB.";
        exit;
    }

    // Move the uploaded file to the server directory
    if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {
        $post_image = "public/images/" . basename($_FILES["post_image"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }
}

// Insert the new blog post into the database
if (!empty($post_text)) {
    $query = "INSERT INTO blogPosts (user_id, post, postImage) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $user_id, $post_text, $post_image);
    
    if ($stmt->execute()) {
        echo "Blog post successfully added.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Please write something in your post.";
}

// Close database connection
$conn->close();
?>
