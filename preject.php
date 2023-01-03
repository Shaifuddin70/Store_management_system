<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['rejectid'];
$sql = "UPDATE `order_table` SET `status`='0' WHERE id=$id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    
    header("location:purchase_request.php");
} else {
    die(mysqli_error($conn));
}


