<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  include('tablecss.php');
  adminLogin();

  
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
            <div class='container'style='padding-left : 300px'>
            <h1 style="text-align:center;padding-top: 50px;">Managers Detail</h1><br> <br>


<?php
$sql = "SELECT * FROM `manager_cred` WHERE role = 'MG' AND status=0";
$result = $con->query($sql);
 ?>
 <br> <br> <br>
 <table class="center" style="text-align:center;">

  <tr>
     <th>NAME</th>
     <th>PHONE</th>
     <th>ADDRESS</th>
     <th>EMAIL</th>
     <th> </th>
  </tr>

  <div class="form-group" style="padding: 10px;" >
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #ff3333; color: white;" onclick="window.location.href = 'viewm.php';" > Active Managers </button>
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button>

</div>
 <?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 ?>
  <tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td>
                                                    <a href="addm.php?sr_no=<?php echo $row['sr_no'];?>"><button style="background-color:  #29a329; color: white;border-radius: 5px;">Add</button></a>
                                                </td>
                                            </tr>
  
 <?php
 }
 }
    ?>

</table>
<?php mysqli_close($con);  // close connection ?>
<br><br>
   
</body>    
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>   
                   
           
<?php   
require('links.php')
?>

</html>