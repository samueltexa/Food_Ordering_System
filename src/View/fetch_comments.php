<?php
include '../../config/db_connection.php';

if (isset($_GET['post_id'])) {
    $postId = intval($_GET['post_id']);

    $query = "
        SELECT 
            comments.comment, 
            user.username 
        FROM 
            comments
        JOIN 
            user 
        ON 
            comments.user_id = user.id
        WHERE 
            comments.post_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($comments);
} else {
    echo json_encode(['error' => 'No post ID provided.']);
}

$conn->close();
?>
