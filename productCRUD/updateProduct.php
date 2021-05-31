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

    <div class="update-container">
    
        <div class="form-container">

            <h2 class="container-title">
                Update Product <br>
                Details...
            </h2>

            <form action="">


                <div class="product-image">
                    <img src="https://eatthegains.com/wp-content/uploads/2019/03/Grilled-Carrots-1.jpg" alt="">
                </div>

                <div class="product-details">

                    <input type="text" placeholder="Product Name">
                    <textarea name="" id="" cols="30" rows="5" placeholder="Product Description"></textarea>
                    
                    <div class="product-price">
                        <input type="text" placeholder="Product Price">
                        <input type="text" placeholder="Discount">
                    </div>

                    <textarea name="" id="" cols="30" rows="5" placeholder="Allergy Information"></textarea>

                    <input type="text" placeholder="Image Link">

                    <select name="" id="">
                        <option value="">Select a shop to display the product</option>
                    </select>

                    <div class="product-buttons">
                        <input class="delete-button" type="submit" value="Delete Button">
                        <input class="update-button" type="submit" value="Update Product Details">
                    </div>
                       
                </div>
            
            
            </form>

        </div>

    </div>

    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>