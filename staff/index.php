<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  staffLogin();

  
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
            <div class='container'>
                
                   
                        <h1 style="text-align:center;padding-top: 50px;">Welcome Staff</h1>
             
            </div>
        </div>
</div>    
    
</body>
<?php   
require('links.php')
?>
 <script src="scripts/users.js"></script>
</html>