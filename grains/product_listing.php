<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php include 'adminheader1.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Products</h2>

		<?php
			include 'database.php'; 
		    // fetch data
			//$sql = "SELECT product_id, product_title, product_desc,product_image,product_stock,product_price FROM products";
			$sql = "SELECT prod_id,cate_name, prod_name, prod_desc,prod_image,prod_stock,prod_price FROM product,category WHERE product.cate_id=category.cate_id";
			
			$result = mysqli_query($conn,$sql);

			//var_dump($result);

			//display data
			if ($result->num_rows > 0) {
				// output data of each row
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Title</th>
						<th>Category</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Image</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				<?php
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["prod_name"]; ?></td>
						<td><?php echo $row["cate_name"]; ?></td>
						<td><?php echo $row["prod_price"]; ?></td>
						<td><?php echo $row["prod_stock"]; ?></td>
						<td><img class="smallimg" src="<?php echo $row["prod_image"]; ?>"></td>
						<td><?php echo $row["prod_desc"]; ?></td>
						<td>
							<div><a href="edit-product.php?product=<?php echo $row["prod_id"];?>" class="btn">Edit</a></div>
							<div><a href="delete-product.php?product=<?php echo $row["prod_id"];?>" class="btn">Delete</a></div>
						</td>
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