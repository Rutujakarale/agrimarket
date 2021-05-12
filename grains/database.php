
<?php
//connect to database
    $servername="localhost";
    $username="root";
    $password="";

    //create connection
    $conn=new mysqli($servername,$username,$password);

    //check connection

    if($conn->connect_error)
    {
      die("connection failed:".$conn->connect_error);
    }


    //select db
    mysqli_select_db($conn,"grains");

    date_default_timezone_set("Asia/kolkata");
?>