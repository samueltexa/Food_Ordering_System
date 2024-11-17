<?php
// Include the database connection
include '../../config/db_connection.php';

if (isset($_POST['submit'])) {
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

            // Debug: Check the target file path
            echo "Target file path: " . $targetFile . "<br>";

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                echo "File uploaded successfully!<br>";
                // Insert the file path into the database
                $imagePath = "public/images/" . $fileName;
                $sql = "INSERT INTO images (imageName, imagePath) VALUES (?, ?)";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $fileName, $imagePath);

                if ($stmt->execute()) {
                    echo "Image inserted into the database.";
                } else {
                    echo "Error inserting image into the database.";
                }

                // Close the statement
                $stmt->close();
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
