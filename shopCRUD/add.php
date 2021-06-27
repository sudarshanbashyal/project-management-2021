<?php
include '../init.php';
$user_id=$_SESSION['userId'];

if($connection){
	if(isset($_POST['submit'])){

		if(empty($_POST['shop_name'])){
			$_SESSION['error']="name";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
		}else{
			$shop_name=$_POST['shop_name'];
		}

        $shopNumberQuery = "SELECT COUNT(shop_id) number_of_shops FROM HAMROMART.shop WHERE user_id=$_SESSION[userId]";
        $shopNumberQueryResult = oci_parse($connection, $shopNumberQuery);
        oci_execute($shopNumberQueryResult);

        if($shopNumberQueryResult){
            $numberOfShops=0;

            while($shopNumber = oci_fetch_assoc($shopNumberQueryResult)){
                $numberOfShops=(int)$shopNumber['NUMBER_OF_SHOPS'];
            }

            if($numberOfShops>=10){
                echo "yes no more shops";
                $_SESSION['shopLimitError']="You have reached the maximum limit of 10 shops.";
                header('Location: ./addShop.php');
            }
            else{
                $sql="INSERT INTO HAMROMART.shop(shop_name,user_id) VALUES ('$shop_name',$user_id)";
                $query=oci_parse($connection,$sql);
                oci_execute($query);

                if($query){
                	$_SESSION['status']="success";
                	header('location:'.$_SESSION['url']);
                	unset($_SESSION['url']);
                	exit();
                }else{
                	$_SESSION['status']="fail";
                	header('location:'.$_SESSION['url']);
                	unset($_SESSION['url']);
                	exit();
                }
            }
        }

		
	}
}
?>