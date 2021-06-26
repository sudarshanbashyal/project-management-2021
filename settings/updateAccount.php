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
            $passwordCorrect = false;
            $passwordQuery = "
                SELECT user_id FROM HAMROMART.users WHERE user_id=$_SESSION[userId] AND user_password='$currentPassword'
            ";
            $passwordQueryResult = oci_parse($connection, $passwordQuery);
            oci_execute($passwordQueryResult);

            if($passwordQueryResult){
                while($password = oci_fetch_assoc($passwordQueryResult)){
                    $passwordCorrect = true;
                }
                if(!$passwordCorrect){
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
            unset($_SESSION['accountConfirmError']);
        }

        if($error){
            unset($_SESSION['accountSuccess']);
            header('Location: ./settings.php');
        }
        else{
            $updatePasswordQuery = "
                UPDATE HAMROMART.users SET user_password='$newPassword'
                WHERE user_id=$_SESSION[userId]
            ";

            $updatePasswordQueryResult = oci_parse($connection, $updatePasswordQuery);
            oci_execute($updatePasswordQueryResult);

            if($updatePasswordQueryResult){
                $_SESSION['accountSuccess']='Password Successfully Updated!';
                header('Location: ./settings.php');
            }
        }    

    }
    else{
        header('Location: ./settings.php');
    }


?>