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
			
			if(isset($_GET['customer']) && ($_GET['customer']!="")){
				$custid=$_GET['customer'];
			}

			//get data
			$sql = "SELECT cust_name, cust_email, cust_contact FROM customer WHERE cust_id='$custid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$username=$row['cust_name'];
				$usermail=$row['cust_email'];
				$usercontact=$row['cust_contact'];
			}

			//update data
			if((isset($_POST['cust_name']))){
				if($_POST['cust_name']!=""){
					$name= $_POST['cust_name'];
				}else{
					$name="";
				}
				if($_POST['cust_email']!=""){
					$email= $_POST['cust_email'];
				}else{
					$email="";
				}
				if($_POST['cust_conatct']!=""){
					$contact= $_POST['cust_conatct'];
				}else{
					$contact="";
				}

				$sql = "UPDATE customer SET cust_name='$name',	cust_email='$email',cust_contact='$contact' WHERE cust_id=$custid";
			    $query = mysqli_query($conn, $sql);
			    header("Location: custlisting.php");
	
		    	//close connection
	    		mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
		 <div class="addproduct">
			<h2>Edit Customer</h2>
			<?php echo $usermsg;?>

			<form action="" method="post" class="formdemo" id="editproductform" >
				<div class="label">Name: </div>
				<input type="text" name="cust_name" value="<?php echo $username; ?>" required>
				<div class="label">Email: </div>
				<input type="email" name="cust_email" value="<?php echo $usermail; ?>" required>
				<div class="label">Contact No: </div>
				<input type="text" name="cust_conatct" value="<?php echo $usercontact;?>" required>
				<div>
					<input type="submit" class="submitbtn" value="Edit Customer"/>
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