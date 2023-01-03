<?php

include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['deleteid'];

$query = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM item WHERE catagory_id =$id"));
if(!empty($query))
{
    echo "<script>alert('There are item under this Catagory.')</script>";
    echo "<script>window.location='catagory.php'</script>";
} else {
    $sql = "DELETE FROM `item_catagory` WHERE catagory_id=$id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'delete succesfully';
    header("location:catagory.php");
} else {
    die(mysqli_error($conn));
}

}


