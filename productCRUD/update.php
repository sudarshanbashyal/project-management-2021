<?php
include '../init.php';
$product_id=$_GET['product_id'];
if($connection){
	if(isset($_POST['update_submit'])){
		if($_POST['product_name']!=null && $_POST['product_name']!=" "){
			
			$name=$_POST['product_name'];
		
		}else{
			$_SESSION['error']="name";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();

				}
		if($_POST['Description']!= null && $_POST['Description']!=" "){
			
			$description = $_POST['Description'];

		}else{
			$_SESSION['error']="description";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
		}
		if($_POST['price']!=null && $_POST['price']!=" "){
			
			$price=$_POST['price'];
			
		}else{
			$_SESSION['error']="price";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
		}
		if($_POST['stock']!=null && $_POST['stock']!=" "){
			$stock=$_POST['stock'];
		}else{
			$_SESSION['error']="stock";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
		}
		
		
		
		$allergy_info=$_POST['allergy_info'];
		$discount=$_POST['discount'];
		$shop=$_POST['shop'];
		$image=$_POST['image'];
		
		$minOrder=$_POST['minOrder'];
		$maxOrder=$_POST['maxOrder'];


		$sql="UPDATE product SET shop_id=$shop, product_name='$name',product_description='$description',min_order=$minOrder,max_order=$maxOrder,allergy_information='$allergy_info',stock=$stock,product_image='$image', discount=$discount,product_price=$price WHERE product_id=$product_id;";
		
		$query=mysqli_query($connection,$sql);
		if($query){
			$_SESSION['status']="successfull";
			header('location:'.$_SESSION['url']);
			unset($_SESSION['url']);
			exit();
		}else{
			echo "error updating.";
		}
		
		

	}
}


?>