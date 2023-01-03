<?php include 'nav/enav.php';
if(isset($_SESSION['admin'])){
    

}else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
    
            <h1>Item Requests</h1>
          
  
          
      <table class="table table-borderless">
            <thread>
                <tr>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Operation</th> 
                    
                </tr>
            </thread>
            <?php
            
            $query = "select * from item_request";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                  if($result['status']==null){
                    $eid=$result['employee_id'];
                    $iid=$result['item_id'];
                 $equery=mysqli_query($conn, "SELECT * FROM `employee` WHERE id='$eid'");
                 $employee = mysqli_fetch_assoc($equery);

                 $did=$employee['department_id'];
                 $department=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `department` WHERE id='$did'"));

                 $desid=$employee['designation_id'];
                 $designation=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `designation` WHERE id='$desid'"));

                 $iquery=mysqli_query($conn, "SELECT * FROM `item` WHERE item_id='$iid'");
                 $item = mysqli_fetch_assoc($iquery);

                    echo '
        <tr>
        <td>' . $employee['name'] . '</td>
        <td>' . $department['name'] . '</td>
        <td>' . $designation['name'] . '</td>
        <td>' . $item['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td> 
        <a href="accept.php? acceptid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary">Accept</button></a>
      <a href="reject.php? rejectid='.$result['id'].'"  class="text-light"><button  class="btn btn-danger">Reject</button></a>
    </td>
        
        </tr>';

                  }
              
                }
            } 
            else {
                echo "NO records Found";
            };
 
?>

<?php include 'nav/footer.php';
?>


