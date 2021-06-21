<?php

    include '../init.php';
    
    $collectionTime= $collectionDay = '';
    $slotId;
    $orderId;
    $cartId;
    $couponCode=isset($_GET['discount_coupon'])?$_GET['discount_coupon']:null;
    $couponId='NULL';

    if(!isset($_SESSION['userId'])){
        header('Location: ../login/customerLogin.php');
        return;
    }

    // no time date selected
    if(isset($_GET['collection_time']) && isset($_GET['collection_day'])){
        $collectionTime=$_GET['collection_time'];
        $collectionDay=$_GET['collection_day'];
        unset($_SESSION['orderError']);
    }
    else{
        $_SESSION['orderError']='You must select collection time and day.';
        header('Location: ./cart.php');
        return;
    }

    // cart items over 20
    if(sizeof($_SESSION['currentCart'])>20){
        $_SESSION['orderError']='You cannot orer over 20 items at once.';
        header('Location: ./cart.php');
        return;
    }

    // get cart id
    $cartQuery = "
        SELECT cart_id FROM cart c
        INNER JOIN users u ON u.user_id = c.user_id
        WHERE u.user_id=$_SESSION[userId];
    ";
    $cartQueryResult=mysqli_query($connection, $cartQuery);
    if($cartQueryResult){
        foreach($cartQueryResult as $cart){
            $cartId = $cart['cart_id'];
        }
    }

    // get coupon id
    $couponQuery = "
        SELECT coupon_id FROM coupon WHERE coupon_code = '$couponCode';
    ";
    $couponQueryResult = mysqli_query($connection, $couponQuery);
    if($couponQueryResult){
        foreach($couponQueryResult as $coupon){
            $couponId = $coupon['coupon_id'];
        }
    }

    // collection slot Query
    $collectionQuery = "
    INSERT INTO collection_slot(collection_day, collection_time)
    VALUES('$collectionDay', '$collectionTime');
    ";

    $collectionQueryResult = mysqli_query($connection, $collectionQuery);
    if($collectionQuery){

        $slotQuery = "SELECT * FROM collection_slot ORDER BY slot_id DESC LIMIT 1;";
        $slotQueryResult = mysqli_query($connection, $slotQuery);

        if($slotQueryResult){
            
            foreach($slotQueryResult as $slot){
                $slotId = $slot['slot_id'];
            }

            // insert into order after retrieving the slot id
            $orderQuery = "
                INSERT INTO orders(order_date, slot_id, cart_id, coupon_id)
                VALUES(NOW(), $slotId, $cartId, $couponId);
            ";

            $orderQueryResult = mysqli_query($connection, $orderQuery);
            if($orderQueryResult){

                $orderIdQuery = "SELECT order_id from orders ORDER BY order_id DESC LIMIT 1;";
                $orderIdQueryResult = mysqli_query($connection, $orderIdQuery);

                if($orderIdQueryResult){

                    foreach($orderIdQueryResult as $order){
                        $orderId = $order['order_id'];
                        echo $orderId;
                    }

                    // select all products from cart details and insert them into order details
                    $cartDetailsQuery = "
                        SELECT product_id, product_quantity
                        FROM cart_details cd
                        INNER JOIN cart c ON c.cart_id = c.cart_id
                        WHERE c.cart_id=$cartId;
                    ";

                    $cartDetailsQueryResult = mysqli_query($connection, $cartDetailsQuery);
                    if($cartDetailsQueryResult){
                        foreach($cartDetailsQueryResult as $cartDetails){

                            // get the product_id and product_quantity
                            $productId = $cartDetails['product_id'];
                            $productQuantity = $cartDetails['product_quantity'];

                            // insert into order details
                            $orderDetailsQuery = "
                                INSERT INTO order_details(order_id, product_id, product_quantity)
                                VALUES($orderId, $productId, $productQuantity);
                            ";
                            mysqli_query($connection, $orderDetailsQuery);

                            // update product stock
                            $updateStockQuery = "
                                UPDATE product 
                                SET stock=stock-$productQuantity
                                WHERE product_id=$productId;
                            ";
                            mysqli_query($connection, $updateStockQuery);

                        }

                        // delete from cart details
                        $deleteCartDetailsQuery = "
                            DELETE from cart_details where cart_id=$cartId;
                        ";
                        mysqli_query($connection, $deleteCartDetailsQuery);

                        // redirect to order
                        header('Location: ../orderDetails/orderDetails.php');
                    }

                }
                
            }

        }

    }


?>