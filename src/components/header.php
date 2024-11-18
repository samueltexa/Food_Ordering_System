<?php session_start(); ?>
<!-- Header Section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../../public/assets/css/main.css">

<header>
    <div>
        <h1 class="logo">FEASTHIVE</h1>
    </div>
    <nav>
        <ul>
            <li><a href="/Food_Ordering_System/">HOME</a></li>
            <li><a href="/Food_Ordering_System/src/View/menu.php">MENU</a></li>
            <li><a href="/Food_Ordering_System/src/View/Blog.php">BLOGS</a></li>
            <li><a href="/Food_Ordering_System/src/View/help.php"><i class="fas fa-question-circle"></i> HELP</a></li>
            <li class="dropdown">
                <a href="#"><i class="fas fa-user"></i> ACCOUNT<i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- If user is logged in, show account, orders, and logout options -->
                        <a href="/Food_Ordering_System/src/View/useraccount.php"><i class="fas fa-user"></i> Account</a>
                        <a href="/Food_Ordering_System/src/View/Blog.php"><i class="fas fa-box"></i> Orders</a>
                        <a href="/Food_Ordering_System/config/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <?php else: ?>
                        <!-- If user is not logged in, show login link -->
                        <a href="/Food_Ordering_System/src/View/Login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <?php endif; ?>
                </div>
            </li>
            <li><a href="/Food_Ordering_System/src/View/cart.php"><i class="fas fa-shopping-cart"></i> CART</a></li>
        </ul>
    </nav>
</header>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ff6347;
        padding: 10px 20px;
    }

    .logo {
        color: #fff;
        font-size: 24px;
        margin: 0;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    nav ul li {
        margin-left: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
        font-size: 16px;
    }

    nav ul li a.order-now:hover {
        background-color: #f4f4f4;
    }
</style>
