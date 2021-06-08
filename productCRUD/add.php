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
            $shop=$_POST['selection'];
            $minOrder=$_POST['minOrder'];
            $maxOrder=$_POST['maxOrder'];
            $stock=$_POST['stock'];

            $query= "INSERT INTO product(shop_id,product_name,product_description,min_order,max_order,allergy_information,stock,product_image,discount,product_price) VALUES('$shop','$name','$description',$minOrder,$maxOrder,'$allergy_info',$stock,'$image',$discount,$price);";
            
            $productQuery=mysqli_query($connection,$query);
		
		if($productQuery){
			echo "product added successfully.</br>";
			echo '<a href="'.'addProduct.php'.'">'.'go back'.'</a>';

		}else{
			echo "error adding product";
		}

	}
}


?>