<?php include 'nav/enav.php';
if (isset($_SESSION['stuff'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}

?>

<head>

    <title>Add Item</title>


</head>


<form method="post" >
    
    <div class="container">
    <h1>Add New Items</h1>
        <table class="table table-borderless">
            <tr>
                <th>Catagory</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Rack</th>

            </tr>
            <tr>
                <?php
                $id = $_GET['acceptid'];
                $_SESSION['oid']=$id;
                $query = mysqli_query($conn, "SELECT * FROM `purchase_table` WHERE `id`='$id'");
                $fetch = mysqli_fetch_array($query);
                $cid = $fetch['catagory'];
                $catagory = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `item_catagory` WHERE `catagory_id`='$cid'"));
                $iid = $fetch['name'];
                $item = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `item` WHERE `item_id`='$iid'"));


                ?>

                <td> <input type="text" class=" form-control form-control-lg" required="true" name="catagory" value="<?php echo '' . $catagory['catagory'] . '' ?>"></td>
                <td> <input type="text" class=" form-control form-control-lg" required="true" name="name" value="<?php echo '' . $item['item_name'] . '' ?>"></td>
                <td> <input type="text" class=" form-control form-control-lg" required="true" name="quantity" value="<?php echo '' . $fetch['quantity'] . '' ?>"></td>
                <td>
                    <?php
                    
                    $rack = "SELECT * FROM rack";
                    $result = mysqli_query($conn, $rack);
                    ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="rack" id="rack">
                        <option selected disabled>Select Rack</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="button">
            <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
        </div>
    </div>
</form>

<?php include 'nav/footer.php'; ?>



<?php



if (isset($_POST['submit'])) {
    $sql = "SELECT *FROM `purchase_table` WHERE `id`='$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    // $iid = $_POST['name'];
    // $cid = $_POST['catagory'];
     $quan = $_POST['quantity'];
     $rid = $_POST['rack'];
    $rdate = $result['date'];
    $oid = $_SESSION['oid'];



    $sql = "SELECT *FROM `purchase_table` WHERE `id`='$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $cid=$result['catagory'];
    $iid=$result['name'];
    
    
    // $query =mysqli_query($conn, "INSERT INTO purchase_table(`catagory`,`name`,`quantity`)VALUES('$catagory','$name','$quantity')") ;



    // availibility check
    $total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `item_stock` WHERE item_id='$iid'"));
    if ($total == 0) {

        $sql = "UPDATE `purchase_table` SET `status`='1' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $query = mysqli_query($conn, "INSERT INTO `item_stock`(`catagory_id`, `item_id`, `quantity`, `recieve_date`, `order_id`,`rack_id`)VALUES('$cid','$iid','$quan','$rdate','$oid','$rid')");
            if ($query) {

                echo "<script>window.location='purchase_recieve.php'</script>";
            } else {


                echo "<script>window.location='purchase_recieve.php'</script>";
            }
        }
    }else
    {
        $sql = "UPDATE `purchase_table` SET `status`='1' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item_stock` WHERE item_id='$iid'"));
        $quantity=$query['quantity'];
        $newquan=$quan+$quantity;
       $q= mysqli_query($conn,"UPDATE `item_stock` SET `quantity`='$newquan' WHERE item_id='$iid'");
       if($q){
        echo "<script>window.location='purchase_recieve.php'</script>";
       }
        
    }
    
}