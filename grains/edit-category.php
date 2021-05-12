<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php 
			include 'header.php'; 
			include 'database.php'; 
			$usermsg="";
			
			if(isset($_GET['category']) && ($_GET['category']!="")){
				$categoryid=$_GET['category'];
			}

			//get data
			$sql = "SELECT cate_name, cate_img FROM category WHERE cate_id='$categoryid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$categoryname=$row['cate_name'];
				$categoryimage=$row['cate_img'];
			}

			//update data
			if((isset($_POST['categoryname']))){
				if($_POST['categoryname']!=""){
					$name= $_POST['categoryname'];
				}else{
					$name="";
				}

				if($_FILES["categoryimage"]["name"]!=""){
					//new image

					$target_dir = "uploadscat/";
					$target_file = $target_dir . basename($_FILES["categoryimage"]["name"]);
					$uploadOk = 1;
					$fileuploaded=0;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    		$uploadOk = 0;
					}
					if ($uploadOk == 1) {
    					if (move_uploaded_file($_FILES["categoryimage"]["tmp_name"], $target_file)) {
       		 				$fileuploaded=1;
    					} else {
       		 				$fileuploaded=0;
    					}
    				}
    				$newcatimage=$target_file;
				}else{
					$newcatimage=$categoryimage;
				}
			 	//update data
				$sql = "UPDATE category SET cate_name='$name',cate_img='$newcatimage' WHERE cate_id=$categoryid";
			    $query = mysqli_query($conn, $sql);
			    header("Location: category_listing.php");
	
		    	//close connection
	    		mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
		 <div class="addproduct">
			<h2>Edit Category</h2>
			<?php echo $usermsg;?>
			<form action="" method="post" class="formdemo" id="editproductform" enctype="multipart/form-data">
				<div class="label">Category Name: </div>
				<input type="text" name="categoryname" value="<?php echo $categoryname; ?>" required>
				<div class="imagoutrblock">
					<img class="smallimg" src="<?php echo $categoryimage; ?>">
					<div class="changeimageblock">
						<div class="label">Change Category Image: </div>
						<input type="file" name="categoryimage" >
					</div>
				</div>
				<div>
					<input type="submit" class="submitbtn" value="Edit Category"/>
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