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





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
    <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}


.menu-section {
    padding: 20px;
}

.menu-section h2 {
    margin: 20px 0;
    font-size: 24px;
    color: #ff5722;
}

.menu-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.menu-item {
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
    padding: 10px;
    text-align: center;
    position: relative;
}

.menu-item img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.menu-item h3 {
    margin: 10px 0;
    font-size: 18px;
    color: #333;
}

.menu-item p {
    font-size: 14px;
    color: #666;
}

.menu-item span {
    font-weight: bold;
    color: #ff5722;
    display: block;
    margin-top: 10px;
}

.add-button {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: #ff5722;
    border: none;
    color: white;
    font-size: 18px;
    padding: 5px 10px;
    border-radius: 50%;
    cursor: pointer;
}

.add-button:hover {
    background-color: #e64a19;
}
    </style>
</head>

<body>
    <main>
        <?php include '../components/header.php'; ?>
        <section class="menu-section">
            <h2>Menu</h2>
            <div class="menu-container">
                <?php
               include '../../config/db_connection.php';

                // Query to fetch menu items
                $sql = "SELECT m.name, m.price, m.description, i.imagePath 
                        FROM menu m 
                        LEFT JOIN images i ON m.image_id = i.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="menu-item">';
                        echo '<img src="' . htmlspecialchars($row['imagePath']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<span>Shs: ' . number_format($row['price'], 2) . '</span>';
                        echo '<button class="add-button">+</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No menu items found.</p>';
                }

                $conn->close();
                ?>
            </div>
        </section>
    </main>
</body>

</html>