<?php
require('inc/db_config.php'); 
require('inc/essentials.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
// require 'vendor/autoload.php';
session_start();
ob_start();

function sendemail_verify($name,$email,$verify_token,$passs)
{
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'hoteloswald6@gmail.com';                     //SMTP username
    $mail->Password   = 'fywmiiyckrlrtegf';                               //SMTP password
    $mail->SMTPSecure = 'tls';                                //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hoteloswald6@gmail.com', $name);
    $mail->addAddress($email);              

    $mail->isHTML(true);                                  
    $mail->Subject = 'Email Verification from Oswald';
    $email_template="
    <h2>You have Registered with Hotel Oswald</h2>
    <h5>Verify your email address to Login with the below given link</h5>
    <h5> Your password is : ".$passs."</h5>
    <br/><br/>
    <a href='http://localhost/Hotel3/admin1/verify-email.php?token=$verify_token'> Click Me </a>";
    $mail->Body = $email_template;
    $mail->send();
    //echo 'Message has been sent';


}
if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["number"]) && isset($_POST["address"]) )
{

   $email=$_POST["email"];
   $name= $_POST["name"];
   $number= $_POST["number"];
   $address= $_POST["address"];
   $pass=$_POST["password"];
   $manager_pass= md5($_POST["password"]);
   $role=$_POST["role"];
   $verify_token=md5(rand());
   sendemail_verify("$name","$email","$verify_token","$pass");
   
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
    
        $result =mysqli_query($con,"INSERT INTO `manager_cred`(`sr_no`, `email`, `name`, `number`, `address`, `manager_pass`, `role`,`verify_token`, `status`, `lg_status`) VALUES (DEFAULT,'$email','$name',' $number','$address','$manager_pass','MG','$verify_token',1,'$role')");
  

        echo "<script>if(confirm('Registration Success!!')){document.location.href='mreg.php'};</script>";
      
    }
    else
    {
        echo "<script>if(confirm('Upto 2 Managers can only be registered....!!!')){document.location.href='mreg.php'};</script>";
    }    
    }          
}

require('inc/scripts.php')  


 ?>