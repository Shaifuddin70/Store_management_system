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
    <form action="catagory_connect.php" method="post">
        <h1>Add New Catagory</h1>
        <div class="container mt-3">
           
            <table class="table table-borderless">
                <tr>

                    <th>Catagory Name</th>
                </tr>
                <tr>

                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="cname" placeholder="Catagory Name"></td>

                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" value="submit">SUBMIT</button>
            </div>
        </div>


    </form>





</body>

</html>
<?php include 'nav/footer.php';?>