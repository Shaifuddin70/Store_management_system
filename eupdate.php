<?php include 'nav/enav.php';
$id = $_GET['updateid'];
$query = mysqli_query($conn, "SELECT employee.name,employee.email,employee.role,employee.number,employee.department_id,employee.designation_id FROM employee JOIN department on department.id=employee.department_id JOIN designation ON designation.id=employee.designation_id WHERE employee.id='$id'");
$fetch = mysqli_fetch_array($query);
?>



<div class="container mt-3">
    <h1>Update Employee Info.</h1>
    <form method="post">

        <table class="table table-borderless">
            <tr>
                <th>Name</th>
                <td> <input type="text" class=" form-control form-control-lg"  name="name" autocomplete="off" value="<?php echo $fetch['name']; ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <input type="text" class=" form-control form-control-lg"  name="email" value="<?php echo $fetch['email']; ?>" autocomplete="off"></td>
            </tr>
            <tr>

                <th>Password</th>
                <td>
                    <input type="password" class=" form-control form-control-lg"  name="password" value="Password" autocomplete="new-password" maxlength="8" minlength="6">
                </td>

            </tr>
            <tr>
                <th>Phone</th>

                <td> <input type="text" class=" form-control form-control-lg"  name="number" autocomplete="off" value="<?php echo $fetch['number']; ?>"></td>
            </tr>
            <tr>
                <th>Department</th>

                <td>
                    <?php
                    $did = $fetch['department_id'];
                    $dquery = mysqli_query($conn, "SELECT *FROM department  WHERE id='$did'");
                    $dfetch = mysqli_fetch_array($dquery);


                    $catagory = "SELECT * FROM department";
                    $result = mysqli_query($conn, $catagory);
                    ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="department" required="true" id="department">
                        <option selected disabled><?php echo $dfetch['name']; ?></option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Designation</th>

                <td> <?php

                        $desid = $fetch['designation_id'];
                        $desquery = mysqli_query($conn, "SELECT *FROM designation  WHERE id='$desid'");
                        $desfetch = mysqli_fetch_array($desquery);
                        $catagory = "SELECT * FROM designation";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" required="true" name="designation" id="designation">
                        <option selected disabled><?php echo $desfetch['name']; ?></option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Role</th>
                <td> <?php
                        $rid = $fetch['role'];
                        $rquery = mysqli_query($conn, "SELECT *FROM `role`  WHERE id='$rid'");
                        $rfetch = mysqli_fetch_array($rquery);

                        $catagory = "SELECT * FROM role";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" required="true" name="role" id="role">
                        <option selected disabled><?php echo $rfetch['name']; ?></option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="button">
            <button class="btn btn-primary" type="submit" name="submit">UPDATE</button>
        </div>
</div>
</form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "UPDATE `employee` SET `name`='$name',`email`='$email',`number`='$number',`department_id`='$department',`designation_id`='$designation',`password`='$pass',`role`='$role' WHERE `id`='$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {

        echo "<script>window.location='employee.php'</script>";
    } else {
        echo "<script>alert('Invalid username or password')</script>";
        header("location:add_employee.php");
    }
}
