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
                    <?php
                        $traderQuery = "SELECT category_type FROM trader_category";
                        $traderResult = mysqli_query($connection, $traderQuery);

                        foreach ($traderResult as $key) {
                            $value = $key['category_type'];
                            if (isset($_SESSION['productData']) && $_SESSION['productData'] == $value){
                                echo "<option value = $value selected )>$value</option>";
                            }else{
                                echo "<option value = $value>$value</option>";
                                }                            
                        }
                        unset($_SESSION['productData']);
                    ?>

                </select>

                <select name="shop" id="shop-dropdown">
                    <option selected disabled>Shop Name</option>

                    <?php
                        $shopQuery = "SELECT shop_name FROM shop";
                        $shopResult = mysqli_query($connection, $shopQuery);

                        foreach ($shopResult as $key) {
                            $value = $key['shop_name'];
                            if (isset($_SESSION['shopData']) && $_SESSION['shopData'] == $value ) {
                                echo "<option value = $value selected>$value</option>";
                            }else{
                                echo "<option value = $value>$value</option>";
                            }
                            
                        }
                        unset($_SESSION['shopData']);
                    ?>
                </select>

                <div class="price-filter">
                     <input type="number" name="min_num" placeholder="Min Price" min="0" value="<?php 
                        if(isset($_SESSION['minData'])){echo $_SESSION['minData']; unset($_SESSION['minData']);} ?>">
                    <input type="number" name="max_num" placeholder="Max Price" min="0" value="<?php 
                        if(isset($_SESSION['maxData'])){ echo $_SESSION['maxData']; unset($_SESSION['maxData']);} ?>">
                </div>

                <select class="rating-filter" name="rating" id="">
                    <option selected disabled>Rating</option>
                    <option value="1" <?php if (isset($_SESSION['rateData']) && $_SESSION['rateData'] == '1') {
                        echo "selected"; unset($_SESSION['rateData']);
                    } ?> >1</option>
                    <option value="2" <?php if (isset($_SESSION['rateData']) && $_SESSION['rateData'] == '2') {
                        echo "selected"; unset($_SESSION['rateData']);
                    } ?> >2</option>
                    <option value="3" <?php if (isset($_SESSION['rateData']) && $_SESSION['rateData'] == '3') {
                        echo "selected"; unset($_SESSION['rateData']);
                    } ?> >3</option>
                    <option value="4" <?php if (isset($_SESSION['rateData']) && $_SESSION['rateData'] == '4') {
                        echo "selected"; unset($_SESSION['rateData']);
                    } ?> >4</option>
                    <option value="5" <?php if (isset($_SESSION['rateData']) && $_SESSION['rateData'] == '5') {
                        echo "selected"; unset($_SESSION['rateData']);
                    } ?> >5</option>

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
                    
                }elseif (isset($_SESSION['min_num'])) {
                    $result = mysqli_query($connection, $_SESSION['min_num']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['max_num'])) {
                    $result = mysqli_query($connection, $_SESSION['max_num']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['rating'])) {
                    $result = mysqli_query($connection, $_SESSION['rating']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['searchbar_product'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_product']);
                    include 'productshowcase.php';
                
                }elseif (isset($_SESSION['searchbar_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_shop']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['searchbar_min'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_min']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['searchbar_max'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_max']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['searchbar_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['searchbar_rate']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['product_shop']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product_min'])) {
                    $result = mysqli_query($connection, $_SESSION['product_min']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product_max'])) {
                    $result = mysqli_query($connection, $_SESSION['product_max']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['product_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['product_rate']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['shop_min'])) {
                    $result = mysqli_query($connection, $_SESSION['shop_min']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['shop_max'])) {
                    $result = mysqli_query($connection, $_SESSION['shop_max']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['shop_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['shop_rate']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['min_max'])) {
                    $result = mysqli_query($connection, $_SESSION['min_max']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['min_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['min_rate']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['max_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['max_rate']);
                    include 'productshowcase.php';

                }elseif (isset($_SESSION['search_product_shop'])) {
                    $result = mysqli_query($connection, $_SESSION['search_product_shop']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_product_min'])) {
                    $result = mysqli_query($connection, $_SESSION['search_product_min']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_product_max'])) {
                    $result = mysqli_query($connection, $_SESSION['search_product_max']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_product_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['search_product_rate']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_min_max'])) {
                    $result = mysqli_query($connection, $_SESSION['search_min_max']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_min_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['search_min_rate']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['search_max_rate'])) {
                    $result = mysqli_query($connection, $_SESSION['search_max_rate']);
                    include 'productshowcase.php';
                    
                }elseif (isset($_SESSION['query'])) {
                    $result = mysqli_query($connection, $_SESSION['query']);
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