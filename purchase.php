<?php include 'nav/enav.php';
if(isset($_SESSION['stuff'])){
    

}elseif(isset($_SESSION['admin'])){

}
else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
 ?>




    <form method="post">
        
        <div class="container">
        <h1>Purchase Request</h1>
            <table class="table table-borderless">
                <tr>

                    <th>Catagory name</th>
                    <th>Item name</th>
                    <th>Quantity</th>
                </tr>
                <tr>
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
                    <td>
                        <select class="form-control form-control-lg" aria-label="Default select example" name="item" id="item">
                            <option selected disabled>Select Item</option>

                        </select>
                    </td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="quantity" placeholder="Item Quantity"></td>
                </tr>
            </table>
            <script>
                // catagory item
                $('#catagory').on('change', function() {
                    var catagory_id = this.value;
                    console.log(catagory_id);
                    $.ajax({
                        url: 'ajax/item.php',
                        type: "POST",
                        data: {
                            catagory_data: catagory_id
                        },
                        success: function(result) {
                            $('#item').html(result);
                            //console.log(result);
                        }
                    })
                });
            </script>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $catagory = $_POST['catagory'];
    $iname = $_POST['item'];
    $quantiy = $_POST['quantity'];



    $query = "INSERT INTO order_table (`catagory`,`name`,`quantity`)VALUES('$catagory','$iname','$quantiy')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['status'] = "Inserted Succesfully";

        echo "<script>window.location='stock.php'</script>";
    } else {
        $_SESSION['status'] = "Not Inserted";
        echo "<script>window.location='stock.php'</script>";
    }
}
?>