<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload an Image</h1>

    <!-- Form for uploading an image -->
    <form action="test2.php" method="post" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required>
        <br><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

</body>
</html>
