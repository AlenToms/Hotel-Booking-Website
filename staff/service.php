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

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"UPDATE `tokens` SET `status`=2 WHERE id = '$id'"); // delete query
 

if($del)
{
    mysqli_close($con); // Close connection
    header("location:viewm.php"); // redirects to all records page
    exit;  
}
else
{
    echo "Error while  operation"; // display error message if not delete
}
?>