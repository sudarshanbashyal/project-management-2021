<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateProduct.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <title>Update Product</title>
</head>
<body>

    <?php
        include '../navbar/navbar.php';
    ?>
    <?php
        include '../init.php';
        $product_id=$_GET['product_id'];
        $sql="SELECT * FROM product WHERE product_id= $product_id;";
        $query=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($query)){
            $_SESSION['product_name']=$row['product_name'];
            $_SESSION['product_description']=$row['product_description'];
            $_SESSION['min_order']=$row['min_order'];
            $_SESSION['max_order']=$row['max_order'];
            $_SESSION['allergy_information']=$row['allergy_information'];
            $_SESSION['stock']=$row['stock'];
            $_SESSION['product_image']=$row['product_image'];
            $_SESSION['discount']=$row['discount'];
            $_SESSION['product_price']=$row['product_price'];
            $_SESSION['shop_id']=$row['shop_id'];
        }
        $shop_id=$_SESSION['shop_id'];
        $sql2="SELECT * FROM shop WHERE shop_id=$shop_id;";
        $query2=mysqli_query($connection,$sql2);
        while($row=mysqli_fetch_assoc($query2)){
            $_SESSION['shop_name']=$row['shop_name'];
        }
        $shop_name=$_SESSION['shop_name'];

        $_SESSION['url']="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    ?>

    

    <div class="update-container">
    
        <div class="form-container">

            <h2 class="container-title">
                Update Product <br>
                Details...
            </h2>

            <!-- add method to this form and add 'name' and 'attribute' after retrieving from database -->
            <form action='<?php echo "update.php?product_id=$product_id";?>' method="POST">

                <div class="product-image">
                    <img src="<?php echo $_SESSION['product_image'];?>" alt="">
                </div>

                <div class="product-details">

                    <input type="text" placeholder="Product Name" name="product_name" value="<?php echo $_SESSION['product_name']; ?>" >
                   <?php 
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error']=="name"){
                                echo "product name should not be empty.";
                                unset($_SESSION['error']);
                             }
                         }
                    ?>
                    <textarea  id="" cols="30" rows="5" placeholder="Product Description" name="Description">
                        <?php echo $_SESSION['product_description'];?>
                    </textarea>
                    <?php
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error']=="description") {
                                echo "product description should not be empty.";
                                unset($_SESSION['error']);
                            }
                        }
                    ?>
                    
                    <div class="product-price">
                        <input type="text" placeholder="Product Price" name="price" value="<?php echo $_SESSION['product_price'];?>">
                         <?php
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error']=="price") {

                                echo "product  price should not be empty.";
                                unset($_SESSION['error']);
                            }
                        }
                    ?>

                        <input type="text" placeholder="Discount" name="discount" value="<?php echo $_SESSION['discount'];?>">
                    </div>

                    <textarea id="" cols="30" rows="5" placeholder="Allergy Information" name="allergy_info">
                        <?php echo $_SESSION['allergy_information'];?>
                    </textarea>

                    <input type="text" placeholder="Image Link" name="image" value="<?php echo $_SESSION['product_image'];?>">

                    <select name="shop" id="" selected="<?php echo $_SESSION['shop_name'];?>">
                
                        <?php
                            echo '<option>'.'Select a shop to display the product'.'</option>';
                            include '../init.php';
                            $user_id = $_SESSION['userId'];
                            $sql="SELECT * FROM shop WHERE user_id = $user_id ;";
                            $query=mysqli_query($connection,$sql);
                        
                        while($row=mysqli_fetch_assoc($query)){
                            if($shop_name==$row['shop_name']){
                                echo '<option selected="'.'selected'.'"'.'value="'.$row['shop_id'].'"'.'>'.$row['shop_name'].'</option>';
                            }else{
                            echo '<option value="'.$row['shop_id'].'"'.'>'.$row['shop_name'].'</option>';
                        }
                        }
                        ?>
                    </select>
                    <input type="text" placeholder="stock quantity" name="stock" value="<?php echo $_SESSION['stock'];?>">
                     <?php
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error']=="stock") {

                                echo "product stock should not be empty.";
                                unset($_SESSION['error']);
                            }
                        }
                    ?>
                    <input type="text" name="minOrder" placeholder="Minimum order" value="<?php echo $_SESSION['min_order'];?>">
                    <input type="text" name="maxOrder" placeholder="Maximum order" value="<?php echo $_SESSION['max_order'];?>">

                    <div class="product-buttons">
                        <input class="delete-button" type="submit" value="Delete Product" name="delete_submit">
                        <input class="update-button" type="submit" value="Update Product Details" name="update_submit">
                    </div>
                       
                </div>
            
            
            </form>
          
           <?php
           if(isset($_SESSION['status'])){
            if($_SESSION['status']=="successfull"){

                echo "products updaated successfully.";
                unset($_SESSION['status']);

            }
        }
           ?>
        </div>

        <!-- product reviews -->

        <div class="reviews-container">
            <h2 class="container-title">
                What People Think About <br>
                Your Product...
            </h2>

            <div class="comments">
                <?php
                
                    $commentsQuery = "
                        SELECT comment_content, u.user_name FROM comments c
                        INNER JOIN users u ON u.user_id = c.user_id
                        INNER JOIN product p ON p.product_id=c.product_id
                        WHERE p.product_id=$product_id;
                    ";

                    $commentsQueryResult = mysqli_query($connection, $commentsQuery);
                    
                    if($commentsQueryResult){

                        if(mysqli_num_rows($commentsQueryResult)==0){
                            echo "<h3>No comments found =(</h3>";
                        }

                        foreach($commentsQueryResult as $comment){
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

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>