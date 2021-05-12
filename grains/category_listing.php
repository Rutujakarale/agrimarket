<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php include 'adminheader1.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Categories</h2>

		<?php
			include 'database.php'; 
			$sql = "SELECT cate_id, cate_name, cate_img FROM category";
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Sr No.</th>
						<th>Category</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td><?php echo $row["cate_name"]; ?></td>
						<td><img class="smallimg" src="<?php echo $row["cate_img"]; ?>"></td>
						<td>
							<div><a href="edit-category.php?category=<?php echo $row["cate_id"];?>" class="btn">Edit</a></div>
							<div><a href="deletecat.php?category=<?php echo $row["cate_id"];?>" class="btn">Delete</a></div>
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