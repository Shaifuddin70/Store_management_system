<?php
include 'nav/enav.php';
if(isset($_SESSION['stuff'])){
    

}elseif(isset($_SESSION['admin'])){

}
else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
    <form action="add_connect.php" method="post">
        <h1>Add New Items</h1>
        <div class="container mt-3">
         
            <table class="table table-borderless">
                <tr>
                    <th>Item Name</th>
                    <th>Item Reusability</th>
                    <th>Item Catagory</th>
                   
                </tr>
                <tr>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="iname" placeholder="Item Name"></td>
                   
                    <td>
                        <select name="reuse" select class="form-control form-control-lg" aria-label="Default select example" >
                            <option>Reusability</option>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </td>
                    <td>
                        <?php
                      
                        $catagory = "SELECT * FROM item_catagory";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                        <select class="form-control form-control-lg" aria-label="Default select example"  name="catagory" id="catagory">
                            <option selected disabled>Catagory</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?php echo $row['catagory_id']; ?>"> <?php echo $row['catagory']; ?> </option>
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
</body>

</html>
<?php include 'nav/footer.php';?>