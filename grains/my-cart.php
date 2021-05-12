<!DOCTYPE html>
	<head>
		<title>My Cart</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<?php 
		include 'header.php';
		include 'database.php';
		?> 
		<div class="page-content" id="cartpage">	
			<center>
<h2>My Cart</h2>

			<?php 
			if(!empty($_SESSION['cart'])){ ?>
				<form method="post" action="checkout.php">
				<table class="carttable" border="1">
					<thead>
						<tr>
							<th class="cart-description item">Image</th>
							<th class="cart-product-name item">Product Name</th>
							<th class="cart-sub-total item">Price</th>
							<th class="cart-qty item">Quantity</th>
							<th class="cart-total last-item">Sub Total</th>
						</tr>
					</thead>
					<tbody>
 					<?php
 					$idarr=array();
 					$totalprice=0;
					foreach($_SESSION['cart'] as $key => $value){
						$totalprice+=($value['price']*$value['quantity']);
						$idarr[]=$key;
					}
					$idstring=implode(',',$idarr);

    				$sql = "SELECT * FROM product WHERE prod_id IN($idstring)";
					$result = mysqli_query($conn,$sql);
					if(!empty($result)){
						while($row = mysqli_fetch_assoc($result)) {
							$productid=$row['prod_id'];
							$productimg=$row['prod_image'];
							$productname=$row['prod_name'];
							$productprice=$row['prod_price'];
							$productqty=$_SESSION['cart'] [$productid]['quantity'];
						?>

						<tr>
							<td class="cart-image">
									<img class="smallimg" src="<?php echo $productimg; ?>">
							</td>
							<td class="cart-product-name-info">
								<h3 class="name"><?php echo $row['prod_name']; ?></h3>
							</td>
							<td class="cart-product-price">
								<div class="prod_price">Rs.<?php echo $productprice; ?></div>
		            		</td>
							<td class="cart-product-quantity">
								<div class="prod_qty"><?php echo $productqty;?></div>
		            		</td>
							<td class="cart-product-subtotal">
								<div class="prod_price_subtotal">Rs. <?php echo $productprice*$productqty; ?></div>
		            		</td>
						</tr>

					<?php 	
						}
				 	}
					?>					
					</tbody><!-- /tbody -->
					<tfoot>
						<tr>
							<td colspan="3">
								<strong>Grant Total : <?php echo $totalprice;?></strong>
							</td>
							<td colspan="2">
								<button type="submit" name="ordersubmit" value="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
							</td>
						</tr>
					</tfoot>
				</table>
                      </center>
			</form>
			<?php } else {
			echo "<h2>Your shopping Cart is empty !!</h2>";
		}?>


		</div><?php include 'footer.php';?>
		
	</body>
</html>