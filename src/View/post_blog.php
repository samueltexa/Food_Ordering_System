<?php
// Include the database connection
include '../../config/db_connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "Login to post a blog";
    header("Location: Blog.php");
    exit();
}

if (isset($_POST['submit'])) {
    $postText = $_POST['post_text'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['image']['type'];

        if (in_array($fileType, $allowedTypes)) {
            $targetDir = "../../public/images/";
            $fileName = basename($_FILES['image']['name']);
            $targetFile = $targetDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = "public/images/" . $fileName;
                $userId = $_SESSION['user_id'];

                $sql = "INSERT INTO blogPosts (user_id, post, postImage) VALUES (?, ?, ?)";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("iss", $userId, $postText, $imagePath);
                    if ($stmt->execute()) {
                        $_SESSION['success_message'] = "Image and post inserted into the database successfully.";
                        // Redirect to a confirmation page or back to the blog page
                        header("Location: Blog.php"); // Change this to your desired page
                        exit();
                    } else {
                        $_SESSION['error_message'] = "Error inserting image and post into the database: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $_SESSION['error_message'] = "Error preparing SQL statement: " . $conn->error;
                }
            } else {
                $_SESSION['error_message'] = "Error uploading the file. Check permissions or file size.";
            }
        } else {
            $_SESSION['error_message'] = "Only image files (JPEG, PNG, GIF) are allowed.";
        }
    } else {
        $_SESSION['error_message'] = "No file selected: " . $_FILES['image']['error'];
    }
}

// Close the connection
$conn->close();
header("Location: Blog.php"); // Redirect user if no explicit redirection happens earlier
exit();
?>
