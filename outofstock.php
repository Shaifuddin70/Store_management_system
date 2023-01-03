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
    <h1>Out of Stock Items</h1>
    <table class="table table-borderless">
        <thread>
            <tr>
            <th>Catagory</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Action</th>
                

            </tr>
        </thread>
        <?php
        $query = "select * from item_stock";
        $data = mysqli_query($conn, "
        SELECT item_catagory.catagory, item.item_name,item.item_id,item_stock.quantity,item_stock.Issued_quantity,item_stock.recieve_date
        FROM item_stock
          LEFT JOIN item_catagory ON item_stock.catagory_id = item_catagory.catagory_id
          LEFT JOIN item ON item_stock.item_id = item.item_id
        ");
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                if($result['quantity']<5)
                echo '
        <tr>
        <td>' . $result['catagory'] . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td><a href="purchase.php"  class="text-light"><button  class="btn btn-primary"
        >Pruchase</button></a></td>
       

        </tr>';
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php';?>
       