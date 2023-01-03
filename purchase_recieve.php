<?php include 'nav/enav.php';
if(isset($_SESSION['stuff'])){
    

}else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<head>
  <title>Item Requests</title>

</head>

<div class="container">
<div class="title">
  <span class="text">Receive Order</span>
  <a href="add_rack.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 550px;"> Add Rack</button> </i></a>
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
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Operation</th>

      </tr>
    </thread>
    <?php

    $query = "select * from purchase_table";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total != 0) {
      while ($result = mysqli_fetch_assoc($data)) {
        if ($result['status'] == null) {


          $iid = $result['name'];
          $iname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item` WHERE item_id='$iid'"));

          echo '
        <tr>
        <td>' . $iname['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td> 
        <a href="insert.php? acceptid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary">Insert</button></a>
    </td>
        
        </tr>';
        }
      }
    } else {
      echo "NO records Found";
    };

    ?>

    <?php include 'nav/footer.php';
    ?>