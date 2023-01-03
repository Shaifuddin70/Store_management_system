<?php include 'nav/enav.php';

$sub_sql = "";
$eq="";
$iq="";
$emp="";
$item="";
if (isset($_POST['submit'])) {
    if(!empty($_POST['emp'])){
       $emp=$_POST['emp'];
        $eq=" AND employee_id='$emp'";
    }
    if(!empty($_POST['item'])){
        $item=$_POST['item'];
         $iq=" AND item_id='$item'";
     }

    if($_POST['from']==null){
        $from = '01/01/1998';
    }else{
        $from = $_POST['from'];
    }
    if($_POST['to']==null){
        $to = '01/01/2098';
    }else{
        $to = $_POST['to'];
    }
    
    $fromarr = explode("/", $from);
    $from = $fromarr['2'] . '-' . $fromarr['1'] . '-' . $fromarr['0'];
    
    $toarr = explode("/", $to);
    $to = $toarr['2'] . '-' . $toarr['1'] . '-' . $toarr['0'];
    
    $sub_sql = "where issue_date>='$from' && issue_date<='$to' ";
}
// SELECT item.item_name,issue.quantity,issue.id,issue.issue_date,employee.name FROM item JOIN issue on item.item_id=issue.item_id JOIN employee on issue.employee_id=employee.id JOIN item on item.item_id=issue.item_id where issue_date>='$from' && issue_date<='$to' & employee_id='1' && item_id='14' order by id desc
$query = "SELECT item.item_name,issue.quantity,issue.id,issue.issue_date,employee.name FROM item JOIN issue on item.item_id=issue.item JOIN employee on issue.employee_id=employee.id $sub_sql $eq $iq order by id desc";
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

<div class="container" style="height: 0;">
    <h1> Issue Report</h1>
    <button onclick="purchaseReport()" class="btn btn-info"> Creat Report</button>
    <form method="post">
                <div class="input-group date" style="left: 200px;bottom: 35px;">
                    <label for="from" class="col-1 col-form-label">Employee</label>
                    <?php
                        $employee = "SELECT * FROM employee";
                        $result = mysqli_query($conn, $employee);
                        ?>
                        <select class="inputbox" aria-label="Default select example" name="emp" id="emp">
                            <option selected disabled>Select Emp.</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
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
                    <label for="from" class="col-1 col-form-label">From</label>
                    <input type="text" id="from" class="inputbox"  name="from"  autocomplete="off">
                    <label for="to" class="col-0 col-form-label">to</label>
                    <input type="text" id="to" class="inputbox" name="to"  autocomplete="off">
                    <input type="submit" class="btn btn-info" name="submit" value="Filter">
              
            </form>
</div>
<div id="table">
  <h1 id="invisible" class="d-none"  >Issue Report</h1>
<table class="table ">
    <thread>
        <tr>
            <th>S/N</th>
            <th>User Name</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Issue Date</th>

        </tr>
    </thread>

    <?php
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    $c = 1;
    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {


            echo '
                    <tr >
                    <td>' . $c . '</td>
                    <td>' . $result['name'] . '</td>
                    <td>' . $result['item_name'] . '</td>
                    <td>' . $result['quantity'] . '</td>
                    <td>' . $result['issue_date'] . '</td>
                    
                    <td>
                    </td>
            
                    </tr>';
            $c++;
        }
    } else {
        echo "NO records Found";
    };
    ?>
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
    var divName= "table";
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