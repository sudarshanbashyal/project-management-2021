<?php
	
	$query = "SELECT product_id, product_name, product_price, product_image, stock, disabled, user_name FROM product, shop, users WHERE product.shop_id = shop.shop_id && shop.user_id = users.user_id";
	$result = mysqli_query($connection, $query);
	if ($result-> num_rows !=0) {
		foreach ($result as $key) {
			if ($key['stock'] > 0 && $key['disabled'] == 'FALSE') {
	    		echo "<div class='product'>";
				echo "<div class='product-image'>";
				echo '<a href="..\productDetails\productDetails.php?productId='.$key['product_id'].'"><img src="'.$key['product_image'].'" alt='.$key['product_name'].'></a>';
				echo "</div>";

				echo "<div class='product-description'>";
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
    }
       else{
		echo "Error loading products";
	}
?>
