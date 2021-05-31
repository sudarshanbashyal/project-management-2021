<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="settings.css">
    <title>Settings</title>
</head>
<body>

    <?php

        include '../navbar/navbar.php';
    
    ?>

    <div class="container">

        <div class="profile-settings">

            <h3>Profile Settings</h3>
            
            <input type="text" placeholder="Full Name">
            <input type="text" placeholder="Phone Number">

            <button class="save-button">Save Changes</button>
            <button class="cancel-button">Cancel</button>

        </div>

        <div class="account-settings">

            <h3>Account Settings</h3>

            <input type="password" placeholder="Current Password">
            <input type="password" placeholder="New Password">
            <input type="password" placeholder="Confirm New Password">

            <button class="save-button">Save Changes</button>
            <button class="cancel-button">Cancel</button>

        </div>

    </div>

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>