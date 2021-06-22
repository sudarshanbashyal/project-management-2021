<?php
session_start();
include '../init.php';


// declaring the variable
$errors = array();
$successs=array(); 
$user_role="Trader";


// register the trader
if (isset($_POST['signup'])) {
  // receive all form input values
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
  $phonenumber = mysqli_real_escape_string($connection, $_POST['number']);
  $tradertype = mysqli_real_escape_string($connection, $_POST['tradertype']);

  

  


  //form validation: check that the form is filled out properly
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phonenumber is required"); }
  if (empty($tradertype)) { array_push($errors, "Tradertype is required"); }
  

  if ($password != $cpassword) {
	array_push($errors, "Password do not match");
  }

  
  //there isn't another trader with the same username ,email address and phonenumber
  $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$email' OR user_phone_number='$phonenumber' LIMIT 1";
  $results = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($results);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
      
    }
    if ($user['user_email'] === $email) {
      array_push($errors, "Email already exists");
    }
    if ($user['user_phone_number'] === $phonenumber) {
      array_push($errors, "Phone number already exists");
    }
    
  }

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

  // register the trader if there are no errors in the registration form
  if (count($errors) == 0) {
  	$password = md5($cpassword);//encrypt the password before storing it in the database.

  	$query = "INSERT INTO users (user_phone_number,user_name, user_email, user_password, user_role,category_id) 
  			  VALUES('$phonenumber','$username', '$email', '$password','$user_role','$tradertype')";
  	mysqli_query($connection, $query);
    array_push($successs, "Registration successful.");

  
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Trader</title>
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

            <a href="customerRegister.php" class="login-page-link">Register as Customer</a>
            <a href="" class="login-page-link active-login-link">Register as Trader</a>
            
            <form action="traderRegister.php" method="POST">
            <?php include 'errors.php'; ?>
                <h2>Create a new Trader account</h2>
               
                <input type="text" name="username" id="" placeholder="Trader Name">
                <input type="text" name="email" id="" placeholder="Email Address">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="cpassword" id="" placeholder="Confirm Password">
                <input type="number" name="number" id="" placeholder="Phone Number">
               <?php
             
               $traderQuery="Select * FROM trader_category;";
               $traderQueryResult=mysqli_query($connection, $traderQuery);

               ?>
                <select name="tradertype" id="">
                <option selected disabled>Select Your Trader Type</option>
                    
                    <?php
                    foreach($traderQueryResult as $trader){
                        echo "<option value='$trader[category_id]'>$trader[category_type]</option>";
                    }
                    ?>
                </select>
               
                <input class="submit-btn" name="signup" type="submit" value="Request a Trader Account">

                <a href="../login/traderLogin.php" class="login-link">Already have an account? <span>Log In Here</span></a>
            
            </form>
        
        </div>
    
    </div>

    <?php
    
        include '../footer/footer.php';
    
    ?>

    <script src="../navbar/navbar.js"></script>

    
</body>
</html>