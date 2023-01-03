<?php
include("db_connect.php");
$user = $_POST['username'];
$email = $_POST['email'];
$num = $_POST['number'];
$nid = $_POST['nid'];
$pass = $_POST['password'];
$c_pass = $_POST['con_password'];

if ($conn->$connect_error) {
  die("Connection failed: " . $conn->$connect_error);
}else{
  $stmt = $conn-> prepare(" insert into user(username, email,p_number,nid,pass,con_pass) values(?,?,?,?,?, ?)");
  $stmt-> bind_param("ssiiss",$user,$email,$num,$nid,$pass,$c_pass);
  $stmt ->execute();
  header("location:login.html");
}
 


 
