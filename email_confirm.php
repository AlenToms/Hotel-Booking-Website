<?php

  require('admin/inc/db_config.php');
  require('admin/inc/essentials.php');
  $token="";
  if(isset($_GET['token']))
  {
    $data = filteration($_GET);
    $tok= $data['token'];
    $query=mysqli_query($con,"SELECT * FROM `user_cred` WHERE `token`='$tok' LIMIT 1");

    if(mysqli_num_rows($query)>0)
    {
      $fetch = mysqli_fetch_assoc($query);

      if($fetch['is_verified']==1){
        echo"<script>alert('Email already verified!')</script>";
      }
      else{
        $update = update("UPDATE `user_cred` SET `is_verified`= ? WHERE `id`=?",[1,$fetch['id']],'ii');
        if($update){
          echo"<script>alert('Email verification successful!')</script>";
        }
        else{
          echo"<script>alert('Email verification failed! Server Down!')</script>";
        }
      }
      redirect('index.php');
    }
    else{
      echo"<script>alert('Invalid Link!')</script>";
      redirect('index.php');
    }
  }

?>