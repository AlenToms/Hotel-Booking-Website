<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  managerLogin();
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

  <?php require('inc/header.php'); 
  
 
  ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">STAFF LIST</h3>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

           

            <div class="table-responsive">
              <table class="table table-hover border" style="min-width: 1200px;">
                <thead>
                <tr class="bg-dark text-light">
     <th>NAME</th>
     <th>PHONE</th>
     <th>ADDRESS</th>
     <th>EMAIL</th>
     <th>ACTION</th>
     <th> </th>
  </tr>
                </thead>
                <tbody id="table-data">   
                    <?php 
                     $sql = "SELECT * FROM `manager_cred` WHERE role = 'STAFF' AND status=1";
                     $result = $con->query($sql);
                if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
     {
 ?>


 
<tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td>
 
    <a href="deletem.php?sr_no= <?php echo $row['sr_no'] ?>"><button style="background-color: #ff3333; color: white;border-radius: 5px;margin-left: 10px; ">Deactivate</button></a>
   </td>
    </tr>
    
 <?php
 }}
    ?>
    <div class="form-group" style="padding: 10px;" >
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #ff3333; color: white;" onclick="window.location.href = 'showdem.php';" > Inactive Staff </button>
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'actm_Excel.php';" > Download  </button>

</div>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>



  <!-- Assign Room Number modal -->

  


  <?php require('inc/scripts.php'); ?>

  <script src="scripts/new_bookings.js"></script>

</body>
</html>