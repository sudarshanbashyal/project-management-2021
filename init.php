<?php
    error_reporting(0);
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_management";

    $connection = mysqli_connect($hostname, $username, $password, $dbname);
    
    session_start();
    $_SESSION['userId']=1;
    $_SESSION['userRole']='trader';
    // $_SESSION['currentCart']=array();
    // $_SESSION['currentCart']=array();

    if(isset($_SESSION['userId'])&&(isset($_SESSION['userRole'])&&$_SESSION['userRole']=='customer')){
        $_SESSION['currentCart']=array();
        $cartQuery = "
            SELECT p.product_id, cd.product_quantity FROM product p
            INNER JOIN cart_details cd ON cd.product_id = p.product_id
            INNER JOIN cart c ON c.cart_id=cd.cart_id
            INNER JOIN users u ON u.user_id=c.user_id
            WHERE u.user_id=$_SESSION[userId];
        ";

        $cartQueryResult = mysqli_query($connection, $cartQuery);
        if($cartQueryResult){
            foreach($cartQueryResult as $cart){
                if(isset($_SESSION['currentCart'])){
                    array_push($_SESSION['currentCart'],array($cart['product_id']=>$cart['product_quantity']));
                }
                else{
                    $_SESSION['currentCart']=array();
                    array_push($_SESSION['currentCart'],array($cart['product_id']=>$cart['product_quantity']));
                }
            }

        }
    }

?>