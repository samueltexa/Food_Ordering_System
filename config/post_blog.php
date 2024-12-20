<?php
// Include the database connection
include '../../config/db_connection.php';

// Ensure the user is logged in before allowing the upload
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to upload images.";
    exit();
}

if (isset($_POST['submit'])) {
    // Capture the post text
    $postText = $_POST['post_text'];

    // Check if the file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define the allowed file types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['image']['type'];

        // Validate the file type
        if (in_array($fileType, $allowedTypes)) {
            // Define the target directory and the file name
            $targetDir = "../../public/images/";  // Adjust path as needed
            $fileName = basename($_FILES['image']['name']);
            $targetFile = $targetDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                echo "File uploaded successfully!<br>";

                // Insert the file path into the database
                $imagePath = "public/images/" . $fileName;

                // Get the logged-in user's ID from the session
                $userId = $_SESSION['user_id'];

                // Prepare the SQL query to insert the post text and image path into the database
                $sql = "INSERT INTO blogPosts (user_id, post, postImage) VALUES (?, ?, ?)";

                // Prepare the SQL statement
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
                    // Output error if statement preparation fails
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
