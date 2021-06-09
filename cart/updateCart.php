<?php

    include '../init.php';

    if(isset($_POST['submit'])){
        $quantities=$_POST['quantities'];
        
        if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];

            foreach($quantities as $productNo=>$quantity){
                $updateQuery = "
                    UPDATE cart_details cd
                    INNER JOIn cart c ON c.cart_id=cd.cart_id
                    INNER JOIN users u ON u.user_id=c.user_id
                    SET cd.product_quantity=$quantity[0]
                    WHERE cd.product_id=$productNo AND u.user_id=$userId;
                ";
    
                $updateQueryResult = mysqli_query($connection, $updateQuery);
                if($updateQueryResult){
                    header('Location: cart.php');
                }
            }
        }
        else{
            // session_destroy($_SESSION['currentCart']);

            $_SESSION['currentCart']=array();
            foreach($quantities as $productNo=>$quantity){
                array_push($_SESSION['currentCart'],array($productNo=>$quantity[0]));
                // print_r($productNo);
                // print_r($quantity);
            }

            // print_r($_SESSION['currentCart']);
            header('Location: cart.php');
        }
        
    }

?>