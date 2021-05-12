<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php include 'adminheader1.php'; ?>
<div class="main">

		<?php
		$usermsg="";
		if((isset($_POST['cate_name']))){
			//to fetch data
			if($_POST['cate_name']!=""){
				$name= $_POST['cate_name'];
			}else{
				$name="";
			}
			
			include 'database.php'; 

			$target_dir = "uploadscat/";
			$target_file = $target_dir . basename($_FILES["cate_image"]["name"]);
			$uploadOk = 1;
			$fileuploaded=0;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    $uploadOk = 0;
			}
			if ($uploadOk == 1) {
    			if (move_uploaded_file($_FILES["cate_image"]["tmp_name"],       $target_file)) {
       		 		$fileuploaded=1;
    			} else {
       		 		$fileuploaded=0;
    			}
    		}
    		if($fileuploaded==1){
    			$catgoryimage=$target_file;
    		}
    		else{
    			$catgoryimage="";	
    		}
		 	//insert query
		 	 $sql = "INSERT INTO `category`(`cate_name`,`cate_img`) VALUES('" . $name . "','" . $catgoryimage . "')";
		    $query = mysqli_query($conn, $sql);
		    if($query){
		    	$usermsg="Category added successfully";
		    }else{
		    	$usermsg="Something went wrong";		    	
		    }
	
		    //close connection
	    	mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="container">
			<h2>Add Category</h2>
			<?php echo $usermsg;?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formdemo" id="addproductform" enctype="multipart/form-data">
				<div class="label">Category Name: </div>
				<input type="text" name="cate_name" required>
				<div class="label">Category Image: </div>				
				<input type="file" name="cate_image" required>
				<div>
					<input type="submit" class="btn" value="Add Category"/>
				</div>
			</form>
		</section>
	<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
</div>
	 <?php include("footer.php");?> 
	</body>
</html>