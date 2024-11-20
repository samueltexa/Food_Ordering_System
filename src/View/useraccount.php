<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="stylesheet" href="../../public/assets/css/useraccount.css">

    <style>
        .error-message {
            color: green;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-area">
            <div>
                <form id="user-form" action="update_account.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Update User Information</legend>
                        <div class="form-row">
                            <div class="fields">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first_name" id="first-name" placeholder="First Name" required>
                            </div>
                            <div class="fields">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="last_name" id="last-name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="fields">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                            <div class="fields">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="fields">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <!-- Display error messages dynamically -->
                            <?php if (isset($_SESSION['error_message'])): ?>
                                <p class="error-message">
                                    <?php
                                    echo $_SESSION['error_message'];
                                    unset($_SESSION['error_message']); // Clear message after displaying
                                    ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </fieldset>
                    <button type="submit" class="update-btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
