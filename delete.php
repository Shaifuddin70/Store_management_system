<?php

include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['deleteid'];

$query = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM issue WHERE item =$id"));
if(!empty($query))
{
    echo "<script>alert('This item is issued to user. please call return before delete.')</script>";
    echo "<script>window.location='item.php'</script>";
}else{
    $sql = "DELETE FROM `item` WHERE item_id=$id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'delete succesfully';
        header("location:item.php");
    } else {
        die(mysqli_error($conn));
    }
    
}
