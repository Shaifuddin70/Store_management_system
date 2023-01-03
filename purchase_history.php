<?php
include 'nav/enav.php';
if(isset($_SESSION['stuff'])){
    

}elseif(isset($_SESSION['admin'])){

}
else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
    <h1>Purchase History</h1>
    <form class="form-inline" method="post" action="#">

</form>
 
    <table class="table table-borderless">
        <thread>
            <tr>
            <th>Catagory</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Purchase Date</th>

            </tr>
        </thread>
        <?php
        $query = "select * from order_table";
        $data = mysqli_query($conn, " SELECT item_catagory.catagory, item.item_name, purchase_table.quantity,purchase_table.status,purchase_table.date
        FROM purchase_table
          LEFT JOIN item_catagory ON purchase_table.catagory = item_catagory.catagory_id
          LEFT JOIN item ON purchase_table.name = item.item_id order by id desc");
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                if($result['status']==1)
                echo '
        <tr>
        <td>' . $result['catagory'] . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td>' . $result['date'] . '</td>
       

       

        </tr>';
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php';?>
       