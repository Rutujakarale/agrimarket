<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
			<?php 
			include 'database.php';
			include 'adminheader1.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ 			 
			$sql = "SELECT cust_id, cust_name, cust_email,cust_contact,cust_addr,reg_on FROM customer";
			$result = mysqli_query($conn,$sql);
             
			if ($result->num_rows > 0) {
				?>
				<h2>Customers</h2>
				<table border="1" class="productlisting">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Contact No.</th>
						<th>Address</th>
						<th>Registered On</th>
						<th>Action</th>
					</tr>
				<?php
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["cust_name"]; ?></td>
						<td><?php echo $row["cust_email"]; ?></td>
						<td><?php echo $row["cust_contact"]; ?></td>
						<td><?php echo $row["cust_addr"];?></td>
						<td><?php echo $row["reg_on"]; ?></td>
						<td>
							<div><a href="edit-customer.php?customer=<?php echo $row["cust_id"];?>" class="btn">Edit</a></div>
							<div><a href="delete-customer.php?customer=<?php echo $row["cust_id"];?>" class="btn">Delete</a></div>
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
             include'footer.php';
			 }else{
		      echo "<h1>You don't have rights to access this page..</h1>";
	      } 
       ?>
	</body>
</html>