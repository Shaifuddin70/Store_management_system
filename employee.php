<?php include 'nav/enav.php';
if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>
<div class="container">
<div class="title">
    <span class="text">Employee List</span>
    
    <a href="add_role.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Role</button> </i></a>
    <a href="add_department.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Department</button> </i></a>
    <a href="add_designation.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Designation</button> </i></a>
    <a href="add_employee.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 250px;"> Add Employee</button> </i></a>
</div>
<?php
        if (isset($_SESSION['status'])) {
            echo "<p class='text-danger'>" . $_SESSION['status'] . "<p>";
            unset($_SESSION['status']);
        }
        ?>

<table class="table table-borderless">
    <thread>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Action</th>

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
        <td>
        <a href="eupdate.php? updateid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary"
        ><i class="bx bxs-edit-alt" ></i></button></a>
        <a href="edelete.php? deleteid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-danger"><i class="bx bxs-user-x" ></i></button></a>
        </td>
        
        </tr>';
        }
    } else {
        echo "NO records Found";
    };


    include 'nav/footer.php';
    ?>