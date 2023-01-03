<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['readid'];
$sql = "UPDATE `item_request` SET `nstatus`='0' WHERE id=$id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    
    header("location:notification.php");
} else {
    die(mysqli_error($conn));
}


