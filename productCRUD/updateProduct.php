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
                    <textarea  id="" cols="30" rows="5" placeholder="Product Description" name="Description" value="<?php echo $_SESSION['product_description'];?>"></textarea>
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

                    <textarea id="" cols="30" rows="5" placeholder="Allergy Information" name="allergy_info" value="<?php echo $_SESSION['allergy_information'];?>"></textarea>

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

    </div>

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>