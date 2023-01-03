<?php
 include("db_connect.php");
 $db = new dbObj();
 $conn =  $db->getConnstring();
 $cname = $_POST['cname'];
 $query="INSERT INTO item_catagory(catagory)VALUES('$cname')";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status']="Inserted Succesfully";
    header("location:catagory.php");
}
else{
    $_SESSION['status']="Not Inserted";
    header("location:add_catagory.php");
}
 

?>