<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php include 'adminheader1.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Orders</h2>

		<?php
			include 'database.php'; 
		    // fetch data
			//$sql = "SELECT produc_id, product_title, product_desc,product_image,product_stock,product_price FROM products";
			$sql = "SELECT order_id,cust_id, order_total, order_payment_method,shipping_address,order_date,order_status FROM order_details";
			
			$result = mysqli_query($conn,$sql);

			//var_dump($result);

			//display data
			if ($result->num_rows > 0) {
				// output data of each row
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Order_id </th>
						<th>Cust_id</th>
						<th>Order_total</th>
						<th>Order_payment_method</th>
						<th>Shipping_address</th>
						<th>Order_date</th>
						<th>Order_status</th>
					</tr>
				<?php
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row["cust_id"]; ?></td>
						<td><?php echo $row["order_total"]; ?></td>
						<td><?php echo $row["order_payment_method"]; ?></td>
						<td><?php echo $row["shipping_address"]; ?></td>
						<td><?php echo $row["order_date"]; ?></td>
						<td><?php echo $row["order_status"]; ?></td>
					</tr>
					<?php
				}
				?>
				</table>
				<?php
			} else {
			echo "No data found";
			}

		?>
		</div>
			<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>

	</body>
</html>


		