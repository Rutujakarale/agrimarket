<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php 
			include 'adminheader1.php'; 
			include 'database.php'; 
			$usermsg="";
			
			if(isset($_GET['product']) && ($_GET['product']!="")){
				$productid=$_GET['product'];
			}

			//get data
			$sql = "SELECT prod_name, prod_desc, prod_price,prod_image,prod_stock,cate_id FROM product WHERE prod_id='$productid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$producttitle=$row['prod_name'];
				$productdesc=$row['prod_desc'];
				$productprice=$row['prod_price'];
				$productimage=$row['prod_image'];
				$productstock=$row['prod_stock'];
				$categoryid=$row['cate_id'];
			}

			//update data
			if((isset($_POST['productname']))){
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

				if($_FILES["productimage"]["name"]!=""){
					//new image

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
    				$newproductimage=$target_file;


				}else{
					$newproductimage=$productimage;
				}
			 	//update data
				$sql = "UPDATE product SET prod_name='$name',prod_desc='$desc',prod_price='$price',prod_stock='$stock',prod_image='$newproductimage',cate_id='$productcategory' WHERE prod_id=$productid";
			    $query = mysqli_query($conn, $sql);
			    header("Location: product_listing.php");
	
		    	//close connection
	    		mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
		 <div class="addproduct">
			<h2>Edit Product</h2>
			<?php echo $usermsg;?>
			<form action="" method="post" class="formdemo" id="editproductform" enctype="multipart/form-data">
				<div class="label">Product Name: </div>
				<input type="text" name="productname" value="<?php echo $producttitle; ?>" required>
				<div class="label">Product Category: </div>
				<select name="productcategory" required="">
					<option value="">Select Category</option>
					<?php
					$sql = "SELECT cate_id, cate_name FROM category";
					$result = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($result)) {
						if($categoryid==$row['cate_id']){
							$selected="selected";
						}else{
							$selected="";
						}
						echo '<option value="'.$row['cate_id'].'" '.$selected.'>'.$row['cate_name'].'</option>';
					}
				?>
				</select>
				<div class="label">Product Price: </div>
				<input type="text" name="productprice" value="<?php echo $productprice; ?>" required>
				<div class="label">Product Stock: </div>
				<input type="number" name="productstock" value="<?php echo $productstock;?>" required>
				<div class="label">Product Description: </div>
				<textarea name="productdescription" rows="5" required><?php echo $productdesc; ?></textarea>
				<div class="imagoutrblock">
					<img class="smallimg" src="<?php echo $productimage; ?>">
					<div class="changeimageblock">
						<div class="label">Change Product Image: </div>
						<input type="file" name="productimage" >
					</div>
				</div>
				<div>
					<input type="submit" class="submitbtn" value="Edit Product"/>
				</div>
				</div>
			</form>
		</section>
					<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
 <?php include 'footer.php';?>
	</body>
</html>