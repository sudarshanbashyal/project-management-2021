<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="cart.css">
</head>
<body>

    <?php

        include '../navbar/navbar.php';
    
    ?>

    <div class="cart-container">

        <div class="product-showcase">

            <div class="products">

                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <h2 class="product-name">
                        Fresh Homegrown Cabbage
                    </h2>

                    <label class="quantity-label">Quantity: </label>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <h3 class="product-price">
                        Rs. 400
                    </h3>

                    <svg class="trash-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>                </div>

            </div>

            <!--  -->

            <div class="products">

                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <h2 class="product-name">
                        Fresh Homegrown Cabbage
                    </h2>

                    <label class="quantity-label">Quantity: </label>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <h3 class="product-price">
                        Rs. 400
                    </h3>

                    <svg class="trash-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>                </div>

            </div>

            <!--  -->

            <div class="products">

                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <h2 class="product-name">
                        Fresh Homegrown Cabbage
                    </h2>

                    <label class="quantity-label">Quantity: </label>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <h3 class="product-price">
                        Rs. 400
                    </h3>

                    <svg class="trash-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>                </div>

            </div>

            <div class="cart-functionality-btn">
                <input class="update-cart-btn" type="submit" value="Update Cart">
                <input class="delete-cart-btn" type="submit" value="Delete Cart">
            </div>
            
        </div>

        <div class="checkout-showcase">

            <div class="checkout-products">

                <div class="products">
                    
                    <h3 class="product-name">
                        Fresh Homegrown Cabbage
                    </h3>

                    <p class="product-quantity">
                        x5
                    </p>

                    <h3 class="product-price">
                        Rs. 2000
                    </h3>
                
                </div>

                <!--  -->

                <div class="products">
                    
                    <h3 class="product-name">
                        Fresh Homegrown Cabbage
                    </h3>

                    <p class="product-quantity">
                        x5
                    </p>

                    <h3 class="product-price">
                        Rs. 2000
                    </h3>
                
                </div>

                <!--  -->

                <div class="products">
                    
                    <h3 class="product-name">
                        Fresh Homegrown Cabbage
                    </h3>

                    <p class="product-quantity">
                        x5
                    </p>

                    <h3 class="product-price">
                        Rs. 2000
                    </h3>
                
                </div>

                <!-- Total Price -->

                <h2 class="total-price">Total: Rs. 6000</h2>

            </div>

            <input class="discount-input" type="text" placeholder="Discount Coupon">
            <select class="collection-input" name="" id="">
                <option value="" selected disabled>Select a Collection Slot</option>
            </select>
        
            <button class="checkout-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 9.761c0 .536-.065 1.084-.169 1.627-.847 4.419-3.746 5.946-7.449 5.946h-.572c-.453 0-.838.334-.908.789l-.803 5.09c-.071.453-.456.787-.908.787h-2.736c-.39 0-.688-.348-.628-.732l1.386-8.88.062-.056h2.155c5.235 0 8.509-2.618 9.473-7.568.812.814 1.097 1.876 1.097 2.997zm-14.216 4.252c.116-.826.459-1.177 1.385-1.179l2.26-.002c4.574 0 7.198-2.09 8.023-6.39.8-4.134-2.102-6.442-6.031-6.442h-7.344c-.517 0-.958.382-1.038.901-2.304 14.835-2.97 18.607-3.038 19.758-.021.362.269.672.635.672h3.989l1.159-7.318z"/></svg>
                Proceed to Checkout
            </button>

        </div>

    </div>

    <?php
    
        include '../footer/footer.php';
    
    ?>
    

    <script src="../navbar/navbar.js"></script>

</body>
</html>