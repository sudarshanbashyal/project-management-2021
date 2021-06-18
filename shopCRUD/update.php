<?php
include '../init.php';
$shop_id=$_GET['shop_id'];
if($connection){
if(isset($_POST['submit'])){
	if(empty($_POST['shop_name'])){
		$_SESSION['error']="name";
		header('location:'.$_SESSION['url']);
		unset($_SESSION['url']);
		exit();
	}
	else{
		$shop_name=$_POST['shop_name'];
	}

	$sql="UPDATE shop SET shop_name='$shop_name' WHERE shop_id=$shop_id;";
	$query=mysqli_query($connection,$sql);

	if($query){
		$_SESSION['status']="success";
		header('location:'.$_SESSION['url']);
		exit();
	}
	else{
		$_SESSION['status']="fail";
		header('location:'.$_SESSION['url']);
		exit();

	}

}
}


?>