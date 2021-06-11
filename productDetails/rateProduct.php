<?php

    include '../init.php';


    if($_SESSION['userId']){
        $productId = $_GET['productId'];
        $rating = $_GET['ratingStar'];

        if(!$productId || !$rating){
            header('Location: ../login/customerLogin.php');
        }
        else{
            $ratingQuery = "SELECT * FROM rating WHERE user_id=$_SESSION[userId] AND product_id=$productId";
            $ratingQueryResult = mysqli_query($connection, $ratingQuery);

            if(mysqli_num_rows($ratingQueryResult)==0){
                $ratingQuery = "INSERT INTO rating(user_id, rating_star, product_id) VALUES($_SESSION[userId], $rating, $productId);";
                $ratingQueryResult = mysqli_query($connection, $ratingQuery);

                if($ratingQuery){
                    header("Location: ./productDetails.php?productId=$productId");
                }
            }
            else{
                $ratingQuery = "UPDATE rating SET rating_star=$rating WHERE user_id=$_SESSION[userId] AND product_id=$productId;";
                $ratingQueryResult = mysqli_query($connection, $ratingQuery);

                if($ratingQuery){
                    header("Location: ./productDetails.php?productId=$productId");
                }
            }
        }


    }
    else{
        header('Location: ../login/customerLogin.php');
    }

?>