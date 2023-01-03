<?php include 'nav/enav.php';
if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Reports</span>
        </div>

        <div class="boxes">
            <div class="box box1">
            <i class="uil uil-bill"></i>
            <a href="purchasereport.php"><span class="text">Purchase Report</span></a>
                <span class="number"></span>
            </div>
            <div class="box box2">
            <i class="uil uil-file-medical-alt"></i>
            <a href="issuerep.php"><span class="text">Issue report</span></a>
               <span class="number"></span>
            </div>
            <div class="box box3">
            <i class="uil uil-backspace"></i>
            <a href="returnreport.php"><span class="text">Return Report</span></a>
               
            </div>
        </div>
       
    </div>
    <?php
    include 'nav/footer.php';
    ?>