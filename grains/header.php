<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
    <body>
    <?php
    session_start();
    ?>


   <section class="header1">
      <h2>Agrimarket.com</h2>
        
        

      </section>
      <div class="topnav">
           <a class="active" href="index.php"><b>Home</b></a>
           <a href="abtpage.php"><b>About Us</b></a>
         <a href="product.php"><b>Products</b></a>
         <a href="contact.php"><b>Contact</b></a>
                  <?php if(isset($_SESSION['login']) && $_SESSION['login']==true){ ?>
                             <a href="logout.php"><b>Logout</b></a>

                  <?php }else{ ?>
           <a href="reg.php"><b>Register</b></a>
           <a href="login.php"><b>Login</b></a>
           <?php } ?>
      </div>
  </header>

</body>
</html>
