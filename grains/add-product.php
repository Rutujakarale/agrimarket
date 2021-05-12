<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php include 'adminheader1.php'; 

			include 'database.php'; 


			?>
<div class="main">
		<?php
		$usermsg="";
		if((isset($_POST['productname']))){
			//to fetch data
			if($_POST['productname']!=""){
				$name= $_POST['productname'];
			}else{
				$name="";
			}
			if($_POST['productprice']!=""){
				$price= $_POST['productprice'];
			}else{
				$price="";
			}
				if($_POST['productdescription']!=""){
				$desc= $_POST['productdescription'];
			}else{
				$desc="";
			}
			if($_POST['productstock']!=""){
				$stock= $_POST['productstock'];
			}else{
				$stock="";
			}
			if($_POST['productcategory']!=""){
				$productcategory=$_POST['productcategory'];
			}else{
				$productcategory="";
			}

			//connect to database
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["productimage"]["name"]);
			$uploadOk = 1;
			$fileuploaded=0;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    $uploadOk = 0;
			}
			if ($uploadOk == 1) {
    			if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)) {
       		 		$fileuploaded=1;
    			} else {
       		 		$fileuploaded=0;
    			}
    		}
    		if($fileuploaded==1){
    			$productimage=$target_file;
    		}
    		else{
    			$productimage="";	
    		}
		 	//insert query
		 	 $sql = "INSERT INTO `product`(`prod_name`,`prod_desc`,`prod_price`,`prod_image`,`prod_stock`,`cate_id`) VALUES('" . $name . "','" . $desc . "','" . $price . "','".$productimage."','".$stock."','".$productcategory."')";
		    $query = mysqli_query($conn, $sql);
		    if($query){
		    	$usermsg="Product added successfully";
		    }else{
		    	$usermsg="Something went wrong";		    	
		    }
	

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
		 <div class="addproduct">
			<h2>Add Product</h2>
			<?php echo $usermsg;?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formdemo" id="addproductform" enctype="multipart/form-data">
				<div class="label">Product Name: </div>
				<input type="text" name="productname" required>
				<div class="label">Product Category: </div>
				<select name="productcategory" required="">
					<option value="">Select Category</option>
					<?php
					$sql = "SELECT cate_id, cate_name FROM category";
					$result = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($result)) {
						echo '<option value="'.$row['cate_id'].'">'.$row['cate_name'].'</option>';
					}
				?>
				</select>
				<div class="label">Product Price: </div>
				<input type="text" name="productprice" required>
				<div class="label">Product Stock: </div>
				<input type="number" name="productstock" required>
				<div class="label">Product Description: </div>
				<textarea name="productdescription" rows="5" required></textarea>
				<div class="label">Product Image: </div>				
				<input type="file" name="productimage" required>
				<div>
					<input type="submit" class="submitbtn" value="Add Product"/>
				</div>
				</div>
			</form>
		</section>
	<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
	 </div>
 <?php include 'footer.php';?>
	</body>
</html>