<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
    <body>
    <?php
    session_start();
    ?>


   <section class="header1">
      <h2>Agrimarket.com</h2>
      
     
   </section>
    
      <div class="topnav">
  <?php 
   if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
           <a class="active" href="index.php"><b>Home</b></a>
           <a href="admindashboard.php"><b>Dashboard</b></a>
         <a href="add-product.php"><b>Add Products</b></a>
         <a href="add_cat.php"><b>Add Category</b></a>
          <a href="custlisting.php"><b>customer</b></a>
          <a href="category_listing.php"><b> Category</b></a>
             <a href="product_listing.php"><b>Products</b></a>
               <a href="manage-orders.php"><b>Order</b></a>
        <a href="adminlogout.php"><b>Logout</b></a>

                  
          
              <?php }?>
                  
            
      </div>
  
   
</body>
</html>
