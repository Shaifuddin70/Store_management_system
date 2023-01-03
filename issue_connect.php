<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
 include 'db_connect.php';
 $db = new dbObj();
 $conn =  $db->getConnstring();
$eid = $_SESSION['eid'];
$iid = $_POST['item'];
$quantiy = $_POST['quantity'];

$result =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item_stock` WHERE item_id='$iid'"));
$quan=$result['quantity'];
if($quan>=$quantiy){

   $query="INSERT INTO `item_request`( `employee_id`, `item_id`, `quantity`) VALUES ('$eid','$iid','$quantiy')";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
      $_SESSION['status']="Request Submitted Succesfully";
      
      header("location:employeepanel.php");
   }
   else{
      $_SESSION['status']="Not Inserted";
      header("location:employeepanel.php");
   }
}
else{

   echo "<script>alert('Out Of Stock! Contact with Admin')</script>";
   echo "<script>window.location='employeepanel.php'</script>";
}
?>
