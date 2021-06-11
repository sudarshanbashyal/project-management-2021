<?php
    include "../init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="products.css">  
    <link rel="stylesheet" href="../navbar/navbar.css">
    <title>All Products</title>
</head>
<body>

    <?php

        include "../navbar/navbar.php";
        
    ?>

    <div class="products-container">
    
        <div class="search-container">

            <form method= "GET" action="search.php" name="search">
            
                <div class="input-search">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z"/></svg>
                    <input type="text" placeholder="Search..." value="<?php if(isset($_SESSION['searchData'])){echo $_SESSION['searchData']; unset($_SESSION['searchData']); } ?>" name="searchbar">
                </div>

                <select name="product-type" id="product-dropdown">
                    <option selected disabled>Product Type</option>
                    <option value = "Butcher" <?php if (isset($_SESSION['productData']) && $_SESSION['productData'] == 'Butcher') {
                        echo "selected"; unset($_SESSION['productData']);
                    } ?> >Butcher</option>

                    <option value = "Greengrocer" <?php if (isset($_SESSION['productData']) && $_SESSION['productData'] == 'Greengrocer') {
                        echo "selected"; unset($_SESSION['productData']);
                    } ?> >Greengrocer</option>

                    <option value = "Fishmonger" <?php if (isset($_SESSION['productData']) && $_SESSION['productData'] == 'Fishmonger') {
                        echo "selected"; unset($_SESSION['productData']);
                    } ?> >Fishmonger</option>

                    <option value = "Bakery" <?php if (isset($_SESSION['productData']) && $_SESSION['productData'] == 'Bakery') {
                        echo "selected"; unset($_SESSION['productData']);
                    } ?> >Bakery</option>

                    <option value = "Delicatessen" <?php if (isset($_SESSION['productData']) && $_SESSION['productData'] == 'Delicatessen') {
                        echo "selected"; unset($_SESSION['productData']);
                    } ?> >Delicatessen</option>
                </select>

                <select name="shop" id="shop-dropdown">
                    <option selected disabled>Shop Name</option>
                    <option value= "Sanjay Mart" <?php if (isset($_SESSION['shopData']) && $_SESSION['shopData'] == 'Sanjay Mart') {
                        echo "selected"; unset($_SESSION['shopData']);
                    } ?> >Sanjay Mart</option>

                    <option value= "Green4U" <?php if (isset($_SESSION['shopData']) && $_SESSION['shopData'] == 'Green4U') {
                        echo "selected"; unset($_SESSION['shopData']);
                    } ?> >Green4U</option>

                    <option value= "FishBeats" <?php if (isset($_SESSION['shopData']) && $_SESSION['shopData'] == 'FishBeats') {
                        echo "selected"; unset($_SESSION['shopData']);
                    } ?> >FishBeats</option> 
                    
                    <option value= "BunsHun" <?php if (isset($_SESSION['shopData']) && $_SESSION['shopData'] == 'BunsHun') {
                        echo "selected"; unset($_SESSION['shopData']);
                    } ?> >BunsHun</option> 
                </select>

                <div class="price-filter">
                    <input type="number" placeholder="Min Price">
                    <input type="number" placeholder="Max Price">
                </div>

                <select class="rating-filter" name="rating" id="">
                    <option selected disabled>Rating</option>
                </select>

                <input type="submit" value="Submit" class="submit-btn" name="submit">

            </form>
        
        </div>

        <div class="products-showcase">
        
            <?php
                if (isset($_SESSION['searchbar'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product-type'])) {
                    $result = mysqli_query($connection, $_SESSION['product-type']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['shop'])) {
                    $result = mysqli_query($connection, $_SESSION['shop']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['searchbar_product'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_product']);
                    include 'productshowcase.php';
                
                }elseif (isset($_SESSION['searchbar_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_shop']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['product_shop']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['search_product_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['search_product_shop']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_error'])) {
                    echo $_SESSION['search_error'];
                    unset($_SESSION['search_error']);
                }elseif (isset($_SESSION['empty'])) {
                    echo $_SESSION['empty'];
                    unset($_SESSION['empty']);
                    include 'defaultproductshowcase.php';
                }
                else{
                    include 'defaultproductshowcase.php';
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