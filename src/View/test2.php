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
                echo "Inserting image path: " . $imagePath . "<br>";  // Debug

                // Prepare the SQL query to insert the image details into the database
                $sql = "INSERT INTO images (imageName, imagePath, description) VALUES (?, ?, ?)";

                // Prepare the SQL statement
                if ($stmt = $conn->prepare($sql)) {
                    // Bind the parameters (fileName, imagePath, and a placeholder description)
                    $description = '';  // Optional: Add a default description if needed
                    $stmt->bind_param("sss", $fileName, $imagePath, $description);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "Image inserted into the database.";
                    } else {
                        // Output error if execution fails
                        echo "Error inserting image into the database: " . $stmt->error;
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
