<?php
session_start();
include '../init.php';

// declaring the variable
$errors = array(); 
$successs = array();
$user_role="Customer";


// register the customer
if (isset($_POST['signup'])) {
  // receive all form input values
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
  $phonenumber = mysqli_real_escape_string($connection, $_POST['number']);

 // form validation: ensure that the form is filled correctly
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phonenumber is required"); }

  //making the data persist
  if (!empty($username)) {$_SESSION['usernameData'] = $username;}
  if (!empty($email)) {$_SESSION['emailData'] = $email;}
  if (!empty($password)) {$_SESSION['passwordData'] = $password;}
  if (!empty($cpassword)) {$_SESSION['cpasswordData'] = $cpassword;}
  if (!empty($phonenumber)) {$_SESSION['phonenumberData'] = $phonenumber;}


  if ($password != $cpassword) {
	array_push($errors, "Password do not match");
  }

  //there isn't another customer with the same username,email address and phone number
  $userEmailCheck = "SELECT * FROM users WHERE user_email='$email';";
  $userPhoneNumberCheck = "SELECT * FROM users WHERE user_phone_number='$phonenumber';";
  
  $userEmailCheckResult = mysqli_query($connection, $userEmailCheck);
  $userPhoneNumberCheck = mysqli_query($connection, $userPhoneNumberCheck);
  
  // email exists
  if($userEmailCheckResult){
    if(mysqli_num_rows($userEmailCheckResult)>0){
        array_push($errors, 'Email address already exists.');
    }
  }

  // phone number exists
  if(mysqli_num_rows($userPhoneNumberCheck)>0){
      array_push($errors, 'Phone Number already exists.');
  }

  // phonenumber exists

  //password stength
  if(strlen($password) <=8)
  {
      $errors['password'] = "Your Password Must Contain At Least 8 Characters";
  }
  elseif(!preg_match('#[0-9]+#',$password))
  {
      $errors['password']="Your Password Must Contain At Least 1 Capital Letter!";
  }
  elseif(!preg_match('#[A-Z]+#',$password))
  {
      $errors['password']="Your Password Must Contain At Least 1 Capital Letter!";
  }
  elseif(!preg_match('#[a-z]+#',$password))
  {
      $errors['password']="Your Password Must Contain At Least 1 Lowercase Letter!";
  }
  elseif(!preg_match('@[^\w]@', $password))
  {
      $errors['password']="Your Password Must Contain At Least 1 Special Character!";
  }

   // register the customer if there are no errors in the registration form
  if (count($errors) == 0) {
  	$password = md5($cpassword);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (user_phone_number,user_name, user_email, user_password ,user_role, verified) 
  			  VALUES('$phonenumber','$username', '$email', '$password','$user_role', 'FALSE')";
  	$insertToTable = mysqli_query($connection, $query);
    array_push($successs, "Registration successful.");

    //Checking to see if it has been inserted into the table and sending the mail if it has been inserted to table
    if ($insertToTable) {
        $to = $email;
        $subject = "Account Verification";
        $message = "Hi $username,\r\n 
        Thank you for registering as customer at Hamro-Mart.\r\n 
        Please click on this <a href = 'http://localhost/projectmanagement/register/verify.php?key=$email'>link</a> to verify your account.\r\n
        Regards:Hamro-Mart";
        $headers = "From: hloview@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['emailSent'] = '<h3>An email has been sent out to '.$username.' Please check your email.</h3>';
        }
        else{
          $_SESSION['emailFail'] = '<h3>Sorry, Error while sending mail</h3>';
        }
    }

  }
}
?>
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

            <form action="customerRegister.php" method="POST"> 
            <?php include 'errors.php'; 
            	if (isset($_SESSION['emailSent'])) {
                echo $_SESSION['emailSent'];
                unset($_SESSION['emailSent']);
              }
              elseif(isset($_SESSION['emailFail'])) {
            		echo $_SESSION['emailFail'];
            		unset($_SESSION['emailFail']);
            	}

              if (isset($_SESSION['register_error'])) {
                echo $_SESSION['register_error'];
                unset($_SESSION['register_error']);
              }elseif (isset($_SESSION['successful_update'])) {
                echo $_SESSION['successful_update'];
                unset($_SESSION['successful_update']);
              }
            ?>

                <h2>Create a new account</h2>
                
                <input type="text" name="username" id="" placeholder="Full Name" value="<?php 
                        if(isset($_SESSION['usernameData'])){echo $_SESSION['usernameData']; unset($_SESSION['usernameData']);} ?>">
                <input type="text" name="email" id="" placeholder="Email Address" value="<?php 
                        if(isset($_SESSION['emailData'])){echo $_SESSION['emailData']; unset($_SESSION['emailData']);} ?>">

                <input type="password" name="password" id="" placeholder="Password" value="<?php 
                        if(isset($_SESSION['passwordData'])){echo $_SESSION['passwordData']; unset($_SESSION['passwordData']);} ?>">

                <input type="password" name="cpassword" id="" placeholder="Confirm Password" value="<?php 
                        if(isset($_SESSION['cpasswordData'])){echo $_SESSION['cpasswordData']; unset($_SESSION['cpasswordData']);} ?>">

                <input type="number" name="number" id="" placeholder="Phone Number" value="<?php 
                        if(isset($_SESSION['phonenumberData'])){echo $_SESSION['phonenumberData']; unset($_SESSION['phonenumberData']);} ?>">

                <input class="submit-btn" type="submit" name="signup" value="signup">
                

                <a href="../login/customerLogin.php" class="login-link">Already have an account? <span>Log In Here</span></a>
            
            </form>
        
        </div>
    
    </div>

    <?php
    
        include '../footer/footer.php';
    
    ?>

    <script src="../navbar/navbar.js"></script>

    
</body>
</html>