<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateProduct.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="addProduct.css">
    <title>Add Product</title>
</head>
<body>

    <?php
        include '../navbar/navbar.php';
    ?>

    <div class="add-container">
    
        <div class="form-container">

            <h2 class="container-title">
                Add New <br>
                Product...
            </h2>

            <!-- add method to this form and name attributes to the inputs -->
            <form action="add.php" method="POST">

                <input type="text" placeholder="Product Name" name="product_name">
                <textarea name="description" id="" cols="30" rows="5" placeholder="Product Description"></textarea>
                
                <div class="product-price">
                    <input type="text" placeholder="Product Price" name="price">
                    <input type="text" placeholder="Discount" name="discount">

                    <input type="text" placeholder="stock quantity" name="stock">

                </div>

                <textarea name="allergy_info" id="" cols="30" rows="5" placeholder="Allergy Information"></textarea>

                <input type="text" placeholder="Image Link" name="image">


               


                <select name="selection" id="">
                	<?php

                	echo '<option>'.'Select a shop to display the product'.'</option>';
                	include '../init.php';

                	$id=$_SESSION['userId'];
					$sql="SELECT * FROM shop WHERE user_id=$id";
					$result=mysqli_query($connection,$sql);
					while($row=mysqli_fetch_assoc($result)){
					echo'<option value="'.$row['shop_id'].'">'.$row['shop_name'].'</option>';

                    }
                	?>
                	

                </select>
                <div class="minMax">
                	<input type="text" placeholder="minimum order" name="minOrder">
                	<input type="text" placeholder="Maximum order" name="maxOrder">
                </div>

                <input class="add-button" type="submit" value="Add New Prouct" name="product_submit">           
            
            </form>

        </div>

    </div>

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>