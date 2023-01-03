<?php
include 'nav/enav.php';
if (isset($_SESSION['stuff'])) {
} elseif (isset($_SESSION['admin'])) {
} else {
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}

$results_per_page = 12;

//find the total number of results stored in the database  
$query = "select *from item_request";
$result = mysqli_query($conn, $query);
$number_of_result = mysqli_num_rows($result);

//determine the total number of pages available  
$number_of_page = ceil($number_of_result / $results_per_page);

//determine which page number visitor is currently on  
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page - 1) * $results_per_page;

//retrieve the selected results from database   
$data = mysqli_query($conn, "SELECT item.item_name, item_request.quantity,employee.name,item_request.id,item_request.status,item_request.request_date
        FROM item_request
        LEFT JOIN employee ON item_request.employee_id = employee.id
          LEFT JOIN item ON item_request.item_id = item.item_id "); 
        //    LIMIT " . $page_first_result . ',' . $results_per_page)
?>

<div class="container">
    <h1>Request History</h1>
    <form class="form-inline" method="post" action="#">

    </form>
    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Employee Name</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Request Date</th>
                <th>Status</th>

            </tr>
        </thread>
        <?php
       

        $query = "select * from item_request";

        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo '
        <tr>
        
        <td>' . $result['name'] . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['quantity'] . '</td>
        <td>' . $result['request_date'] . '</td>';

                if ($result['status'] == 1) {
                    echo '<td class="text-success">Accepted</td>';
                } else if ($result['status'] == 0) {
                    echo '<td class="text-danger">Rejected</td>';
                }
                echo
                '</tr>';
            }
        } else {
            echo "NO records Found";
        };
         ?>
    </table>
</div>


<!-- <?php
// for ($page = 1; $page <= $number_of_page; $page++) {
//     echo ' <div class="pagination" style="position: relative;
//         display: inline-block;
//         padding: 500px;
//         left: 200px;
//         list-style: none;
//         border-radius: 0.25rem;"><li class="page-item"><a href = "requesthistory.php?page=' . $page . '" class="page-link">' . $page . ' </a></li></div>
//         ';
// }  ?> -->

<?php include 'nav/footer.php'; ?>