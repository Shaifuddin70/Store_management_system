<?php include 'nav/enav.php';

?>
<head>
   
    <title>Employee Panel</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>


    <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h1>Issued Items</h1>
                    <p>*All the items, that are issued on your name is shown below:</p>
                    <table class="table table">
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>request Date</th>
                            <th>Action</th>

                        </tr>
                        <tr><?php
                            $id = $_SESSION['eid'];
                            $_SESSION['request_id'] = $id;
                            $query = "SELECT item.item_name,issue.quantity,issue.issue_date,issue.status,issue.id FROM item INNER JOIN issue on item.item_id=issue.item_id WHERE issue.employee_id='$id'";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);
                            if ($total != 0) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    if($result['status']==1){
                                        echo '
                                        <tr>
                                        <td>' . $result['item_name'] . '</td> 
                                        <td>' . $result['quantity'] . '</td> 
                                        <td>' . $result['issue_date'] . '</td>
                                        <td><a href="return.php? returnid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary"
                                        >Return</button></a></td>
                                        </tr>';

                                    }
                                   
                                }
                            } else {
                                echo "NO records Found";
                            };
                            ?>
                    </table>
                </div>
            </div>

            
                </div>
     
     
    <?php include 'nav/footer.php';
?>