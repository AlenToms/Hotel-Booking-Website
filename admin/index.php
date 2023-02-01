<?php
  require('inc/essentials.php');
  require('inc/db_config.php');

  session_start();
  if((isset($_SESSION['managerLogin']) && $_SESSION['managerLogin']==true)){
    redirect('dashboard.php');
  }
  else if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
    redirect('../admin1/index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Panel</title>
  <?php require('inc/links.php'); ?>
  <style>
    div.login-form{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      width: 400px;
    }
  </style>
</head>
<body class="bg-light">
  
  <div class="login-form text-center rounded bg-white shadow overflow-hidden">
    <form method="POST">
      <h4 class="bg-dark text-white py-3">LOGIN PANEL</h4>
      <div class="p-4">
        <div class="mb-3">
          <input name="email" required type="text" class="form-control shadow-none text-center" placeholder="email">
        </div>
        <div class="mb-4">
          <input name="password" required type="password" class="form-control shadow-none text-center" placeholder="Password">
        </div>
        <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
      </div>
    </form>
  </div>


  <?php 
    
    if(isset($_POST['login']))
    {

      $email = mysqli_real_escape_string($con,$_POST['email']);  
      $password =md5( mysqli_real_escape_string($con,$_POST['password']));
      $sql = "SELECT * FROM `manager_cred` WHERE email='$email' AND `manager_pass`='$password'";
        
      $res = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($res);
      if($res->num_rows==1){

        if($row['role']=='MG'){
          if($row['status']==1)
          {
            if($row['verify_status']==1)
            {

           $_SESSION['managerLogin'] = true;
           $_SESSION['managerId'] = $row['sr_no'];
           redirect('dashboard.php');
            }
            else{
              alert('error','Login failed -First verify your account and try again!!!!');
             }
          }
           else{
            alert('error','Login failed - Account has been Deactivated');
           }
        }
        else if($row['role']=='ADMIN'){
          $_SESSION['adminLogin'] = true;
           $_SESSION['adminLogin'] = $row['sr_no'];
          redirect('../admin1/index.php');
       }
       else if($row['role']=='STAFF'){
        if($row['status']==1)
          {
        if($row['verify_status']==1)
            {
        $_SESSION['staffLogin'] = true;
           $_SESSION['staffLogin'] = $row['sr_no'];
           $_SESSION['email'] = $row['email'];
           $_SESSION['name'] = $row['name'];
           $_SESSION['sr_no'] =$row['sr_no'];
        redirect('../staff/index.php');
      }
    else{
      alert('error','Login failed - Please verify your account !');
    }
  }else{
    alert('error','Login failed - Account has been Deactivated');
  }
      }
      else{
        alert('error','Login failed - Invalid Credentials!');
      }
    }
  }
  
  ?>


  <?php require('inc/scripts.php') ?>
  
</body>
</html>