<?php

include 'database.php'; 

if (isset($_GET['category']) && ($_GET['category'] != "")) {
    $deleterecord = $_GET['category'];

	$sql = "DELETE FROM `category` WHERE cate_id ='$deleterecord'";
	$query = mysqli_query($conn, $sql);
	header("Location: category_listing.php");
}

?>
