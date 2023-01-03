<?php include 'nav/enav.php';
if(isset($_SESSION['admin'])){
    

}else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<head>
  <title>Item Requests</title>

</head>

<div class="container">

  <h1>Purchase Request</h1>

<div id="table" > 
  <div id="invisible" class="d-none"> 
  <h1 >Invoice</h1>
  <span>Date: </span>
  <span>
<script> document.write(new Date().toLocaleDateString()); </script>
  </span>
  </div>
  <table class="table table-borderless">
    <thread>
      <tr>
        <th id="sn">S/N</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Operation</th>

      </tr>
    </thread>
    <?php

    $query = "select * from order_table";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    $c=1;
    if ($total != 0) {
      while ($result = mysqli_fetch_assoc($data)) {
        if ($result['status'] == null) {
          $iid = $result['name'];
          $iname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item` WHERE item_id='$iid'"));
          echo '
        <tr>
        <td id="sn">' . $c . '</td>
        <td>' . $iname['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td> 
        <a href="paccept.php? acceptid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary">Accept</button></a>
      <a href="preject.php? rejectid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-danger">Reject</button></a>
      <a href="invoice.php? invoiceid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-info"> Invoice</button></a>
    </td>
        
        </tr>';$c++;
        }
      }
    } else {
      echo "NO records Found";
    };
?></table></div>

</div>
<script>  const invoice = () => {
  $("#invisible").removeClass("d-none");
  $("#sn").addClass("d-none");
    var divName= "table";
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
$("#invisible").addClass("d-none");
$("#sn").removeClass("d-none");
  }
</script>
    <?php include 'nav/footer.php';
    ?>