<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="invoice.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <title>Your Orders</title>
</head>
<body>


    <?php

        include '../navbar/navbar.php';
        include '../init.php';

        $orderId = $_GET['order_id'];
        if(!$orderId || !$_SESSION['userId']){
            header('Location: ./orderDetails.php');
        }

        $customerName= $orderDate= $collectionSlot= '';
        $totalPrice=0;

        $detailsQuery = "
            SELECT 
            o.order_date, u.user_name, cs.collection_day, cs.collection_time
            FROM orders o
            INNER JOIN collection_slot cs ON o.slot_id=cs.slot_id
            INNER JOIN cart c ON c.cart_id = o.cart_id
            INNER JOIN users u ON u.user_id = c.user_id
            WHERE o.order_id = $orderId AND u.user_id=$_SESSION[userId];
        ";
        $detailsResult = mysqli_query($connection, $detailsQuery);
        if($detailsResult){
            foreach($detailsResult as $detail){

                $customerName = $detail['user_name'];
                $orderDate = $detail['order_date'];
                $collectionSlot = $detail['collection_day']." ".$detail['collection_time'];

            }
        }

    ?>


    <div class="invoice-container">

        <div class="invoice-header">

            <div class="header-logo">
                <img src="../images/logo-black.png" alt="">
            </div>

            <div class="header-date">
                Date Issued: 2021-13-14
            </div>

        </div>

        <div class="invoice-details">
            <h3>Order ID: <?php echo $orderId; ?></h3>
            <h3>Customer Name: <?php echo $customerName; ?></h3>
            <h3>Collection Slot: <?php echo $collectionSlot; ?></h3>
        </div>

        <div class="order-details">

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                        $orderQuery = "
                        SELECT 
                        od.product_quantity, od.product_id, p.product_price, p.product_name, p.discount
                        FROM order_details od
                        INNER JOIN orders o ON o.order_id = od.order_id
                        INNER JOIN product p ON p.product_id = od.product_id
                        WHERE o.order_id=$orderId;
                        ";

                        $orderQueryResult = mysqli_query($connection, $orderQuery);
                        if($orderQueryResult){


                            foreach($orderQueryResult as $orderDetail){

                                $calculatedPrice = ($orderDetail['product_price']-(($orderDetail['discount']/100)*$orderDetail['product_price']))*$orderDetail['product_quantity'];
                                $totalPrice+=$calculatedPrice;

                                echo "<tr>";

                                echo "<td>
                                    $orderDetail[product_name]
                                </td>";

                                echo "<td>
                                    &pound; $orderDetail[product_price]
                                </td>";

                                echo "<td>
                                    $orderDetail[product_quantity]
                                </td>";

                                echo "<td>
                                    $orderDetail[discount]
                                </td>";

                                echo "<td class='total-price'>
                                    &pound; $calculatedPrice
                                </td>";

                                echo "</tr>";
                            }
                        }
                    
                    ?>
                </tbody>

            </table>

        </div>

        <div class="order-summary">
            <h3>Coupon Discount: 0</h3>
            <h2>Total: &pound; <?php echo $totalPrice; ?></h2>
        </div>

    </div>

    <?php
        
        include '../footer/footer.php';

    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>