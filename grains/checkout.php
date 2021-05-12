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
              
		<div class="page-content" id="checkoutpage">	
           <center>   
<div class="main">
			
			<?php


			if((isset($_POST['cust_id'])))
		       {
			//to fetch data

			if($_POST['cust_id']!="")
			 {
				$custid= $_POST['cust_id'];
		 	 }
			if($_POST['shipping_address']!="")
 			{
				$shippingaddress= $_POST['shipping_address'];
			}
			if($_POST['paymentmethod']!=""){
				$paymentmethod= $_POST['paymentmethod'];
			}
			if($_POST['order_total']!="")
			{
				$ordertotal= $_POST['order_total'];				
			}
		    $order_date = date("Y-m-d_H-i-s");
		    $order_status = "In Progress";


		 	//insert query
		 	$sql = "INSERT INTO `order_details`(`cust_id`,`order_total`,`order_payment_method`,`shipping_address`,`order_date`,`order_status`) VALUES('" . $custid . "','" . $ordertotal . "','" . $paymentmethod . "','" . $shippingaddress . "','" . $order_date . "','".$order_status."')";
		    $query = mysqli_query($conn, $sql);

	    if($query)
 		     {
		    	$orderid= mysqli_insert_id($conn);
				foreach($_SESSION['cart'] as $key => $value){
					$prid=$key;
					$quantity=$value['quantity'];
				 	$sql1 = "INSERT INTO `order_product`(`order_id`,`prod_id`,`prod_quantity`) VALUES('" . $orderid . "','" . $prid . "','" . $quantity . "')";
				    $query1 = mysqli_query($conn, $sql1);
				}
				unset($_SESSION['cart']);
				header('location:my-cart.php');
			}else{
		    	$usermsg="Something went wrong";		    	
		    }
		    //close connection
	    	mysqli_close($conn); 
		}
			if(isset($_SESSION['login']) && ($_SESSION['login']==true)){
			$currentuserid=$_SESSION['session_cust_id'];
			//get details of loggedin user
			$sql = "SELECT cust_name, cust_email, cust_contact FROM customer WHERE cust_id='$currentuserid'";
			
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$username=$row['cust_name'];
				$usermail=$row['cust_email'];
				$usercontact=$row['cust_contact'];
			}
            
			if(isset($_POST['ordersubmit']) && $_POST['ordersubmit']=="ordersubmit"){
			if(!empty($_SESSION['cart'])){ ?>
				<form method="post" action="" id="checkoutform">
				<div class="Shipping_block">
					<h3>Order Details</h3>
					<hr>
					<div class="label">Name: </div>
					<input type="text" name="customer_name" value="<?php echo $username;?>" readonly>
					<div class="label">Email: </div>
					<input type="email" name="customer_email" value="<?php echo $usermail; ?>" readonly>
					<div class="label">Contact No: </div>
					<input type="text" name="customer_mobile" value="<?php echo $usercontact; ?>"   readonly>
					<div class="label">Shipping Address: </div>
					<textarea name="shipping_address" rows="3" required></textarea>
					<div class="label">Payment Details: </div>
					<input type="radio" name="paymentmethod" value="cod" checked>Cash On Delivery
				</div>
				<div class="products_block">
					<h3>Your Order</h3>
					<hr>
					<table class="carttable" border="1">
					<thead>
						<tr>
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
							$productname=$row['prod_name'];
							$productprice=$row['prod_price'];
							$productqty=$_SESSION['cart'] [$productid]['quantity'];
						?>

						<tr>
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
							<td colspan="4">
								<strong>Grant Total : <?php echo $totalprice;?></strong>
							</td>
						</tr>
					</tfoot>
				</table>
				</div>
				<div  class="checkoutbtn">
					<input type="hidden" name="cust_id" value="<?php echo $currentuserid; ?>">
					<input type="hidden" name="order_total" value="<?php echo $totalprice;?>">
					<input type="submit" class="submitbtn" value="Place Order Now"/>
				</div>
</center>
			</form>
			<?php } else {
			echo "<h2>Your order is succesful !!</h2>";
		}
	}else{
			echo "<h2>  Your shopping cart is empty!!</h2>";		
	}
}else{
			echo "<h2>Please Login first !!</h2>";		

}
		?>
</div>

		</div>
<?php include 'footer.php';?>
		
	</body>
</html>