<?php
require('inc/db_config.php'); 
require('inc/essentials.php'); 
session_start();
ob_start();


if(isset($_POST["submit"]))
{

   $from=$_POST["date1"];
   $to= $_POST["date2"];
   $name= $_SESSION['name'];
   $email= $_SESSION['email'];
   $staff_id= $_SESSION['sr_no'];
   $desc=$_POST["desc"];
   $reason= $_POST["reason"];
   
        $result =mysqli_query($con,"INSERT INTO `leave_tbl`(`id`, `Name`, `staff_id`, `email`, `Reason`,`desc`, `from`, `to`,`status`) VALUES ('DEFAULT','$name',' $staff_id','$email',' $reason','$desc','$from=','$to','1')");
  
        if ($result){
        echo "<script>if(confirm('Leave Applied Successfully')){document.location.href='mreg.php'};</script>";
      
    }
    else
    {
        echo "<script>if(confirm('Something went wrong!!!')){document.location.href='mreg.php'};</script>";
    }    
    
}
require('inc/scripts.php')  


 ?>