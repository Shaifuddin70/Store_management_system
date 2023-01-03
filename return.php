<?php
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['returnid'];


$queryi=mysqli_fetch_array(mysqli_query($conn,"SELECT *FROM `issue` WHERE `id`='$id'"));
$iid=$queryi['item'];
$quan=$queryi['quantity'];
$eid=$queryi['employee_id'];

$queryu=mysqli_fetch_array(mysqli_query($conn,"SELECT *FROM `item` WHERE `item_id`='$iid'"));
$use=$queryu['reusable'];
$result =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item_stock` WHERE item_id='$iid'"));
$quantity=$result['quantity'];
$iquan=$result['Issued_quantity'];
$iquantity=$iquan-$quan;



if($use=='YES'){
$newquan=$quan+$quantity;
   $q= mysqli_query($conn,"UPDATE `item_stock` SET `quantity`='$newquan',`Issued_quantity`='$iquantity' WHERE item_id='$iid'");
   $issueid=$queryi['id'];
   $returnq=mysqli_query($conn,"INSERT INTO return_table (employee_id,item_id,quantity)VALUES('$eid','$iid','$quan')");
    $qu= mysqli_query($conn,"DELETE FROM `issue` WHERE id='$issueid'");
   if($qu){
    echo "<script>window.location='employeepanel.php'</script>";
   }
}else{
    $iquantity=$iquan-$quan;
    $issueid=$queryi['id'];
    $q= mysqli_query($conn,"UPDATE `item_stock` SET `Issued_quantity`='$iquantity' WHERE item_id='$iid'");
    $q= mysqli_query($conn,"DELETE FROM `issue` WHERE id='$issueid'");
    
    if($q){
        echo "<script>window.location='employeepanel.php'</script>";
       }

}




