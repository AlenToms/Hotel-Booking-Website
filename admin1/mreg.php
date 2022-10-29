<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  adminLogin();
  $msg= "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Oswald | Admin</title>
    
</head>

<body>
<script src="https://unpkg.com/octavalidate@1.2.0/native/validate.js"></script>
  <script src="octaValidate/src/validate.js"></script>
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
  <h3 class="mb-0 h-font">OSWALD</h3>
  <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
</div>
<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid flex-lg-column align-items-stretch">
      <h4 class="mt-2 text-light">Admin PANEL</h4>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#managerDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="managerDropdown">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks">
              <span>Managers</span>
              <span><i class="bi bi-caret-down-fill"></i></span>
            </button>
            <div class="collapse show px-3 small mb-1" id="bookingLinks">
              <ul class="nav nav-pills flex-column rounded border border-secondary">
                <li class="nav-item">
                  <a class="nav-link text-white" href="viewm.php">View Managers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="mreg.php">Add Managers</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
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
  <div style="padding: 10px;">
  <label>Choose a Role:</label>
  <select name="role" id="role">
    <option value="#"></option>
    <option value="event">Event</option>
    <option value="room">Room</option>
    
  </select>
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
    
</body>
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

<?php   
require('links.php')
?>

</html>