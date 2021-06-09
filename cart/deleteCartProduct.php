<?php

    include '../init.php';
    $productId = $_GET['productId'];

    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];

        $deleteQuery = "
            DELETE cd.* FROM cart_details cd
            INNER JOIN cart c ON c.cart_id = cd.cart_id
            INNER JOIN users u ON u.user_id = c.user_id
            WHERE u.user_id=$userId AND cd.product_id=$productId;
        ";
        $deleteQueryResult = mysqli_query($connection, $deleteQuery);
    
        if($deleteQueryResult){
            header('Location: cart.php');
        }
    }
    else{
        // print_r($_SESSION['currentCart']);
        for($i=0;$i<sizeof($_SESSION['currentCart']);$i++){
            foreach($_SESSION['currentCart'][$i] as $cartProductId=>$cartProductQuantity){
                if($cartProductId==$productId){
                    // unset($_SESSION['currentCart'][$i]);
                    array_splice($_SESSION['currentCart'],$i,1);
                    header('Location: cart.php');
                }
            }
        }

        // foreach($_SESSION['currentCart'] )
    }

?>