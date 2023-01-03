
<?php include 'nav/enav.php'?>
<div class="container mt-3">
    <form method="post">
        <h1>Change Password</h1>
        <table class="table table-borderless">
            <tr>
                <th>Old Password</th>
                <td>
                    <input type="password" class=" form-control form-control-lg" required="true" name="opass" placeholder="Password" autocomplete="new-password" maxlength="8" minlength="6">
                </td>
            </tr>
           <tr>
           <th>New Password</th>
                <td>
                    <input type="password" class=" form-control form-control-lg" required="true" name="npass" placeholder="Password" autocomplete="new-password" maxlength="8" minlength="6">
                </td>
           </tr>
           
        </table>
        <div class="button">
            <button  type="submit" name="submit" style="border-radius: 24px;
    background: #82deff;
    padding: 10px 20px;
    border: none;">SUBMIT</button>
    
        </div>
    </form>
</div>

<?php include 'nav/footer.php';

if (isset($_POST['submit'])) {
    $id = $_SESSION['eid'];
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $npass = password_hash($npass, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `employee` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    $hased_pass = $check['password'];
    if (password_verify($opass, $hased_pass)) {
        $query = "UPDATE `employee` SET `password`='$npass'  WHERE `id`='$id'";
        $data = mysqli_query($conn, $query);
        echo "<script>window.location='profile.php'</script>";
    } else {
        echo "<script>alert('Wrong Credentials')</script>";
        echo "<script>window.location='profile.php'</script>";
    }
}
?>

