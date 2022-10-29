<?php
require('inc/db_config.php'); 
require('inc/essentials.php');


   $email=$_POST["email"];
   $name= $_POST["name"];
   $number= $_POST["number"];
   $address= $_POST["address"];
   $manager_pass= md5($_POST["password"]);
   $role=$_POST["role"];
   
$check_email_query="SELECT email FROM manager_cred WHERE email='$email' LIMIT 1";
$check_email_query_run=mysqli_query($con,$check_email_query);


if(mysqli_num_rows($check_email_query_run)>0)
{
  echo "<script>if(confirm('Email Already Exist!!')){document.location.href='mreg.php'};</script>";
  
}

else
{
    $login=mysqli_query($con,"select * from manager_cred where role='MG' ");
    $count=mysqli_num_rows($login);
    if ($count < 2){
    
        $result =mysqli_query($con,"INSERT INTO `manager_cred`(`sr_no`, `email`, `name`, `number`, `address`, `manager_pass`, `role`, `status`, `lg_status`) VALUES (DEFAULT,'$email','$name',' $number','$address','$manager_pass','MG',1,'$role')");
  

        echo "<script>if(confirm('Registration Success!!')){document.location.href='mreg.php'};</script>";
      
    }
    else
    {
        echo "<script>if(confirm('Upto 2 Managers can only be registered....!!!')){document.location.href='mreg.php'};</script>";
    }    
    }          


require('inc/scripts.php')  

 ?>