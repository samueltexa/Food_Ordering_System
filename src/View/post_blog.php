<?php
// Include the database connection
include '../../config/db_connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to upload images.";
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
                echo "File uploaded successfully!<br>";

                // Insert the file path into the database
                $imagePath = "public/images/" . $fileName;

                // Get the logged-in user's ID from the session
                $userId = $_SESSION['user_id'];

                $sql = "INSERT INTO blogPosts (user_id, post, postImage) VALUES (?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("iss", $userId, $postText, $imagePath);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "Image and post inserted into the database successfully.";
                    } else {
                        echo "Error inserting image and post into the database: " . $stmt->error;
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo "Error preparing SQL statement: " . $conn->error;
                }
            } else {
                echo "Error uploading the file. Check permissions or file size.<br>";
                echo "Move file failed. Error: " . $_FILES['image']['error'] . "<br>";
            }
        } else {
            echo "Only image files (JPEG, PNG, GIF) are allowed.";
        }
    } else {
        echo "No file uploaded or an error occurred. Error code: " . $_FILES['image']['error'];
    }
}

// Close the connection
$conn->close();
?>
