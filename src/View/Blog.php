<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="../../public/assets/css/blog.css">
</head>

<body>
<?php include '../components/header.php'; ?>
    <div class="container">
        <div class="blog-posts">
            <!-- Blog Post 1 -->
            <div class="blog-post">
                <div class="user-info">
                    <img src="../../public/images/logo.png" alt="No Photo">
                    <span>@user1</span>
                </div>
                <div class="blog-content">
                    <h3>"Secret Ingredients Chefs Won’t Tell You About"</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, fugit!</p>
                </div>
                <div class="interactions">
                    <span>15 <img src="#" alt="Like Icon"></span>
                    <span>30 <img src="#" alt="Comment Icon"></span>
                    <span>4 <img src="#" alt="Share Icon"></span>
                    <span>4hrs <p2>ago</p2></span>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <p>This will be used</p>
        </div>
    </div>
    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>
