<?php
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oswald2";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=Registered_Managers.xls" );
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
  header("Pragma: public");
?>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Status</th>
   
    </tr>
  </thead>
  <tbody>
    <?php
    $qryreport = mysqli_query($conn,"SELECT * from manager_cred where status=1 AND role='STAFF'") or die(mysqli_error());

    $sqlrows=mysqli_num_rows($qryreport);
    WHILE ($reportdisp=mysqli_fetch_array($qryreport)) {
    ?>
    <tr>
      <td><?php echo $reportdisp['name'] ?></td>
      <td><?php echo $reportdisp['address'] ?></td>
      <td><?php echo $reportdisp['number'] ?></td>
      <td><?php echo $reportdisp['email'] ?></td>
      <td>Active</td>
    <?php } ?>
  </tbody>
</table>