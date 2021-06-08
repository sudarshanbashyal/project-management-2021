<?php
include '../init.php';


if($connection){
	if(isset($_POST['product_submit'])){
		//storing product name
		if($_POST['product_name'] != null && $_POST['product_name'] != " "){
			$name=$_POST['product_name'];
		}else{
			echo "please enter the name of the product";
		}

		//storing product description
		if($_POST['description']!= null && $_POST['description']!= " "){
			$description = $_POST['description'];
		}else{

			echo "please enter the product description";
		}
		//storing product price
		if($_POST['price']!= null && $_POST['price']!=" "){
			$price = $_POST['price'];
		}else{
			echo "please enter the price of the product";
		}
            $discount =$_POST['discount'];
            $allergy_info =$_POST['allergy_info'];
            $image= $_POST['image'];
            $shop=null;

            $query= "INSERT INTO product(shop_id,product_name,product_description,allergy_information,product_image,discount,product_price) VALUES('$shop','$name','$description','$allergy_info','$image',$discount,$price);";
            echo "$query";
            $productQuery=mysqli_query($connection,$query);
		if($productQuery){
			echo "product added successfully.";
		}else{
			echo "error adding product";
		}

	}
}


?>