<?php
include 'nav/enav.php';
$id = $_GET['invoiceid'];
$sql = "SELECT *FROM `order_table` WHERE `id`='$id'";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$catagory = $result['catagory'];
$name = $result['name'];
$quantity = $result['quantity'];
$invoice = mysqli_fetch_array(mysqli_query($conn, "SELECT item_catagory.catagory,item.item_name,order_table.quantity FROM order_table JOIN  item ON item.item_id=order_table.name JOIN Item_catagory on item_catagory.catagory_id=order_table.catagory WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="invoice.css" rel="stylesheet" />
  <title>Document</title>
</head>

<body>


  <div class="page-content container">
    <div class="page-header text-blue-d2">
      <h1 class="page-title text-secondary-d1">
        Invoice
        <small class="page-info">
          <i class="fa fa-angle-double-right text-80"></i>
          ID: <?php echo $id ?>
        </small>
      </h1>

      <div class="page-tools">
        <div class="action-buttons">
          <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
            <button onclick="invoice()" class="btn btn-info">Print</button>
          </a>

        </div>
      </div>
    </div>


    <div class="container px-0" id="invoice">
      <div class="row mt-4">
        <div class="col-12 col-lg-12">
          <div class="row">
            <div class="col-12">
              <div class="text-center text-150">
                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                <span class="text-default-d3">Kaicom Solutions.</span>
              </div>
            </div>
          </div>
          <!-- .row -->

          <hr class="row brc-default-l1 mx-n1 mb-4" />

          <div class="row">
            <div class="col-sm-6">


            </div>
            <!-- /.col -->

            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
              <hr class="d-sm-none" />
              <div class="text-grey-m2">
                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                  <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Invoice ID:</span> <?php echo $id ?>
                </div>

                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <span>
                    <script>
                      document.write(new Date().toLocaleDateString());
                    </script>
                  </span></div>


              </div>
            </div>
            <!-- /.col -->
          </div>


              <!-- or use a table instead -->

              <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                  <thead class="bg-none bgc-default-tp1">
                    <tr class="text-white">
                      <th class="opacity-2">Catagory</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th width="140">Total Amount</th>
                    </tr>
                  </thead>

                  <tbody class="text-95 text-secondary-d3">
                    <tr></tr>
                    <tr>
                      <td><?php echo $invoice['catagory']; ?></td>
                      <td><?php echo $invoice['item_name']; ?></td>
                      <td><?php echo $invoice['quantity']; ?></td>
                      <td class="text-95"></td>
                      <td class="text-secondary-d2"></td>
                    </tr>
                  </tbody>
                </table>
              </div>


              <div class="row mt-3">
                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                  Offer your best price.
                </div>

                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                  <div class="row my-2">
                    <div class="col-7 text-right">
                      SubTotal
                    </div>
                    <div class="col-5">
                      <span class="text-120 text-secondary-d1"></span>
                    </div>
                  </div>

                  <div class="row my-2">
                    <div class="col-7 text-right">
                      Tax
                    </div>
                    <div class="col-5">
                      <span class="text-110 text-secondary-d1"></span>
                    </div>
                  </div>

                  <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                    <div class="col-7 text-right">
                      Total Amount
                    </div>
                    <div class="col-5">
                      <span class="text-150 text-success-d3 opacity-2"></span>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <div>
                <span class="text-secondary-d1 text-105">Thank you for your business</span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- or use a table instead -->
    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            -->

    <hr />


  </div>
  </div>
  </div>
  </div>
  </div>
</body>

</html>
<script>
  const invoice = () => {

    var divName = "invoice";
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

  }
</script>
<?php
include 'nav/footer.php';
?>