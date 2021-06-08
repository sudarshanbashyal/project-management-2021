<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="productDetails.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <title>Product Details</title>
</head>
<body>

    <?php

        include '../navbar/navbar.php';
    
    ?>

    <?php
        include '../init.php';

        $productId = $_GET['productId'];
        $productQuery = "SELECT * FROM product p INNER JOIN shop s ON s.shop_id=p.shop_id WHERE product_id=$productId;";
        $products = mysqli_query($connection, $productQuery);
        $currentProduct;
        
        if(!mysqli_num_rows($products)==0){
            foreach($products as $product){
                $currentProduct=$product;
            }
        }    
    ?>

    <div class="main-container">

        <div class="details-container">

            <div class="image-container">
                <img src="<?php echo($currentProduct['product_image']) ?>" alt="">
            </div>

            <div class="text-container">

                <h2 class="product-name">
                    <?php
                        echo $currentProduct['product_name'];
                    ?>
                </h2>
                <p class="trader-name">
                    <?php
                        echo $currentProduct['shop_name'];
                    ?>
                </p>

                <div class="product-rating">

                    <svg class="filled-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                    <svg class="filled-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                    <svg class="filled-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                    <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                    <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>

                </div>

                <h2 class="product-price">
                    <?php
                        echo "&pound ".$currentProduct['product_price'];
                    ?>
                </h2>

                <!-- show product out of stock -->
                <?php
                
                    if($currentProduct['stock']==0){
                        echo "<h3 class='out-of-stock'>Product out of stock</h3>";
                    }
                    elseif(isset($_SESSION['currentCart'][$currentProduct['product_id']])){
                        echo "<a class='already-in-cart' href='../cart/cart.php'>Product already in cart</a>";
                    }
                    else{
                        echo "<div class='cart-functionalities'>";
                        echo "<form action='./cartForm.php?productId=$productId' method='POST'>";
                        echo "<select name='productQuantity'>";
                        $maxCartQuantity = $currentProduct['stock']<$currentProduct['max_order']?$currentProduct['stock']:$currentProduct['max_order'];

                        for($i=$currentProduct['min_order']; $i<$maxCartQuantity; $i++){
                            $selectedQuantity = $i==$currentProduct['min_order']?'selected':'';
                            echo "<option value='$i' $selectedQuantity>$i</option>";
                        }
                        echo "</select>";
                        echo "<input type='submit' name='submit' value='Add to Cart'>";
                        echo "</form>";
                        echo "</div>";
                    }
                
                ?>

                <!-- <div class="cart-functionalities">
                    <form action='<?php echo"./cartForm.php?productId=$productId"?>' method='POST'>

                        <select name='productQuantity'>
                            <?php
                                // if the stock is less than max order, then max cart quantity should be the stock, else the max order amount
                                $maxCartQuantity = $currentProduct['stock']<$currentProduct['max_order']?$currentProduct['stock']:$currentProduct['max_order'];

                                for($i=$currentProduct['min_order']; $i<$maxCartQuantity; $i++){
                                    $selectedQuantity = $i==$currentProduct['min_order']?'selected':'';
                                    echo "<option value='$i' $selectedQuantity>$i</option>";
                                }

                            ?>
                        </select>

                        <input <?php echo ($currentProduct['stock']==0?'disabled':''); ?> type="submit" name="submit" value="Add to Cart">
                    </form>
                </div> -->

                <div class="description-container">

                    <p class="desc-container-title">
                        description
                    </p>

                    <p class="product-description">
                        <?php
                            echo $currentProduct['product_description'];
                        ?>
                    </p>

                    <div class="allergy-info-container">

                        <svg class="allergy-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>

                        <p class="allergy-title">
                            Allergy Information
                        </p>

                        <p class="allergy-content">
                            <?php
                                echo $currentProduct['allergy_information'];
                            ?>                        
                        </p>
                    </div>

                    <div class="rate-product">
                        <span>Rate this product: </span>

                        <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                        <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                        <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                        <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                        <svg class="stroke-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
                    </div>

                </div>

            </div>

        </div>

        <hr>

        <div class="comments-container">
            <h2 class="comments-container-title">
                What Others Think of this Product...
            </h2>

            <?php

                // retrieving all comments from database
                $commentQuery = "
                    SELECT c.comment_content, u.user_name
                    FROM comments c
                    INNER JOIN users u ON u.user_id=c.user_id
                    INNER JOIN product p ON p.product_id=c.product_id
                    WHERE p.product_id=$productId;
                ";

                $commentQueryResult = mysqli_query($connection, $commentQuery);
            
            ?>

            <div class="comment-section">

                <div class="comment-box">
                    <form method="POST">
                        <input type="text" name="commentContent" placeholder="Leave a review...">

                        <button type="submit" formaction="<?php echo"submitComment.php?productId=$productId"?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M1.439 16.873l-1.439 7.127 7.128-1.437 16.873-16.872-5.69-5.69-16.872 16.872zm4.702 3.848l-3.582.724.721-3.584 2.861 2.86zm15.031-15.032l-13.617 13.618-2.86-2.861 10.825-10.826 2.846 2.846 1.414-1.414-2.846-2.846 1.377-1.377 2.861 2.86z"/></svg>
                        </button>
                    </form>
                </div>

                <div class="comments">

                    <?php

                        if(mysqli_num_rows($commentQueryResult)==0){
                            echo "<h3 class='no-comments'>This product does not have any comments.</h3>";
                        }
                        else{

                            foreach($commentQueryResult as $comment){
                                echo "<div class='comment'>";
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z'/></svg>";

                                echo "
                                    <div class='comment-info'>
                                        <p class='user-name'>$comment[user_name]</p>
            
                                        <p class='comment-content'>
                                            $comment[comment_content]
                                        </p>
                                    </div>
                                ";

                                echo "</div>";
                                echo "<hr>";
                            }

                        }
                    
                    ?>

                </div>

            </div>
        </div>

    </div>

    <?php
    
        include '../footer/footer.php';

    ?>

    

    <script src="../navbar/navbar.js"></script>
    <script src="./script.js"></script>
    
</body>
</html>