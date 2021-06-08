<?php

    include '../init.php';
    $userId = $_SESSION['userId'];

    $deleteQuery = "
        DELETE cd.* FROM cart_details cd
        INNER JOIN cart c ON c.cart_id = cd.cart_id
        INNER JOIN users u ON u.user_id = c.user_id
        WHERE u.user_id=$userId;
    ";
    $deleteQueryResult = mysqli_query($connection, $deleteQuery);

    if($deleteQueryResult){
        header('Location: cart.php');
    }


?>