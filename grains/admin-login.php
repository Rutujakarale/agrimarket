<!DOCTYPE html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
	<?php
 	 include 'adminheader1.php';
  		?>
	
		<?php
		include 'database.php'; 
		$usermsg="";
		if((isset($_POST['admin_username']))){
			//to fetch data
			if($_POST['admin_username']!=""){
				$username= $_POST['admin_username'];
			}else{
				$username="";
			}
			if($_POST['admin_password']!=""){
				$password= $_POST['admin_password'];
			}else{
				$password="";
			}
		 	$sql = "SELECT * FROM admin WHERE admin_username = '" . $username . "' AND admin_password = '" . $password . "' ";

		    $query = mysqli_query($conn, $sql);
		    if($query->num_rows==1){
		        $row = mysqli_fetch_assoc($query);
		        $_SESSION['adminlogin'] = true;
		        $_SESSION['session_adminid'] = $row['admin_id'];
		        $_SESSION['session_admin_name'] = $row['admin_name'];
		        header("Location:admindashboard.php");
		    }else{
		    	$usermsg="Enter Correct Username and Password";		    	
		    }
	
		    //close connection
	    	mysqli_close($conn);

		}

		?>
		<section class="admin-login">
			<h2>Admin Login</h2>
			<?php
			if($usermsg!=""){ 
				echo '<h3 class="usermsg">'.$usermsg.'<h3>';
			}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="container" id="loginform">
				<div class="label">Username: </div>
				<input type="text" name="admin_username" required><br>
				<div class="label">Password: </div>
				<input type="password" name="admin_password" required><br>
				
					<input type="submit" class="btn" name="Sign In">
				
			</form>
		</section>
	 <?php include("footer.php");?> 
	</body>
</html>