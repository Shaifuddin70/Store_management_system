<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['acceptid'];
    

$sql = "UPDATE `order_table` SET `status`='1' WHERE id=$id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    
    $sql = "SELECT *FROM `order_table` WHERE `id`='$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $catagory=$result['catagory'];
    $name=$result['name'];
    $quantity=$result['quantity'];
    
    $query =mysqli_query($conn, "INSERT INTO purchase_table(`catagory`,`name`,`quantity`)VALUES('$catagory','$name','$quantity')") ;
    if($query){
    
    
           
           header("location:purchase_request.php");
       }
       else{
          
           header("location:purchase_request.php");
       }
} else {
    die(mysqli_error($conn));
}




