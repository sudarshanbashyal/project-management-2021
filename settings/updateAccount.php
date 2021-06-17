<?php

    include '../init.php';

    if(isset($_POST['submit_btn'])){

        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        $error=false;

        if(empty($currentPassword)){
            $_SESSION['accountPasswordError']='You must enter your current password.';
            $error=true;
        }
        else{
            $passwordQuery = "
                SELECT user_id FROM users WHERE user_id=$_SESSION[userId] AND user_password='$currentPassword';
            ";
            $passwordQueryResult = mysqli_query($connection, $passwordQuery);

            if($passwordQueryResult){
                if(mysqli_num_rows($passwordQueryResult)==0){
                    $_SESSION['accountPasswordError']='Incorrect Password.';
                    $error=true;
                }
                else{
                    unset($_SESSION['accountPasswordError']);
                }
            }   
        }

        if(empty($newPassword)){
            $_SESSION['accountNewPasswordError']='Your must enter a new password.';
            $error=true;
        }
        elseif(strlen($newPassword)<6){
            $_SESSION['accountNewPasswordError']='Your password must be at least 6 characters long.';
            $error=true;
        }
        else{
            unset($_SESSION['accountNewPasswordError']);
        }

        if(empty($confirmPassword)){
            $_SESSION['accountConfirmError']='You must confirm your current password.';
            $error=true;
        }
        elseif($newPassword!==$confirmPassword){
            $_SESSION['accountConfirmError']='You did not enter the same password.';
            $error=true;
        }
        else{
            unset($_SESSION_['accountConfirmError']);
        }

        if($error){
            unset($_SESSION_['accountSuccess']);
            header('Location: ./settings.php');
        }
        else{
            $updatePasswordQuery = "
            UPDATE users SET user_password='$newPassword'
            WHERE user_id=$_SESSION[userId];
            ";

            $updatePasswordQueryResult = mysqli_query($connection, $updatePasswordQuery);
            if($updatePasswordQuery){
                $_SESSION['accountSuccess']='Password Successfully Updated!';
                header('Location: ./settings.php');
            }
        }    

    }
    else{
        header('Location: ./settings.php');
    }


?>