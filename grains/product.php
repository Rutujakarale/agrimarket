<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php 
			include 'header.php';
			include 'database.php';
			?> 
         <div class="main">
		<div class="page-content" id="productspage">	
		<h2>Products</h2>

		<div class="prow">
		<?php

			 
			$sql = "SELECT cate_id, cate_name, cate_img FROM category";
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
				?>
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<div class="pcolumn">
                              <div class="smalling">
                                   <img src="<?php echo $row["cate_img"]; ?>">
                                    </div>
						<h2><?php echo $row["cate_name"]; ?></h2>
						<a href="productlist.php?category=<?php echo $row["cate_id"];?>">
                                     <button class="btn btn-primary" type="button">View Products</button></a>
					</div>
                                   
					<?php
				}
				?>
				<?php
			} else {
			echo "No data found";
			}

		?>
	</div>
		</div>
     </div>
            <?php include 'footer.php';?>		
	</body>
</html>