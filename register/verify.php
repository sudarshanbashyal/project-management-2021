<?php
	include '../init.php';
	if (isset($_GET['key'])) {
		$email = $_GET['key'];
		$query = "SELECT user_email, verified, user_role FROM users WHERE user_email = '$email' && verified = 'FALSE' && user_role = 'Customer'";
		$checkemail = mysqli_query($connection, $query);
		if ($checkemail-> num_rows != 0) {
			$update = "UPDATE users SET verified = 'TRUE' WHERE user_email = '$email'";
			$checkUpdate = mysqli_query($connection, $update);
			if ($checkUpdate) {
				$_SESSION['successful_update'] = '<h3>Your "Customer" account has been verified. You may login</h3>';
				header("location:../login/customerLogin.php");
			}else{
				$_SESSION['register_error'] = "<h3>Error, fault in query.</h3>";
				header("location:customerRegister.php");
			}

		}else{
			$_SESSION['register_error'] = "<h3>Error, your account has already been verified.</h3>";
			header("location:../login/customerLogin.php");
		}
	}else{
		$_SESSION['register_error'] = "<h3>You do not have a key</h3>";
		header("location:customerRegister.php");
	}
?>