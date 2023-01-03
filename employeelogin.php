<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <form method="post">

        <div class="form">
            <h2>Sign In</h2>
            <div class="inputbox">
                <input type="text" required="required" name="email" placeholder="Email">

            </div>
            <div class="inputbox">
                <input type="password" required="required" name="password" placeholder="Password">

            </div>
            <br><br>
            <div>
            <button type="submit" class="btn btn-outline-primary" name="login">Sign in</button>
            </div>
            

        </div>



    </form>


</body>

</html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once 'db_connect.php';
session_start();
if(ISSET($_POST['login'])){
    $db = new dbObj();
$conn =  $db->getConnstring();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `employee` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    
    $hased_pass=$check['password'];
    if (password_verify($password,$hased_pass )){
        $_SESSION['eid']=$check['id'];
        if (isset($check)) {
            if($check['role']=='1'){
                header("location:dashboard.php");
                $_SESSION['admin']=true;
    
            }
            else if ($check['role']=='2')
            {
                $_SESSION['stuff']=true;
                header("location:stock.php");
            }elseif($check['role']=='3'){
                $_SESSION['employee']=true;
                header("location:employeepanel.php");
            }
            
        } 

    }else {
        echo "<script>alert('Wrong Credentials')</script>";
        echo "<script>window.location='employeelogin.php'</script>";
    }
   
    
    
}







?>


