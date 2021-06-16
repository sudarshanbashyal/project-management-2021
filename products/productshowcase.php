<?php
	if (isset($_SESSION['searchbar'])) {
		unset($_SESSION['searchbar']);
	}elseif (isset($_SESSION['product-type'])) {
		unset($_SESSION['product-type']);
	}elseif (isset($_SESSION['shop'])) {
		unset($_SESSION['shop']);
	}elseif (isset($_SESSION['min_num'])) {
		unset($_SESSION['min_num']);
	}elseif (isset($_SESSION['max_num'])) {
		unset($_SESSION['max_num']);
	}elseif (isset($_SESSION['rating'])) {
		unset($_SESSION['rating']);
	}elseif (isset($_SESSION['searchbar_product'])) {
		unset($_SESSION['searchbar_product']);
	}elseif (isset($_SESSION['searchbar_shop'])) {
		unset($_SESSION['searchbar_shop']);
	}elseif (isset($_SESSION['searchbar_min'])) {
		unset($_SESSION['searchbar_min']);
	}elseif (isset($_SESSION['searchbar_max'])) {
		unset($_SESSION['searchbar_max']);
	}elseif (isset($_SESSION['searchbar_rate'])) {
		unset($_SESSION['searchbar_rate']);
	}elseif (isset($_SESSION['product_shop'])) {
		unset($_SESSION['product_shop']);
	}elseif (isset($_SESSION['product_min'])) {
		unset($_SESSION['product_min']);
	}elseif (isset($_SESSION['product_max'])) {
		unset($_SESSION['product_max']);
	}elseif (isset($_SESSION['product_rate'])) {
		unset($_SESSION['product_rate']);
	}elseif (isset($_SESSION['shop_min'])) {
		unset($_SESSION['shop_min']);
	}elseif (isset($_SESSION['shop_max'])) {
		unset($_SESSION['shop_max']);
	}elseif (isset($_SESSION['shop_rate'])) {
		unset($_SESSION['shop_rate']);
	}elseif (isset($_SESSION['min_max'])) {
		unset($_SESSION['min_max']);
	}elseif (isset($_SESSION['min_rate'])) {
		unset($_SESSION['min_rate']);
	}elseif (isset($_SESSION['max_rate'])) {
		unset($_SESSION['max_rate']);
	}elseif (isset($_SESSION['search_product_shop'])) {
		unset($_SESSION['search_product_shop']);
	}elseif (isset($_SESSION['search_product_min'])) {
		unset($_SESSION['search_product_min']);
	}elseif (isset($_SESSION['search_product_max'])) {
		unset($_SESSION['search_product_max']);
	}elseif (isset($_SESSION['search_product_rate'])) {
		unset($_SESSION['search_product_rate']);
	}elseif (isset($_SESSION['search_min_max'])) {
		unset($_SESSION['search_min_max']);
	}elseif (isset($_SESSION['search_min_rate'])) {
		unset($_SESSION['search_min_rate']);
	}elseif (isset($_SESSION['search_max_rate'])) {
		unset($_SESSION['search_max_rate']);
	}elseif (isset($_SESSION['query'])) {
		unset($_SESSION['query']);
	}

    foreach ($result as $key) {
    	   if ($key['stock'] > 0 && $key['disabled'] == 'FALSE') {
				$pid = $key['product_id'];
				$rateQuery = "SELECT rating_star FROM rating WHERE product_id = '$pid'";
				$rquery = mysqli_query($connection, $rateQuery);
				$rate = 0;
				$counter = 0;
				while ($row = mysqli_fetch_assoc($rquery)) {
					$rate = $rate + $row['rating_star'];
					$counter++;
				}
				$finalRate = $rate/$counter;
				

	    		echo "<div class='product'>";
				echo "<div class='product-image'>";
				echo '<a href="..\productDetails\productDetails.php?productId='.$key['product_id'].'"><img src="'.$key['product_image'].'" alt='.$key['product_name'].'></a>';
				echo "</div>";

				echo "<div class='product-description'>";
				echo '<p>Rating: '.round($finalRate,1).' <p>';

			    echo '<a><p class="product-name" style="color:black; text-decoration:none;">'.$key['product_name'].'</p>';
				echo '<p class="product-price">&pound; '.$key['product_price'].'</p></a>';
				echo "</div>";

				echo "<div class='trader'>";
				echo '<div class="trader-name">'.$key['user_name'].'</div>';
				echo "</div>";

				echo "<svg class='cart-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z'/></svg>";
				echo "</div>";
			}
		
	}

?>


<!-- 	WHILE LOOP INSTEAD OF FOR EACH. 
		while ($row = mysqli_fetch_assoc($result)) {
 		if ($row['stock'] > 0 && $row['disabled'] == 'FALSE') {
 			echo "<div class='product'>";
			echo "<div class='product-image'>";
			echo '<img src="'.$row['product_image'].'" alt='.$row['product_name'].'>';
			echo "</div>";

			echo "<div class='product-description'>";
	 	    echo '<p class="product-name">'.$row['product_name'].'</p>';
			echo '<p class="product-price">Rs. '.$row['product_price'].'</p>';
	 		echo "</div>";

	 		echo "<div class='trader'>";
	 		echo '<div class="trader-name">'.$row['user_name'].'</div>';
	 		echo "</div>";

	 		echo "<svg class='cart-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z'/></svg>";
	 		echo "</div>";
 		}
  	}
 -->
<!--  ORIGINAL DIV OF PRODUCT FOR REFERENCE.
<div class="product">
                <div class="product-image">
                    <img src="https://www.farmersalmanac.com/wp-content/uploads/2020/11/cabbage-health-benefits-AdobeStock_173509538.jpeg" alt="">
                </div>

                <div class="product-description">
                    <p class="product-name">Fresh Cabbage</p>
                    <p class="product-price">Rs. 200</p>
                </div>

                <div class="trader">
                    <div class="trader-name">Fresh Veggies Trader</div>
                </div>

                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>


</div> -->