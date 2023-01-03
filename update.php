<?php
include 'nav/enav.php';
$id= $_GET['updateid'];
$query = mysqli_query($conn, "SELECT * FROM `item` WHERE `item_id`='$id'");
$fetch = mysqli_fetch_array($query);
?>
   
        <div class="container mt-3">
        <form method="post">
        <h1>Update Item Info.</h1>
            <?php
            if (isset($_SESSION['status'])) {
                echo "<h4>" . $_SESSION['status'] . "<h4>";
                unset($_SESSION['status']);
            }
            ?>
            <table class="table table-borderless">
                <tr>
                    <th>Item Name</th>
                    <th>Item Reusability</th>
                    <th>Item Catagory</th>
                </tr>
                <tr>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="iname" value="<?php echo '' . $fetch['item_name'] . '' ?>"></td>
                   
                    <td>
                        <select name="reuse" class="form-control form-control-lg" aria-label="Default select example">
                            <option>---Select one---</option>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </td>
                    <td>
                        <?php
               
                        $catagory = "SELECT * FROM item_catagory";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                        <select class="form-control form-control-lg" aria-label="Default select example" name="catagory" id="catagory">
                            <option selected disabled>Select catagory</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?php echo $row['catagory_id']; ?>"> <?php echo $row['catagory']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
            </form>
        </div>
    
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $iname = $_POST['iname'];
    $reuse = $_POST['reuse'];
    $catagory = $_POST['catagory'];
    $id = $_GET['updateid'];

    $query = "UPDATE item SET `item_id`='$id',`item_name`='$iname',`catagory_id`='$catagory',`reusable`='$reuse' WHERE item_id='$id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "<script>success</script>";
        echo "<script>window.location='item.php'</script>";
    } else {
        echo "fail";
        header("location:add_item.php");
    }
}


?>