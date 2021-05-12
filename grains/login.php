<!DOCTYPE html>
<head>
<title>Agrimarket.com</title>
	 <link rel="stylesheet" type="text/css" href="css/style1.css">
	 <?php include("header.php");
	       include("database.php");?>
</head>
 <body>
	    <?php
		$usermsg="";
		if((isset($_POST['cust_username']))){
			//to fetch data
			if($_POST['cust_username']!=""){
				$username= $_POST['cust_username'];
			}else{
				$username="";
			}
			if($_POST['cust_password']!=""){
				$password= $_POST['cust_password'];
			}else{
				$password="";
			}
		 	$sql = "SELECT * FROM customer WHERE cust_username = '" . $username . "' AND cust_password = '" . $password . "' ";

		    $query = mysqli_query($conn, $sql);
		    if($query->num_rows==1)
		    {
		        $row = mysqli_fetch_assoc($query);
		        $_SESSION['login'] = true;
		        $_SESSION['session_cust_id'] = $row['cust_id'];
		        $_SESSION['session_cust_username'] = $row['cust_username'];
		        header("Location:index.php");
		    }else{
		    	$usermsg="Enter Correct Username and Password";		    	
		    }
	
		    //close connection
	    	mysqli_close($conn);

		}

           ?>
			
			
			  <center><h2>Login For Customer</h2></center>
				<center>		
				
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="container">
	<div class="label">login username:</div>
	<input type="text" name="cust_username" required>
	<div class="label">login password:</div><br>
	<input type="text" name="cust_password" required><br>
    <button type="submit" value="sign in" class="btn"><b>Login</b></button>
	  </form>
	  </center>
	   <?php include("footer.php");?> 
		</body>
			</html>
