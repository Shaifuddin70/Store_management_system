<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['rejectid'];


$sql = "UPDATE `item_request` SET `status`='0', `nstatus`='1' WHERE id=$id";

$result = mysqli_query($conn, $sql);
if ($result) {
    
    header("location:item_request.php");
} else {
    die(mysqli_error($conn));
}


