<?php
include 'nav/enav.php';
if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
    <form method="post">
        <h1>Add New Designation</h1>
        <div class="container mt-3">

            <table class="table table-borderless">
                <tr>

                    <th>Role Name</th>
                </tr>
                <tr>

                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="rname" placeholder="Role Name"></td>

                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </div>
        </div>

    </form>
</div>

<?php
include 'nav/footer.php';
 if(isset($_POST['submit']))
 {
    $rname = $_POST['rname'];

    $query="INSERT INTO `role` (`name`)VALUES('$rname')";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
    $_SESSION['status']="Inserted Succesfully";
       echo "<script>window.location='employee.php'</script>";
   }
   else{
    $_SESSION['status']="Not Inserted";
       echo "<script>window.location='employee.php'</script>";
   }
 }

