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

		$sql="INSERT INTO shop(shop_name,user_id) VALUES ('$shop_name',$user_id);";
		$query=mysqli_query($connection,$sql);

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
?>