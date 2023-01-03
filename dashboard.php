<?php include 'nav/enav.php';
if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
$totalem = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `employee`"));

$totali = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `item`"));

$totalc = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `item_catagory`"));
$totalis = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `issue`"));
$totalr = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `item_request`"));

// purchase history
$purquery = mysqli_query($conn, "SELECT * FROM `purchase_table`");
$purtotal = mysqli_num_rows($purquery);
$pur = 0;
if ($purtotal != 0) {
    while ($purresult =  mysqli_fetch_assoc($purquery)) {
        if ($purresult['status'] == 1) {
            $pur++;
        }
    }
}


?>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-users-alt"></i>
                <span class="text">Total Employee</span>
                <a href="employee.php"><span class="number"><?php echo "$totalem" ?></span></a>
            </div>
            <div class="box box2">
                <i class="uil uil-chart"></i>
                <span class="text">Total Catagory</span>
                <a href="catagory.php"><span class="number"><?php echo "$totalc" ?></span></a>
            </div>
            <div class="box box3">
                <i class="uil uil-shopping-cart"></i>
                <span class="text">Total Item</span>
                <a href="item.php"><span class="number"><?php echo "$totali" ?></span></a>
            </div>
        </div>
        <br>
        <div class="boxes">
            <div class="box box4" style="background: #51B5AB;">
                <i class="uil uil-gift"></i>
                <span class="text">Total Issues</span>
                <a href="issue_table.php"><span class="number"><?php echo "$totalis" ?></span></a>
            </div>
            <div class="box box5" style="background:#CE9CEA;">
                <i class="uil uil-history"></i>
                <span class="text">Purchase History</span>
                <a href="purchase_history.php"><span class="number"><?php echo "$pur" ?></span></a>
            </div>
            <div class="box box6" style="background: #E2648A;">
            <i class="uil uil-history-alt"></i>
                <span class="text">Request History</span>
                <a href="requesthistory.php"><span class="number"><?php echo "$totalr" ?></span></a>
            </div>
        </div>
    </div>

    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Registerd Employee</span>
    </div>
    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Department</th>
                <th>Designation</th>

            </tr>
        </thread>
        <?php

        $query = "select * from employee";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {

                $did = $result['department_id'];
                $department = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `department` WHERE id='$did'"));

                $desid = $result['designation_id'];
                $designation = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `designation` WHERE id='$desid'"));
                echo '
        <tr>
        <td>' . $result['name'] . '</td>
        <td>' . $result['email'] . '</td>
        <td>' . $result['number'] . '</td>
        <td>' . $department['name'] . '</td>
        <td>' . $designation['name'] . '</td>
       
        
        </tr>';
            }
        } else {
            echo "NO records Found";
        };


        include 'nav/footer.php';
        ?>