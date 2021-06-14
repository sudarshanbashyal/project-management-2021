<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="traderStats.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <title>Your Stats</title>
</head>
<body>

    <?php

        include '../navbar/navbar.php';
        include '../init.php';
    
    ?>

    <div class="container">

        <div class="shop-container">

            <h2 class="container-title">Your Shops...</h2>

            <table>
                <thead>
                    <tr>
                        <td># Shop id</td>
                        <td>Shop Name</td>
                        <td>Shop Orders</td>
                        <td>Shop Products</td>
                        <td>Edit</td>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    
                        $shopQuery = "
                        SELECT 
                        s.shop_id, s.shop_name, COUNT(p.product_id) products_no, COUNT(od.order_id) orders_no
                        FROM shop s
                        INNER JOIN users u ON s.user_id = u.user_id
                        LEFT OUTER JOIN product p ON p.shop_id=s.shop_id
                        LEFT OUTER JOIN order_details od ON od.product_id = p.product_id 
                        WHERE u.user_id = $_SESSION[userId]
                        GROUP BY s.shop_id;
                        ";

                        $shopQueryResult = mysqli_query($connection, $shopQuery);

                        if($shopQueryResult){
    
                            foreach($shopQueryResult as $shop){

                                echo "<tr>";
                                echo "<td>$shop[shop_id]</td>";
                                echo "<td>$shop[shop_name]</td>";
                                echo "<td>$shop[orders_no]</td>";
                                echo "<td>$shop[products_no]</td>";
                                echo "<td>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M1.438 16.873l-1.438 7.127 7.127-1.437 16.874-16.872-5.69-5.69-16.873 16.872zm1.12 4.572l.722-3.584 2.86 2.861-3.582.723zm18.613-15.755l-13.617 13.617-2.86-2.861 13.617-13.617 2.86 2.861z'/></svg>
                                    </td>";
                                echo "</tr>";

                            }
                        }
                    
                    ?>
                </tbody>
            </table>

            <svg class="add-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>

        </div>


        <div class="product-container">
            <h2 class="container-title">Your Products...</h2>

            <table>
                <thead>
                    <tr>
                        <td>
                            # Product ID
                        </td>
                        <td>Product Name</td>
                        <td>Shop Name</td>
                        <td>Product Price</td>
                        <td>Product Stock</td>
                        <td>Edit</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                        $productsQuery = "
                            SELECT p.product_id, p.product_name, s.shop_name, p.product_price, p.stock
                            FROM product p
                            LEFT OUTER JOIN shop s ON p.shop_id=s.shop_id
                            LEFT OUTER JOIN users u ON u.user_id = s.user_id
                            WHERE u.user_id = $_SESSION[userId];
                        ";
                        $productsQueryResult = mysqli_query($connection, $productsQuery);

                        
                        if($productsQueryResult){
    
                            foreach($productsQueryResult as $product){

                                echo "<tr>";
                                echo "<td>$product[product_id]</td>";
                                echo "<td>$product[product_name]</td>";
                                echo "<td>$product[shop_name]</td>";
                                echo "<td>$product[product_price]</td>";
                                echo "<td>$product[stock]</td>";
                                echo "<td>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M1.438 16.873l-1.438 7.127 7.127-1.437 16.874-16.872-5.69-5.69-16.873 16.872zm1.12 4.572l.722-3.584 2.86 2.861-3.582.723zm18.613-15.755l-13.617 13.617-2.86-2.861 13.617-13.617 2.86 2.861z'/></svg>
                                    </td>";
                                echo "</tr>";

                            }
                        }
                    
                    ?>

                </tbody>
            </table>

            <svg class="add-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
        </div>
        
    </div>

    <?php
    
        include '../footer/footer.php';
    
    ?>


    <script src="../navbar/navbar.js"></script>
    
</body>
</html>