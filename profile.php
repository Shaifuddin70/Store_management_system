<?php include 'nav/enav.php';
$id = $_SESSION['eid'];
$query = mysqli_query($conn, "SELECT employee.name,employee.email,employee.role,employee.number,employee.department_id,employee.designation_id FROM employee JOIN department on department.id=employee.department_id JOIN designation ON designation.id=employee.designation_id WHERE employee.id='$id'");
$fetch = mysqli_fetch_array($query);
?>



<div class="container mt-3">
    <h1>Employee Info.</h1>
    <form method="post" action="changepass.php">
        <table class="table table-borderless">
            <tr>
                <th>Name</th>
                <td> <span><?php echo $fetch['name']; ?></span></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <span><?php echo $fetch['email']; ?></span></td>
            </tr>

            <tr>
                <th>Phone</th>

                <td> <span><?php echo $fetch['number']; ?></span></td>
            </tr>
            <tr>
                <?php
                $did = $fetch['department_id'];
                $dquery = mysqli_query($conn, "SELECT *FROM department  WHERE id='$did'");
                $dfetch = mysqli_fetch_array($dquery);
                ?>
                <th>Department</th>
                <td> <span><?php echo $dfetch['name']; ?></span></td>

            </tr>
            <tr>
                <?php

                $desid = $fetch['designation_id'];
                $desquery = mysqli_query($conn, "SELECT *FROM designation  WHERE id='$desid'");
                $desfetch = mysqli_fetch_array($desquery);
                ?>
                <th>Designation</th>
                <td> <span><?php echo $desfetch['name']; ?></span></td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <?php
                    $rid = $fetch['role'];
                    $rquery = mysqli_query($conn, "SELECT *FROM `role`  WHERE id='$rid'");
                    $rfetch = mysqli_fetch_array($rquery);
                    ?>
                    <span><?php echo $rfetch['name']; ?></span>
                </td>
            </tr>
        </table>
        <button type="submit" style="    border-radius: 24px;
    background: #82deff;
    padding: 10px 20px;
    border: none;">Change Password</button>
    </form>
</div>

</body>

</html>

<?php
include 'nav/footer.php';
