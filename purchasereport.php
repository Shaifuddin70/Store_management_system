<?php
include 'nav/enav.php';
require 'vendor/autoload.php';

use Dompdf\Dompdf;

if (isset($_SESSION['stuff'])) {
} elseif (isset($_SESSION['admin'])) {
} else {
  echo "<script>alert('Unautorized Access')</script>";
  echo "<script>window.location='employeelogin.php'</script>";
}
$sub_sql = "";

if (isset($_POST['submit'])) {

  if ($_POST['from'] == null) {
    $from = '01/01/1998';
  } else {
    $from = $_POST['from'];
  }
  if ($_POST['to'] == null) {
    $to = '01/01/2098';
  } else {
    $to = $_POST['to'];
  }

  $fromarr = explode("/", $from);
  $from = $fromarr['2'] . '-' . $fromarr['1'] . '-' . $fromarr['0'];

  $toarr = explode("/", $to);
  $to = $toarr['2'] . '-' . $toarr['1'] . '-' . $toarr['0'];

  $sub_sql = "where date>='$from' && date<='$to'";
}
$data = mysqli_query($conn, "SELECT item_catagory.catagory, item.item_name, purchase_table.quantity,purchase_table.status,purchase_table.date
FROM purchase_table
  LEFT JOIN item_catagory ON purchase_table.catagory = item_catagory.catagory_id
  LEFT JOIN item ON purchase_table.name = item.item_id $sub_sql order by id desc");
?>

<head>
  <style>
    .inputbox {
      position: relative;
      width: 150px;
      padding: 10px 10px 0px;
      background: transparent;
      border: 1px solid #dddfe2;
      border-radius: 10px;
      outline: none;
      color: rgb(0, 0, 0);
      letter-spacing: .1em;
      z-index: 10;
    }
  </style>
</head>
<div class="container">
  <h1>Purchase Report</h1>
  <button onclick="purchaseReport()" class="btn btn-info"> Creat Report</button>

  <form method="post">
    <div class="input-group date" style="left: 350px;
    bottom: 35px;">
      <label for="from" class="col-1 col-form-label">From</label>
      <input type="text" id="from" class="inputbox"  name="from" autocomplete="off">
      <label for="to" class="col-0 col-form-label">to</label>
      <input type="text" id="to" class="inputbox"  name="to" autocomplete="off">
      <input type="submit" class="btn btn-info" name="submit" value="Filter">
  </form>
</div>
<div id="table">
  <h1 id="invisible" class="d-none">Purchase Report</h1>
  <table class="table table">

    <thread>
      <tr>
        <th>S/N</th>
        <th>Catagory</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Purchase Date</th>

      </tr>
    </thread> <?php
              $total = mysqli_num_rows($data);
              $c = 1;
              if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {

                  if ($result['status'] == 1) {

                    echo '
      <tr>
      <td>' . $c . '</td>
      <td>' . $result['catagory'] . '</td>
      <td>' . $result['item_name'] . '</td>
      <td>' . $result['quantity'] . '</td>
      <td>' . $result['date'] . '</td>
      </tr>';
                    $c++;
                  }
                }
              } else {
                echo "NO records Found";
              }; ?>
  </table>
</div>

<script>
  $(function() {
    var dateFormat = "dd/mm/yy",
      from = $("#from")
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "dd/mm/yy",
      })
      .on("change", function() {
        to.datepicker("option", "minDate", getDate(this));
      }),
      to = $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "dd/mm/yy",
      })
      .on("change", function() {
        from.datepicker("option", "maxDate", getDate(this));
      });

    function getDate(element) {
      var date;
      try {
        date = $.datepicker.parseDate(dateFormat, element.value);
      } catch (error) {
        date = null;
      }

      return date;
    }
  });

  const purchaseReport = () => {
    $("#invisible").removeClass("d-none");
    var divName = "table";
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    $("#invisible").addClass("d-none");
  }
</script>

<?php include 'nav/footer.php'; ?>