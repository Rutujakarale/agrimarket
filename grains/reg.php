<!DOCTYPE html>
<html>
<head><title>Agrimarket.com</title>
 <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
<?php
  include 'header.php';
  include 'database.php';
?>
<?php
  $usermsg="";
    if((isset($_POST['cust_name'])))
  {
    if($_POST['cust_name']!="")
    {
      $name=$_POST['cust_name'];
    }else{
      $name="";
    }
    if($_POST['cust_email']!="")
    {
      $email=$_POST['cust_email'];

        }
        else
      {
       $email="";
     
      }
      if ($_POST['cust_addr']!="")
     {
      $addr=$_POST['cust_addr'];

     }
     else
    {
      $addr="";
      }
    
     if($_POST['cust_contact']!="")
    {
      $contact=$_POST['cust_contact'];

    }else
    {
      $contact="";
    }
   
  if($_POST['cust_username']!="")
    {
      $username=$_POST['cust_username'];

    }
    else
    {
      $username="";
     

    }
  
    if($_POST['cust_password']!="")
    {
      $password=$_POST['cust_password'];

    }else
    {
      $password="";
     

    }
  
  $current_date_time = date("Y-m-d_H-i-s");

  $sql="INSERT INTO `customer`(`cust_name`,`cust_email`,`cust_contact`,`cust_addr`,`cust_username`,`cust_password`,`reg_on`)VALUES('".$name."','".$email."','".$contact."','".$addr."','".$username."','".$password."','".$current_date_time."')";
  $query=mysqli_query($conn,$sql);
  mysqli_close($conn) ;
    }
   ?>


        <center>    
            <h1>Register</h1>

    <?php 
    if($usermsg!="")
    {
      echo $usermsg;
    }
    ?>
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="container">
     <hr>
    
  <label for="name"><b>Name</b></label><br>
    <input type="text" placeholder="Enter Name" name="cust_name" required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="cust_email" required><br>

   <label for="Contact"><b>Contact</b></label><br>
      <input type="text" placeholder="Enter contact no" name="cust_contact" required><br>

      <div>
        <label for="address"><b>Address</b></label><br>
        <textarea name="cust_addr" required></textarea>
      </div>

     <label for="username"><b>Username</b></label><br>
    <input type="username" placeholder="Enter Username" name="cust_username" required><br><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="cust_password" required><br><br>
    <div>
    <button type="submit" class="btn">Register</button>
  </div>
  </center>
</form>
</body>
 <?php include("footer.php");?> 
</html>