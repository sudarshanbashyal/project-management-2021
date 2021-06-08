<?php

    include '../init.php';
    $userId = $_SESSION['userId'];

    $productId = $_GET['productId'];
    $commentContent = $_POST['commentContent'];

    // sanitizing comment content
    $commentContent= htmlspecialchars($commentContent);

    $commentQuery = "
        INSERT INTO comments(user_id, product_id, comment_content)
        VALUES($userId, $productId, '$commentContent');
    ";
    $commentQueryResult = mysqli_query($connection, $commentQuery);

    if($commentQueryResult){
        header("Location: ./productDetails.php?productId=$productId");
    }

?>