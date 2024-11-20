<?php
include '../../config/db_connection.php';

// Ensure user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to comment.";
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment']) && isset($_POST['post_id'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $postId = intval($_POST['post_id']);
    $userId = $_SESSION['user_id'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iis", $postId, $userId, $comment);
        if ($stmt->execute()) {
            // Redirect back to the blog page or refresh the current page
            header("Location: /Food_Ordering_System/src/View/Blog.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
