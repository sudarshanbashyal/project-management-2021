<?php
	include '../init.php';

	if (isset($_GET['submit'])) {

		if (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			
				$_SESSION['empty'] = '<h3>You left all the search fields empty. Please fill in the fields for a better result.</h3>';
				header("Location:products.php");			
		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name LIKE '%$search%'";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;


			if ($result-> num_rows !=0) {
				$_SESSION['searchbar'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif(empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])){
			$productType = $_GET['product-type'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType'";
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

		elseif(empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])){
			$shop = $_GET['shop'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.shop_name = '$shop' && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id ";
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

		elseif(empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating']) ){
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['min_num'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No product found.</h3>';
				header("Location:products.php");
			}
		}

		elseif(empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating']) ){
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['max_num'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No product found.</h3>';
				header("Location:products.php");
			}
		}

		elseif(empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating']) ){
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['max_num'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No product found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating']) ) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id  && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%'";
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

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.shop_name = '$shop' && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%'";
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

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['searchbar_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" with a minimum price of "'.$min.'"  found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['searchbar_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" with a maximum price of "'.$max.'"  found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['searchbar_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'" and a rating of "'.$rate.'" stars found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop'";
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

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['product_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for product type "'.$productType.'" with a minimum price of "'.$min.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['product_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for product type "'.$productType.'" with a maximum price of "'.$max.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) &&  empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['product_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for product type "'.$productType.'" with a rating star of "'.$rate.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['shop_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for Shop "'.$shop.'" with a minimum price of "'.$min.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['shop_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for Shop "'.$shop.'" with a maximum price of "'.$max.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['shop_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for Shop "'.$shop.'" with a rating star of "'.$rate.'"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price >= $min && product.product_price <=$max";
			$result = mysqli_query($connection, $query);
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['min_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products in this price range"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) &&  empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['min_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for in that price range"</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['max_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for in that price range"</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && shop.shop_name = '$shop'";
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

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", trader category "'.$productType.'" with minimum product price '.$min.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", trader category "'.$productType.'" with maximum product price '.$min.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", trader category "'.$productType.'" with rating star '.$rate.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_min'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" with minimum price '.$min.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" with maximum price '.$max.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['search_product_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" with rating star '.$rate.' found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name LIKE '%$search%' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['search_min_max'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products in this price range"</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name LIKE '%$search%' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['search_min_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", minimum price "'.$min.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name LIKE '%$search%' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['search_max_rate'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with trader category "'.$productType.'", shop name "'.$shop.'" and minimum price "'.$min.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with trader category "'.$productType.'", shop name "'.$shop.'" and maximum price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with trader category "'.$productType.'", shop name "'.$shop.'" and maximum price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with trader category "'.$productType.'", shop name "'.$shop.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products in this price range for product type "'.$productType.'"</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", minimum price "'.$min.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products in this price range for shop "'.$shop.'" </h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for shop "'.$shop.'", with minimum price "'.$min.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products for shop "'.$shop.'", with maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}elseif ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products with minimum price "'.$min.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}
		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && shop.shop_name = '$shop' && product.product_price >=$min";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" and trader category "'.$productType.'" and minimum product price "'.$min.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && shop.shop_name = '$shop' && product.product_price <=$max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" and trader category "'.$productType.'" and maximum product price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && shop.shop_name = '$shop' && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'" and trader category "'.$productType.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! There are no products in this price range"</h3>';
				header("Location:products.php");
			}


		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", minimum product price "'.$min.'", trader category "'.$productType.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name LIKE '%$search%' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", maximum product price "'.$min.'", trader category "'.$productType.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'", minimum price "'.$min.'" and maximum price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'", minimum price "'.$min.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_name LIKE '%$search%' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name LIKE '%$search%' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", minimum price "'.$min.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'" and maximum price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", shop name "'.$shop.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", minimum price "'.$min.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0 ";
			$result = mysqli_query($connection, $query);
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again."</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with shop name "'.$shop.'", minimum price "'.$min.'", maximum price "'.$max.'" and rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again.</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'", maximum price "'.$max.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'", rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];			
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again.</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'", maximum price "'.$max.'", rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];			
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && product.product_name like '%$search%' && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again.</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", shop name "'.$shop.'", minimum price "'.$min.'", maximum price "'.$max.'", rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$max = $_GET['max_num'];			
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name like '%$search%' && shop.shop_name = '$shop' && product.product_price <= $max && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($result-> num_rows !=0) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", product type "'.$productType.'", shop name "'.$shop.'", maximum price "'.$max.'", rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}

		elseif (!empty($_GET['searchbar']) && !empty($_GET['product-type']) && !empty($_GET['shop']) && !empty($_GET['min_num']) && !empty($_GET['max_num']) && !empty($_GET['rating'])) {
			$search = $_GET['searchbar'];
			$productType = $_GET['product-type'];
			$shop = $_GET['shop'];
			$min = $_GET['min_num'];
			$max = $_GET['max_num'];			
			$rate = $_GET['rating'];
			$query = "SELECT product.product_id, product.product_name, product.product_price, product.product_image, product.stock, product.disabled, users.user_name, rating.rating_star FROM product, users, shop, trader_category, rating WHERE product.product_id = rating.product_id && product.shop_id = shop.shop_id && shop.user_id = users.user_id && users.user_id = rating.user_id && users.category_id = trader_category.category_id && trader_category.category_type = '$productType' && product.product_name like '%$search%' && shop.shop_name = '$shop' && product.product_price >= $min && product.product_price <= $max && rating.rating_star = $rate && product.disabled = 'FALSE' && product.stock > 0";
			$result = mysqli_query($connection, $query);
			$_SESSION['searchData'] = $search;
			$_SESSION['productData'] = $productType;
			$_SESSION['shopData'] = $shop;
			$_SESSION['minData'] = $min;
			$_SESSION['maxData'] = $max;
			$_SESSION['rateData'] = $rate;

			if ($max<$min) {
				$_SESSION['search_error'] = '<h3>Error! You have entered the wrong prices please try again.</h3>';
				header("Location:products.php");
			}
			elseif ($result-> num_rows !=0 && $min<=$max) {
				$_SESSION['query'] = $query;
				header("Location:products.php");
			}else{
				$_SESSION['search_error'] = '<h3>Error! No such product with product name "'.$search.'", product type "'.$productType.'", shop name "'.$shop.'", minimum price "'.$min.'", maximum price "'.$max.'", rating star "'.$rate.'" found.</h3>';
				header("Location:products.php");
			}

		}


		elseif (empty($_GET['searchbar']) && empty($_GET['product-type']) && empty($_GET['shop']) && empty($_GET['min_num']) && empty($_GET['max_num']) && empty($_GET['rating'])) {
			// unset($_SESSION['searchbar']);
			header("Location:products.php");
		}
		
	}else{
		echo "it is not set";
	}
?>