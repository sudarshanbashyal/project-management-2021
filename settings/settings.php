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
        include '../init.php';

        $currentName='';
        $currentPhoneNumber='';

        $profileQuery = "
            SELECT user_name, user_phone_number FROM users WHERE user_id=$_SESSION[userId];
        ";

        $profileQueryResult = mysqli_query($connection, $profileQuery);
        if($profileQueryResult){
            foreach($profileQueryResult as $profile){
                $currentName=$profile['user_name'];
                $currentPhoneNumber=$profile['user_phone_number'];
            }
        }
    
    ?>

    <div class="container">

        <div class="profile-settings">

            <h3>Profile Settings</h3>

            <form action="updateProfile.php" method="POST">
                <input type="text" name="user_name" placeholder="Full Name" value="<?php echo $currentName; ?>">
                <?php

                    if(isset($_SESSION['profileNameError'])){
                        echo "<p class='error-msg'>$_SESSION[profileNameError]</p>";
                    }
                
                ?>

                <input type="text" name="user_phone_number" placeholder="Phone Number" value="<?php echo $currentPhoneNumber; ?>">
                <?php

                    if(isset($_SESSION['profilePhoneError'])){
                        echo "<p class='error-msg'>$_SESSION[profilePhoneError]</p>";
                    }
                
                ?>

                <input type="submit" class="save-button" name="submit_btn" value="Save Changes">
                <button class="cancel-button">Cancel</button>
            </form>
            
        </div>

        <div class="account-settings">

            <h3>Account Settings</h3>

            <form action="updateAccount.php" method="POST">
                <input type="password" placeholder="Current Password" name="current_password">
                <?php

                    if(isset($_SESSION['accountPasswordError'])){
                        echo "<p class='error-msg'>$_SESSION[accountPasswordError]</p>";
                    }
                
                ?>

                <input type="password" placeholder="New Password" name="new_password">
                <?php

                    if(isset($_SESSION['accountNewPasswordError'])){
                        echo "<p class='error-msg'>$_SESSION[accountNewPasswordError]</p>";
                    }
                
                ?>

                <input type="password" placeholder="Confirm New Password" name="confirm_password">
                <?php

                    if(isset($_SESSION['accountConfirmError'])){
                        echo "<p class='error-msg'>$_SESSION[accountConfirmError]</p>";
                    }

                    if(isset($_SESSION['accountSuccess'])){
                        echo "<p class='success-msg'>$_SESSION[accountSuccess]</p>";
                    }
                
                ?>

                <input type="submit" class="save-button" name="submit_btn" value="Save Changes">
                <button class="cancel-button">Cancel</button>

            </form>
        </div>

    </div>

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>