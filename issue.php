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
    <h1>Issued Item </h1>
 
  
 
    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Action</th>
                

            </tr>
        </thread>
        <?php
        $data = mysqli_query($conn, "SELECT *from `employee`");
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo '
        <tr>
        <td>' . $result['name'] . '</td>
        <td>' . $result['email'] . '</td>
        <td>' . $result['number'] . '</td>
        <td><a href="issue_details.php? selectid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary"
        ><i class="uil uil-eye"></i></button></a></td>
        </tr>';
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php';?>
       
