<?php
include 'nav/enav.php';
if (isset($_SESSION['stuff'])) {
} elseif (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
$cq = "";
$iq = "";
$catagory = "";
$item = "";
if (isset($_POST['submit'])) {
    if (!empty($_POST['cat'])) {
        $catagory = $_POST['cat'];

        $q = mysqli_fetch_array(mysqli_query($conn, "SELECT *FROM item_catagory WHERE catagory_id=$catagory"));
        $qn = $q['catagory'];
        $cq = " WHERE catagory='$qn'";
    }
    if (!empty($_POST['item'])) {
        $item = $_POST['item'];
        $q = mysqli_fetch_array(mysqli_query($conn, "SELECT *FROM item WHERE item_id=$item"));
        $in = $q['item_name'];
        $iq = " WHERE item_name='$in'";
    }
}
$data = mysqli_query($conn, "SELECT item_catagory.catagory, item.item_name, item_stock.quantity,item_stock.Issued_quantity,item_stock.recieve_date,rack.name
FROM item_stock
  LEFT JOIN item_catagory ON item_stock.catagory_id = item_catagory.catagory_id
  LEFT JOIN item ON item_stock.item_id = item.item_id
  LEFT JOIN rack on item_stock.rack_id=rack.id
  $cq $iq

");
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
    <h1>All Stock Items</h1>

    <button onclick="purchaseReport()" class="btn btn-info"> Creat Report</button>
    <form method="post">
        <div class="input-group date" style="left: 200px;bottom: 35px;">
            <label for="from" class="col-1 col-form-label">Catagory</label>
            <?php
            $catagory = "SELECT * FROM item_catagory";
            $result = mysqli_query($conn, $catagory);
            ?>
            <select class="inputbox" aria-label="Default select example" name="cat" id="cat">
                <option selected disabled>Select Cat.</option>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['catagory_id']; ?>"> <?php echo $row['catagory']; ?> </option>
                <?php endwhile; ?>
            </select>
            <label for="from" class="col-1 col-form-label">Item</label>
            <?php
            $employee = "SELECT * FROM item";
            $result = mysqli_query($conn, $employee);
            ?>
            <select class="inputbox" aria-label="Default select example" name="item" id="item">
                <option selected disabled>Select item</option>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['item_id']; ?>"> <?php echo $row['item_name']; ?> </option>
                <?php endwhile; ?>
            </select>
            <input type="submit" class="btn btn-info" name="submit" value="Filter">

    </form>
    <form action="purchase.php"><button class="btn btn-primary" style="position: relative;
    left: 50px; ">Creat Purchase Requesy</button></form>


</div>
<div id="table">
    <h1 id="invisible" class="d-none">Stock Report</h1>

    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Catagory</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Issued Quantity</th>
                <th>Recieve Date</th>
                <th>Rack No</th>


            </tr>
        </thread>
        <?php
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo '
        <tr>
        <td>' . $result['catagory'] . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td>' . $result['Issued_quantity'] . '</td>
        <td>' . $result['recieve_date'] . '</td>
        <td>' . $result['name'] . '</td>

       

        </tr>';
            }
        } else {
            echo "NO records Found";
        }; ?>

    </table>
</div>
<script>
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
<?php
include 'nav/footer.php';
?>