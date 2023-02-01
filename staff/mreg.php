<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  include('tablecss.php');
  staffLogin();
  $msg= "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Oswald | Staff</title>
    
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
      <h4 class="mt-2 text-light">Staff Corner</h4>
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
              <span>Control Panel</span>
              <span><i class="bi bi-caret-down-fill"></i></span>
            </button>
            <div class="collapse show px-3 small mb-1" id="bookingLinks">
              <ul class="nav nav-pills flex-column rounded border border-secondary">
              <li class="nav-item">
                  <a class="nav-link text-white" href="viewm.php">New Tokens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="seviced.php">Serviced Tokens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="mreg.php">Apply leave</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="mreg.php">Leave status</a>
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
    <label>From</label>
    <input type="date" class="form-control" min="2023-01-17" name="date1" id="name"  octavalidate="R">
  </div>
  <div class="form-group" style="padding: 10px;">
    <label>To</label>
    <input type="date" class="form-control" min="2023-01-16" id="address" name="date2" octavalidate="R">
  </div>
  <div style="padding: 10px;">
  <label>Reason</label>
  <select name="reason" id="role">
    <option value="#"></option>
    <option value="Medical">Medical</option>
    
    
  </select>
  </div>
  
 
  <div class="form-group" style="padding: 5px;">
    <label>Desciption</label>
    <input type="text" class="form-control" name="desc" id="name"  octavalidate="R">
  </div>
 <div class="form-group" style="padding: 10px;" >
  <button type="submit" class="btn btn-primary" name="submit" style="background-color:#000000">Apply Leave </button>
</div>
</form>
             
            </div>
        </div>
</div> 
<div class='dashboard-app'>
        <header class='dashboard-toolbar'></header>
        <div class='dashboard-content'>
            <div class='container'style='padding-left : 300px'>   
<?php
 $sql = "SELECT * FROM `leave_tbl`";
 $result = $con->query($sql);
 ?>
 <br> <br> <br>
 <table class="center" style="text-align:center;">

  <tr>
     <th>Applied Date</th>
     <th>From</th>
     <th>To</th>
     <th>Descripion</th>
     <th>Status</th>
  </tr>
  <div class="form-group" style="padding: 10px;" >
</div>
<div class="form-group" style="padding: 10px;" >
</div>
  
  
 <?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
     {
 ?>


  <tr>
   <td><?php echo $row['app_date'] ?></td>
    <td><?php echo $row['from'] ?></td>
    <td><?php echo $row['to'] ?></td>
    <td><?php echo $row['desc'] ?></td>
    <td><?php if($row['status']==1 )
    {?>
 
    <a href=""><button style="background-color:#4d4dff; color: black;border-radius: 5px;margin-left: 10px; ">Applied</button></a>
  <?php
  } 
  else if($row['status']==2 ) {?> 
   <a href=""><button style="background-color: #33cc33; color: black;border-radius: 5px;margin-left: 10px; ">Approved</button></a>
   <?php } else {?>
    <a href=""><button style="background-color:#ff3333; color: black;border-radius: 5px;margin-left: 10px; ">Rejected</button></a>
  </td>
  
    </tr>
  
 <?php
 }
}
 }
    ?>

</table>
<?php mysqli_close($con);  // close connection ?>
<br><br>
   
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
require('links.php');
?>

</html>