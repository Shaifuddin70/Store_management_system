<?php
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    require_once('db_connect.php');
    $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass' ";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    if (isset($check)) {
        header("location:nav/nav.php");
    } else {
        echo 'failure';
    }
}
