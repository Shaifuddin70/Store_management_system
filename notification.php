<?php include 'nav/enav.php';

?>
<div class="container">
<div class="title">

    <span class="text">Notification</span>
    
</div>
            
                  
                    <table class="table table-borderless">
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Issue Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        <tr><?php
                            $id = $_SESSION['eid'];
                            $_SESSION['request_id'] = $id;
                            $query = "SELECT item.item_name,item_request.quantity,item_request.request_date,item_request.nstatus,item_request.status,item_request.id FROM item INNER JOIN item_request on item.item_id=item_request.item_id WHERE item_request.employee_id='$id'";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);
                            if ($total != 0) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    if($result['nstatus']==1){
                                        echo '
                                        <tr>
                                        <td>' . $result['item_name'] . '</td> 
                                        <td>' . $result['quantity'] . '</td> 
                                        <td>' . $result['request_date'] . '</td>';
            
                                        if ($result['status'] == 1) {
                                            echo '<td class="text-success">Accepted</td>';
                                        } else if ($result['status'] == 0) {
                                            echo '<td class="text-danger">Rejected</td>';
                                        }
                                        echo
                                        '

                                        <td><a href="read.php? readid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary"
                                        >Read</button></a></td>
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
