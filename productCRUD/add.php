<?php
include '../init.php';


if($connection){
	if(isset($_POST['product_submit'])){
		//storing product name
		if($_POST['product_name'] != null && $_POST['product_name'] != " "){
			$name=$_POST['product_name'];
		}else{
			$_SESSION['error']="name";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();

		}

		//storing product description
		if($_POST['description']!= null && $_POST['description']!= " "){
			$description = $_POST['description'];
		}else{

			$_SESSION['error']="description";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();

		}
		//storing product price
		if($_POST['price']!= null && $_POST['price']!=" "){
			$price = $_POST['price'];
		}else{
			$_SESSION['error']="price";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();

		}

            $discount =$_POST['discount'];
            $allergy_info =$_POST['allergy_info'];
            $image= $_POST['image'];
            $shop=$_POST['selection'];
            $minOrder=$_POST['minOrder'];
            $maxOrder=$_POST['maxOrder'];
            $stock=$_POST['stock'];

            $query= "INSERT INTO product(shop_id,product_name,product_description,min_order,max_order,allergy_information,stock,product_image,discount,product_price) VALUES('$shop','$name','$description',$minOrder,$maxOrder,'$allergy_info',$stock,'$image',$discount,$price);";
            
            $productQuery=mysqli_query($connection,$query);
		
		if($productQuery){
			$_SESSION['status']="successfull";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
			

		}else{
			echo "error adding product";
		}

	}
}


?>