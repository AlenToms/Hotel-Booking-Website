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
        <h3 class="mb-4">STAFF LEAVE</h3>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

           

            <div class="table-responsive">
              <table class="table table-hover border" style="min-width: 1200px;">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Applied Date</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody id="table-data">   
                    <?php 
                     $sql = "SELECT * FROM `leave_tbl`";
                     $result = $con->query($sql);
                if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
     {
 ?>


  <tr>
  <td><?php echo $row['Name'] ?></td>
    <td><?php echo $row['from'] ?></td>
    <td><?php echo $row['to'] ?></td>
    <td><?php echo $row['app_date'] ?></td>
    <td><?php echo $row['Reason'] ?></td>
    <td><?php echo $row['desc'] ?></td>
    <td><?php if($row['status']==1 )
    {?>
 
    <a href="app_leave.php?id=<?php echo $row['id'];?>"><button style="background-color: #33cc33; color: black;border-radius: 5px;margin-left: 10px; ">Approve</button></a>
    <a href="rej_leave.php?id=<?php echo $row['id'];?>"><button style="background-color:red; #ff4d4d: black;border-radius: 5px;margin-left: 10px; ">Reject</button></a>
  <?php
  } 
  else if($row['status']==2 ) {?> 
   <a href=""><button style="background-color:green; color: black;border-radius: 5px;margin-left: 10px; ">Approved</button></a>
   <?php } else {?>
    <a href=""><button style="background-color:red; color: black;border-radius: 5px;margin-left: 10px; ">Rejected</button></a>
  </td>
  
    </tr>
  
 <?php
 }
}
 }
    ?>
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