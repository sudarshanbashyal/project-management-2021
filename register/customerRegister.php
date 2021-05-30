<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Customer</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <?php

        include '../navbar/navbar.php';
    
    ?>

    <div class="register-container">
    
        <div class="form-container">

            <a href="" class="login-page-link active-login-link">Register as Customer</a>
            <a href="traderRegister.php" class="login-page-link">Register as Trader</a>

            <form>

                <h2>Create a new account</h2>
                <input type="text" name="" id="" placeholder="Full Name">
                <input type="text" name="" id="" placeholder="Email Address">
                <input type="password" name="" id="" placeholder="Password">
                <input type="password" name="" id="" placeholder="Confirm Password">
                <input type="number" name="" id="" placeholder="Phone Number">

                <select name="" id="">
                    <option selected disabled>Select Your Gender</option>
                    <option value="">Male</option>
                    <option value="">Female</option>
                    <option value="">Other</option>
                </select>

                <input class="submit-btn" type="submit" value="Sign Up">

                <a href="../login/customerLogin.php" class="login-link">Already have an account? <span>Log In Here</span></a>
            
            </form>
        
        </div>
    
    </div>

    <script src="../navbar/navbar.js"></script>

    
</body>
</html>