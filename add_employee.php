<?php include 'nav/enav.php';

if (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
} ?>

<div class="container mt-3">
    <form method="post">
        <h1>Add New Employee</h1>
       
        <table class="table table-borderless">
            <tr>
                <th>Name</th>
                <td> <input type="text" class=" form-control form-control-lg" required="true" name="name" autocomplete="off" placeholder="Name"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <input type="text" class=" form-control form-control-lg" required="true" name="email" placeholder="Email" autocomplete="off"></td>
            </tr>
            <tr>

                <th>Password</th>
                <td>
                    <input type="password" class=" form-control form-control-lg" required="true" name="password" placeholder="Password" autocomplete="new-password" maxlength="8" minlength="6">
                </td>


            </tr>
            <tr>
                <th>Phone</th>

                <td> <input type="text" class=" form-control form-control-lg" required="true" name="number" autocomplete="off" placeholder="Phone Number"></td>
            </tr>
            <tr>
                <th>Department</th>

                <td>
                    <?php


                    $catagory = "SELECT * FROM department";
                    $result = mysqli_query($conn, $catagory);
                    ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="department" id="department">
                        <option selected disabled>Select Department</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Designation</th>

                <td> <?php


                        $catagory = "SELECT * FROM designation";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="designation" id="designation">
                        <option selected disabled>Select Designation</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Role</th>
                <td> <?php


                        $catagory = "SELECT * FROM role";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="role" id="role">
                        <option selected disabled>Select Role</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="button">
            <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
        </div>
    </form>
</div>


<?php
include 'nav/footer.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO employee(`name`,`email`,`number`,`department_id`,`designation_id`,`password`,`role`)VALUES('$name','$email','$number','$department','$designation','$pass','$role')";
    $data = mysqli_query($conn, $query);

    if ($data) {

        echo "<script>window.location='employee.php'</script>";
    } else {
        echo "<script>alert('Invalid username or password')</script>";
        header("location:add_employee.php");
    }
}
