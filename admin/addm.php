<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oswald2";
 
 // Create connection
$con = new mysqli($servername, 
    $username, $password, $dbname);
  
// Check connection
if ($con->connect_error) {
    die("Connection failed: " 
        . $con->connect_error);
}

$id = $_GET['sr_no']; // get id through query string

$del = mysqli_query($con,"UPDATE `manager_cred` SET `status`=1 WHERE sr_no = '$id'"); // delete query


if($del)
{
    mysqli_close($con); // Close connection
    header("location:showdem.php"); // redirects to all records page
    exit;  
}
else
{
    echo "Error adding record"; // display error message if not delete
}
?>