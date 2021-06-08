<?php

    include '../init.php';
    $userId = $_SESSION['userId'];

    if(isset($_POST['submit'])){
        $quantities=$_POST['quantities'];
        
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

?>