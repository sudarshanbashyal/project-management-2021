<?php

    include '../init.php';

    if(isset($_POST['submit'])){
        $productId=$_GET['productId'];
        $productQuantity=$_POST['productQuantity'];

        // user is logged in
        if(isset($_SESSION['userId'])){
            $userId=$_SESSION['userId'];

            // getting cart id of the current user
            $cartIdQuery = "SELECT cart_id from cart c INNER JOIN users u ON c.user_id=u.user_id WHERE u.user_id=$userId;";
            $cartIds=mysqli_query($connection, $cartIdQuery);
            $userCartId=null;

            if($cartIds){
                foreach($cartIds as $currentId){
                    $userCartId=$currentId['cart_id'];
                }
            }

            // adding product to cart
            $addQuery = "INSERT INTO cart_details VALUES($userCartId, $productId, $productQuantity);";
            $addQueryResult = mysqli_query($connection, $addQuery);
            if($addQueryResult){
                header('Location: ../cart/cart.php');
            }
        }
        // user isn't logged in
        else{
            if(isset($_SESSION['currentCart'])){
                array_push($_SESSION['currentCart'],array($productId=>$productQuantity));
            }
            else{
                $_SESSION['currentCart']=array();
                array_push($_SESSION['currentCart'],array($productId=>$productQuantity));
            }
            header('Location: ../cart/cart.php');
        }
        
    }

?>