<?php include 'nav/enav.php';


?>
<head>
    <title>Employee Panel</title>
</head>

<div class="home-content">
<div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h1>Issued Items</h1>
                    <p>*All the items, that are issued on your name is shown below:</p>
                    <table class="table table">
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Issue Date</th>
                            <th>Return</th>

                        </tr>
                        <tr><?php
                            $id = $_SESSION['eid'];
                            $_SESSION['request_id'] = $id;
                            $query = "SELECT item.item_name,issue.quantity,issue.issue_date,issue.id FROM item INNER JOIN issue on item.item_id=issue.item WHERE issue.employee_id='$id'";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);
                            if ($total != 0) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    
                                        echo '
                                        <tr>
                                        <td>' . $result['item_name'] . '</td> 
                                        <td>' . $result['quantity'] . '</td> 
                                        <td>' . $result['issue_date'] . '</td>
                                        <td><a href="return.php? returnid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary"
                                        >Return</button></a></td>
                                        </tr>';

                                 
                                   
                                }
                            } else {
                                echo "NO records Found";
                            };
                            ?>
                    </table>
                </div>
            </div>

            <p>&ensp;&ensp;&ensp;&ensp;</p>
            <div class="card">
                <div class="card-body">
                    <form action="issue_connect.php" method="post">
                        <h1>Request New Items</h1>
                        <p>*Here you can request for new item.</p>
                        <?php
            if (isset($_SESSION['status'])) {
                echo "<h4>" . $_SESSION['status'] . "<h4>";
                unset($_SESSION['status']);
            }
            ?>
                        <div class="container mt-3">
                           
                            <table class="table table-borderless">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Catagory name</th>
                                    <th>Item name</th>
                                    <th>Quantity</th>
                                </tr>
                                <tr>
                                    <td><?php
                                        
                                        $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id`='$id'");
                                        $fetch = mysqli_fetch_array($query);
                                        ?>
                                        <input type="text" class=" form-control form-control-lg" required="true" value="<?php echo '' . $fetch['name'] . '' ?>">
                                    </td>
                                    </td>
                                    <td>
                                        <?php
                                        $catagory = "SELECT * FROM item_catagory";
                                        $result = mysqli_query($conn, $catagory);
                                        ?>
                                        <select class="form-control form-control-lg" aria-label="Default select example" name="catagory" id="catagory">
                                            <option selected disabled>Select catagory</option>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <option value="<?php echo $row['catagory_id']; ?>"> <?php echo $row['catagory']; ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control form-control-lg" aria-label="Default select example" name="item" id="item">
                                            <option selected disabled>Select Item</option>

                                        </select>
                                    </td>
                                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="quantity" placeholder="Item Quantity"></td>
                                </tr>
                            </table>
                            <script>
                                // catagory item
                                $('#catagory').on('change', function() {
                                    var catagory_id = this.value;
                                    console.log(catagory_id);
                                    $.ajax({
                                        url: 'ajax/item.php',
                                        type: "POST",
                                        data: {
                                            catagory_data: catagory_id
                                        },
                                        success: function(result) {
                                            $('#item').html(result);
                                            //console.log(result);
                                        }
                                    })
                                });
                            </script>
                            <div class="button">
                                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
     
<?php  include 'nav/footer.php';?>