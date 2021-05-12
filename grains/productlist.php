<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php 
			include 'header.php';
			include 'database.php';
			if(isset($_GET['action']) && $_GET['action']=="add"){
				$id=intval($_GET['id']);
				if(isset($_SESSION['cart'][$id])){
					$_SESSION['cart'][$id]['quantity']++;
					header('location:my-cart.php');
				}else{
					$sql="SELECT * FROM product WHERE prod_id=$id";
					$result=mysqli_query($conn,$sql);
					if($result->num_rows>0){
						while($row = mysqli_fetch_assoc($result)) {
							$_SESSION['cart'][$row['prod_id']]=array(
								"quantity" => 1,
								"price" => $row['prod_price']);

						}
						header('location:my-cart.php');
					}else{
						$message="Product ID is invalid";
					}
				}
			}


			if(isset($_GET['category']) && ($_GET['category']!="")){
				$categoryid=$_GET['category'];
			}
			//get category details
			$sql = "SELECT cate_name, cate_img FROM category WHERE cate_id='$categoryid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$categoryname=$row['cate_name'];
				$categoryimage=$row['cate_img'];
			}

			// get product details

			$sql = "SELECT prod_id, prod_name,prod_desc,prod_price,prod_image,prod_stock FROM product WHERE cate_id='$categoryid'";
			$productresults = mysqli_query($conn,$sql);

			?> 
<div class="main">
		<div class="page-content" id="productspage">	
		<h2><?php echo $categoryname;?></h2>
		<?php if($productresults->num_rows>0){ ?>	
		<div class="prow">
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($productresults)) {
					?>
					<div class="pcolumn">
						<a href="product-details.php?product=<?php echo $row['prod_id'];?>"><img src="<?php echo $row["prod_image"]; ?>"></a>
						<h2><a href="product-details.php?product=<?php echo $row['prod_id'];?>"><?php echo $row["prod_name"]; ?></a></h2>
						<div class="productprice">Rs. <?php echo $row["prod_price"]; ?></div>
						<a href="productlist.php?page=product&action=add&id=<?php echo $row['prod_id']; ?>">
						<button class="btn btn-primary" type="button">Add to cart</button></a>
					</div>
					<?php
				}
				

		?>
	</div>
<?php } else { echo "<h2>No products found in this category...</h2>";} ?>
		</div>
</div>
<?php include 'footer.php';?>
		
	</body>
</html>