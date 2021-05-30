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

            <form action="GET">
            
                <div class="input-search">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z"/></svg>
                    <input type="text" placeholder="Search...">
                </div>

                <select name="" id="product-dropdown">
                    <option selected disabled>Product Type</option>
                    <option>Type 1</option>
                    <option>Type 2</option>
                    <option>Type 3</option>
                </select>

                <select name="" id="shop-dropdown">
                    <option selected disabled>Shop Name</option>
                    <option>Shop 1</option>
                    <option>Shop 2</option>
                    <option>Shop 3</option>
                </select>

                <input type="submit" value="Submit" class="submit-btn">

            </form>
        
        </div>

        <div class="products-showcase">
        
            <div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>


            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>


            </div>

            <div class="product">
                
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>

            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>


            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>


            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>

            </div>
        
        </div>
    
    </div>

    <?php
    
        include '../footer/footer.php';
    
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>