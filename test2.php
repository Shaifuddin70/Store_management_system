<?php
include 'nav/enav.php';
if (isset($_SESSION['stuff'])) {
} elseif (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}

$results_per_page = 10;  
  
//find the total number of results stored in the database  
$query = "select *from alphabet";  
$result = mysqli_query($conn, $query);  
$number_of_result = mysqli_num_rows($result);  

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM alphabet LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
?>

<div class="container">
    <h1>Request History</h1>
    <form class="form-inline" method="post" action="#">

    </form>
    <table class="table table-borderless">
        <thread>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Request Date</th>
                <th>Status</th>

            </tr>
        </thread>
        <?php
        $c = 1;
        $query = "select * from item_request";
        $data = mysqli_query($conn, "
        SELECT item.item_name, item_request.quantity,item_request.nstatus,item_request.request_date
        FROM item_request
          LEFT JOIN item ON item_request.item_id = item.item_id
        ");
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo '
        <tr>
        <td>' . $c . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td>' . $result['request_date'] . '</td>
        <td>'. $result['nstatus']. '</td>

        </tr>';
                $c++;
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php'; ?>