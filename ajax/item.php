<?php
include '../db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
$catagory_id = $_POST['catagory_data'];
//echo $catagory_id;
$item = "SELECT * FROM item WHERE catagory_id = $catagory_id";

$item_qry = mysqli_query($conn, $item);
// $output="";
$output = '<option value="">Select Item</option>';
while ($item_row = mysqli_fetch_assoc($item_qry)) {
    $output .= '<option value="' . $item_row['item_id'] . '">' . $item_row['item_name'] . '</option>';
}
echo $output;
