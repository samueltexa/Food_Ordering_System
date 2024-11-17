<?php
// Include the database connection
include '../../config/db_connection.php';

// Query to retrieve the image
$sql = "SELECT imagePath FROM images WHERE id = 1"; // Change ID as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the image path
    $row = $result->fetch_assoc();
    $imagePath = $row['imagePath'];
    
    // Construct the full URL to the image
    $imageUrl = "http://localhost/Food_Ordering_System/" . $imagePath;
    
    // Display the image
    echo "<img src='$imageUrl' alt='Image' style='max-width: 100%; height: auto;'>";
} else {
    echo "No image found.";
}

// Close the connection
$conn->close();
?>
