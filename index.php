<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
</head>

<body>
    <!-- Header Section -->
    <?php include 'src/components/header.php'; ?>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-button">
            <div class="dropdown">
                <button class="menu-button">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="src/View/aboutus.php">About Us</a>
                    <a href="mailto:woolardsamuel@gmail.com">Contact us</a>
                </div>
            </div>
            <h2>Delicious Meals Delivered To You</h2>
        </div>
        <div class="hero-content">
            <p class="paragraph">Order your favorite meals with ease and get them delivered hot and fresh!</p>
            <a href="src/View/menu.php" class="explore-button">Explore Menu</a>
        </div>
    </section>

    <!-- Featured Dishes Section -->
    <section>
        <h2>Featured Dishes</h2>
        <div class="dishes-container">
            <?php
            include 'config/db_connection.php';

            // Query to fetch featured dishes
            $sql = "SELECT imagePath, description, imageName FROM images LIMIT 4";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="dish" onclick="openModal(\'' . htmlspecialchars($row['imageName']) . '\', \'' . htmlspecialchars($row['description']) . '\', \'' . $row['imagePath'] . '\')">';
                    echo '<img class="image" src="' . $row['imagePath'] . '" alt="Dish">';
                    echo '<h3>' . htmlspecialchars($row['imageName']) . '</h3>';
                    echo '</div>';
                }
            } else {
                echo '<p>No featured dishes found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </section>

    <!-- Recently Searched Section -->
    <section>
        <h2>Recently Searched</h2>
        <div class="dishes-container">
            <?php
            include 'config/db_connection.php';

            // Query to fetch recently searched dishes
            $sql = "SELECT imagePath, description, imageName FROM images ORDER BY id DESC LIMIT 4";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="dish" onclick="openModal(\'' . htmlspecialchars($row['imageName']) . '\', \'' . htmlspecialchars($row['description']) . '\', \'' . $row['imagePath'] . '\')">';
                    echo '<img class="image" src="' . $row['imagePath'] . '" alt="Dish">';
                    echo '<h3>' . htmlspecialchars($row['imageName']) . '</h3>';
                    echo '</div>';
                }
            } else {
                echo '<p>No recently searched dishes found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </section>

    <!-- Modal Structure -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <img id="modalImage" src="" alt="Dish">
            <div class="modal-details">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 id="modalTitle"></h2>
                <p id="modalDescription"></p>
                <a href="src/View/menu.php" class="go-to-menu-btn">Go to Menu</a>
            </div>
        </div>
    </div>

    <script>
        function openModal(title, description, imagePath) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDescription').innerText = description;
            document.getElementById('modalImage').src = imagePath;
            document.getElementById('myModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

    <?php include 'src/components/footer.php'; ?>
</body>

</html>

