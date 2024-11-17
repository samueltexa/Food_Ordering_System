<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Blog Page</title>
    <link rel="stylesheet" href="../../public/assets/css/blog.css">
    <script>
        // Function to update sidebar with the post content and image
        function displayPostInSidebar(postContent, postImage, postId) {
            const sidebar = document.getElementById('sidebar-content');
            sidebar.innerHTML = `
        <h1>Keep comments Respectful</h1>
        <hr class="separator">
        <img src="${postImage}" alt="Post Image" class="sidebar-image">
        <div class="sidebar-post-content">${postContent}</div>
        <hr class="separator">
        <div class="sidebar-post-content">Comments</div>
        <div id="comments-container"></div>
    `;

            // Fetch comments for the selected post
            fetchComments(postId);
        }

        function fetchComments(postId) {
    fetch(`http://localhost/Food_Ordering_System/src/View/fetch_comments.php?post_id=${postId}`)
        .then(response => response.json())
        .then(data => {
            const commentsContainer = document.getElementById('comments-container');
            commentsContainer.innerHTML = '';

            if (data.error) {
                commentsContainer.innerHTML = `<p>${data.error}</p>`;
            } else {
                // Loop through the comments and display them
                data.forEach(comment => {
                    commentsContainer.innerHTML += `
                    <div class="blog-post comment">
                        <div class="user-info">
                            <img src="../../public/images/logo.png" alt="No Photo">
                            <span>@${comment.username}</span>
                        </div>
                        <div class="blog-content">
                            <p>${comment.comment}</p>
                        </div>
                        <div class="interactions">
                            <span><i class='fa fa-thumbs-up'></i></span>
                            <span><i class='fa fa-comment'></i></span>
                            <span><i class='fa fa-share fa-lg'></i></span>
                        </div>
                    </div>
                    `;
                });
            }
        })
        .catch(error => {
            console.error('Error fetching comments:', error);
        });
}


    </script>

    <style>
        .comment {
    margin-bottom: 15px; /* Adjust the value as needed */
}

    </style>
</head>

<body>
    <?php
    include '../components/header.php';
    include '../../config/db_connection.php';

    // Query to fetch blog posts with user information and post image
    $query = "
        SELECT 
            blogPosts.id AS post_id, 
            blogPosts.post, 
            blogPosts.likes, 
            user.username, 
            user.image,
            blogPosts.postImage,
            COUNT(comments.id) AS comment_count
        FROM 
            blogPosts
        JOIN 
            user 
        ON 
            blogPosts.user_id = user.id
        LEFT JOIN
            comments
        ON
            blogPosts.id = comments.post_id
        GROUP BY
            blogPosts.id, user.id";

    $result = $conn->query($query);
    ?>
    <div class="container">
        <div class="blog-posts">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Prepare user image or fallback image
                    $imageUrl = "http://localhost/Food_Ordering_System/" . $row['image'];
                    $userImage = !empty($row['image']) ? $imageUrl : '../../public/images/logo.png';
                    $postImage = !empty($row['postImage']) ? "http://localhost/Food_Ordering_System/" . $row['postImage'] : '../../public/images/default_post_image.jpg';

                    echo "<div class='blog-post' onclick='displayPostInSidebar(\"" . htmlspecialchars($row['post']) . "\", \"" . htmlspecialchars($postImage) . "\", " . $row['post_id'] . ")'>";

                    echo "    <div class='user-info'>";
                    echo "        <img src='" . htmlspecialchars($userImage) . "' alt=' '>";
                    echo "        <span>@" . htmlspecialchars($row['username']) . "</span>";
                    echo "    </div>";
                    echo "    <div class='blog-content'>";
                    echo "        <h3>" . htmlspecialchars($row['post']) . "</h3>";
                    echo "    </div>";
                    echo "    <div class='interactions'>";
                    echo "        <span>" . htmlspecialchars($row['likes']) . " <i class='fa fa-thumbs-up'></i></span>";
                    echo "        <span>" . htmlspecialchars($row['comment_count']) . " <i class='fa fa-comment'></i></span>";
                    echo "        <span><i class='fa fa-share fa-lg'></i></span>";
                    echo "    </div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No blog posts available.</p>";
            }
            ?>
        </div>

        <div class="sidebar">
            <div id="sidebar-content">
                <!-- This content will be updated with the selected post -->
            </div>
        </div>
    </div>
    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>