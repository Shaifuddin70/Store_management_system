<?php
include 'nav/enav.php';
if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
    
<a href="add_role.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Role</button> </i></a>
    <a href="add_department.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Department</button> </i></a>
    <a href="add_designation.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Designation</button> </i></a>
 <a href="add_rack.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Rack</button> </i></a>

</div>

<?php
include 'nav/footer.php';
 if(isset($_POST['submit']))
 {
    $rname = $_POST['rname'];

    $query="INSERT INTO `rack` (`name`)VALUES('$rname')";
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

