<?php
session_start(); 
 include("db_connect.php");
 $db = new dbObj();
$conn =  $db->getConnstring();
 if(isset($_POST['submit']))
 {
    $iname = $_POST['iname'];

    $reuse = $_POST['reuse'];
    $cid=$_POST['catagory'];

    
   
  
    $query="INSERT INTO item(item_name,catagory_id,reusable)VALUES('$iname','$cid','$reuse')";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
       $_SESSION['status']="Inserted Succesfully";
       
       header("location:item.php");
   }
   else{
       $_SESSION['status']="Not Inserted";
       header("location:add_item.php");
   }
 }

