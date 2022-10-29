<?php
session_start();
require('inc/db_config.php'); 
require('inc/essentials.php'); 

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM manager_cred WHERE verify_token='$token' LIMIT 1";
    $verify_query_run= mysqli_query($con, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0)
    {
        $row = mysqli_fetch_array( $verify_query_run);
        //echo $row['verify_token']
        if($row['verify_status']=="0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE manager_cred SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1 ";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run)
            {
                echo "<script>if(confirm('Your Account has been verified..!!')){document.location.href='../admin/index.php'};</script>";

            }
            else
            {
                echo "<script>if(confirm('Verification Failed..!!')){document.location.href='../admin/index.php'};</script>";

            }
        }
        else
        {
            echo "<script>if(confirm('Email Already Verified. Please Login')){document.location.href='../admin/index.php'};</script>";
        }
        
    }

}
else
{
    echo "<script>if(confirm('This token does not exist!!')){document.location.href='../admin/index.php'};</script>";

}



 ?>