<?php
    include '../init.php';

    if(isset($_POST['submit_btn'])){

        $userName = $_POST['user_name'];
        $userPhoneNumber = $_POST['user_phone_number'];

        if(empty($userName)){
            $_SESSION['profileNameError']='Your name must not be empty.';
            header('Location: ./settings.php');
            return;
        }
        else{
            unset($_SESSION['profileNameError']);
        }

        if(empty($userPhoneNumber)){
            $_SESSION['profilePhoneError']='Your phone number must not be empty.';
            header('Location: ./settings.php');
            return;
        }
        else{
            unset($_SESSION['profilePhoneError']);
        }

        //checking unique phone number
        $phoneNumberQuery = "
            SELECT user_id FROM users WHERE user_phone_number = $userPhoneNumber;
        ";
        $phoneNumberQueryResult = mysqli_query($connection, $phoneNumberQuery);

        if(mysqli_num_rows($phoneNumberQueryResult)>0){
            $_SESSION['profilePhoneError']='Your phone number must be unique.';
            header('Location: ./settings.php');
            return;
        }

        //update profile
        $updateQuery = "
            UPDATE users SET user_name='$userName', user_phone_number='$userPhoneNumber' 
            WHERE user_id=$_SESSION[userId];
        ";
        $updateQueryResult = mysqli_query($connection, $updateQuery);
        if($updateQueryResult){
            header('Location: ./settings.php');
        }

    }
    else{
        header('Location: ./settings.php');
    }

?>