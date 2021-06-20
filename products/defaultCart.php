<?php

    include '../init.php';

    $productId = $_GET['productId'];
    $minOrder = 1;

    $minOrderQuery = "
        SELECT min_order FROM product WHERE product_id=$productId;
    ";
    $minOrderQueryResult = mysqli_query($connection, $minOrderQuery);

    if($minOrderQueryResult){
        if(mysqli_num_rows($minOrderQueryResult)==0){
            header('Location: ./products.php');
        }
        else{
            foreach($minOrderQueryResult as $product){
                $minOrder=$product['min_order'];

                // check if user is logged in or not
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
                    $addQuery = "INSERT INTO cart_details VALUES($userCartId, $productId, $minOrder);";
                    $addQueryResult = mysqli_query($connection, $addQuery);
                    if($addQueryResult){
                        header('Location: ../cart/cart.php');
                    }
                }
                else{
                    if(isset($_SESSION['currentCart'])){
                        array_push($_SESSION['currentCart'],array($productId=>$minOrder));
                    }
                    else{
                        $_SESSION['currentCart']=array();
                        array_push($_SESSION['currentCart'],array($productId=>$minOrder));
                    }
                    header('Location: ../cart/cart.php');
                }
            }
        }
    }

?>