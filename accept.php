<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['acceptid'];

$sql = "SELECT *FROM `item_request` WHERE `id`='$id'";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$iid = $result['item_id'];
$eid = $result['employee_id'];
$quan = $result['quantity'];


// quantity check
$result =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item_stock` WHERE item_id='$iid'"));
    $quantity = $result['quantity'];
if ($quantity >= $quan) {
    
    $iquan = $result['Issued_quantity'];
    $newquan = $quantity - $quan;
    $iquantity = $iquan + $quan;
    $query = mysqli_query($conn, "UPDATE `item_stock` SET `quantity`='$newquan',`Issued_quantity`='$iquantity' WHERE item_id='$iid'");
    $sql = "UPDATE `item_request` SET `status`='1',`nstatus`='1' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $query = mysqli_query($conn, "INSERT INTO issue(`item`,`employee_id`,`quantity`)VALUES('$iid','$eid','$quan')");
        if ($query) {

            header("location:item_request.php");
        } else {


            header("location:item_request.php");
        }
    }
} else {

    echo "<script>alert('Out Of Stock!')</script>";
    echo "<script>window.location='item_request.php'</script>";
}
