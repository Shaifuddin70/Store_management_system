<?php
$user = $_POST['username'];
$email = $_POST['email'];
$num = $_POST['number'];
$nid = $_POST['nid'];
$pass = $_POST['password'];
$c_pass = $_POST['con_password'];
if ($pass != $c_pass) {
  echo "<script>alert('Password do not match.')</script>";
  echo "<script>window.location='login.html'</script>";
} else {
  include("db_connect.php");
  $vkey = md5(time() . $user);
  //echo $vkey;
  $pass = password_hash($pass, PASSWORD_DEFAULT);
  $stmt = $conn->prepare(" insert into user(username, email,p_number,nid,pass,vkey) values(?,?,?,?,?, ?)");
  $stmt->bind_param("ssiiss", $user, $email, $num, $nid, $pass, $vkey);
  $stmt->execute();
  if ($stmt) {
    $to = "$email";
    $sub = "Email verification";
    $mess = "<a href='http://localhost/store/verify.php?vkey=$vkey'>Register Now</a>";
    $headers = "From: iubat@gmail.com" . "\r\n";
    if (mail($to, $sub, $mess, $headers)) {
      echo "<script>alert('Please Verify the email Address.')</script>";
      echo "<script>window.location='login.html'</script>";
    } else {
      echo "Email sending failed...";
    }
  } else {
    echo '$mysqli->error';
  }
}
