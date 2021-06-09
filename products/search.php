<?php
	include '../init.php';

	if (isset($_GET['submit'])) {

		if (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop'])) {
			
				$_SESSION['empty'] = '<h3>You left all the search fields empty. Please fill in the fields for a better result.</h3>';
				header("Location:products.php");
			

		}elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop'])) {
			$search = $_GET['searchbar'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, shop, users WHERE product.shop_id = shop.shop_id && shop.user_id = users.user_id && product.product_name LIKE '%$search%'";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;


			if ($result-> num_rows !=0) {
				$_SESSION['searchbar'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" found.</h3>';
				header("Location:products.php");
			}

		}elseif(empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop'])){
			$productType = $_GET['product-type'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, users, shop, trader_category WHERE product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType'";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;

			if ($result-> num_rows !=0) {
				$_SESSION['product-type'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! Product type yet to be added.</h3>';
				header("Location:products.php");
			}
		}

		elseif(empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop'])){
			$shop = $_GET['shop'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product p, shop s, users u WHERE p.shop_id = s.shop_id && s.shop_name = '$shop' && s.user_id = u.user_id ";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;

			if ($result-> num_rows !=0) {
				$_SESSION['shop'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! Shop yet to be added.</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  empty($_GET['shop'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, users, shop, trader_category WHERE product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%'";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;

			if ($result-> num_rows !=0) {
				$_SESSION['searchbar_product'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" and trader category "'.$productType.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product p, shop s, users u WHERE p.shop_id = s.shop_id && s.shop_name = '$shop' && s.user_id = u.user_id && p.product_name like '%$search%'";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;

			if ($result-> num_rows !=0) {
				$_SESSION['searchbar_shop'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" and shop name "'.$shop.'"  found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  !empty($_GET['shop'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, users, shop, trader_category WHERE product.shop_id = shop.shop_id && shop.shop_name = '$shop' && shop.user_id = users.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType';";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;

			if ($result-> num_rows !=0) {
				$_SESSION['product_shop'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for product type "'.$productType.'" and shop "'.$shop.'"</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  !empty($_GET['shop'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, users, shop, trader_category WHERE product.shop_id = shop.shop_id && shop.shop_name = '$shop' && shop.user_id = users.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%'";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_shop'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" and trader category "'.$productType.'" found.</h3>';
				header("Location:products.php");
			}

		}


		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop'])) {
			// unset($_SESSION['searchbar']);
			header("Location:products.php");
		}
		
	}else{
		echo "it is not set";
	}
?>