<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  managerLogin();
  $msg='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Panel - Staff</title>
  <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
<script src="https://unpkg.com/octavalidate@1.2.0/native/validate.js"></script>
  <script src="octaValidate/src/validate.js"></script>
  <?php require('inc/header.php'); 
  
 
  ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
     

        <div class='dashboard-app'>
        <header class='dashboard-toolbar'></header>
        <div class='dashboard-content'>
            <div class='container' style='padding-left : 300px;padding-top : 20px;'>
                
                   
            <div>
          <h2 style='color: #000000;' > Fill the form </h2>
          <?php echo $msg;?>
        </div>
        	<?php
					if(isset($_SESSION['status']))
					{
						echo "<h4 style='color:#cccc00;''>".$_SESSION['status']."</h4>";
						unset($_SESSION['status']);
					}
					?>
<form class="form-main overflow-auto" id="form1" action="code.php" method="post" name="form3">
<div class="form-group" style="padding: 5px;">
    <label>Name</label>
    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" octavalidate="R,ALPHA_SPACES">
  </div>
  <div class="form-group" style="padding: 10px;">
    <label>Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" octavalidate="R">
  </div>
  
  <div class="form-group" style="padding: 10px;" >
    <label>Phone</label>
    <input type="text" class="form-control" id="phone" name="number" minlength="10" maxlength="10" placeholder="Enter number" octavalidate="R,PHNUM,DIGITS">
  </div>
  <div class="form-group" style="padding: 10px;" >
    <label>Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" octavalidate="R,EMAIL">
  </div>
  <div class="form-group" style="padding: 10px;" >
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" octavalidate="R,PWD">
    <small id="emailHelp" class="form-text text-muted">Atleast 6 characters</small>
  </div>
  

 <div class="form-group" style="padding: 10px;" >
  <button type="submit" class="btn btn-primary" name="submit" style="background-color:#000000"> Register </button>
</div>
</form>
             
            </div>
        </div>
</div>
      </div>
    </div>




  <!-- Assign Room Number modal -->

  


  <?php require('inc/scripts.php'); ?>

  <script src="scripts/new_bookings.js"></script>
  <script>
const myForm = new octaValidate('form1');
//listen for submit event
myForm.customRule('PHNUM', '^[6-9][0-9]{9}$', 'Please Provide Valid 10 Digits');
document.getElementById('form1').addEventListener('submit', function(e){
    
    //invoke the method
    if(myForm.validate() === true)
    { 
      //validation successful, process form data here
    } else {
      //validation failed
      e.preventDefault();
      return false;
    }
})
</script> 
</body>
</html>