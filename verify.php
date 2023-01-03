<?php
if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    include("db_connect.php");
    $query=("SELECT verified,vkey FROM user WHERE verified =0 AND vkey='$vkey' LIMIT 1");
    $result = mysqli_query($conn,$query);
    if($result ->num_rows ==1)
    {
        $query=("UPDATE user SET verified=1 where vkey= '$vkey' LIMIT 1 ");

        $update=mysqli_query($conn,$query);
        if($update){
            echo "<script>alert('Email Address is Verified')</script>";
        echo "<script>window.location='login.html'</script>";
        }else{
            echo" Not verified";
        }

    }else{
        echo"Invalid mail or already registered";
    }
}else{
    die("something went wrong");
}





?>