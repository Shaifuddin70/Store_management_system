<?php include 'nav/enav.php'; ?>
<div class="container">
    <div class="title">
    <h1>Items</h1>
        <a href="add_item.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 650px;"> Add Item</button> </i></a>
    </div>

    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Item Name</th>

                <th>Reusability</th>
                <th>Catagory ID</th>
                <th>Operation</th>
            </tr>
        </thread>
        <?php

        $query = "select * from item";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $id = $_GET['selectid'];
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                if ($result['catagory_id'] == $id) {

                    echo '
                    <tr>
                    <td>' . $result['item_name'] . '</td>
                    
                    <td>' . $result['reusable'] . '</td>
                    <td>' . $result['catagory_id'] . '</td>
                    <td>
                    <a href="update.php? updateid=' . $result['item_id'] . '"  class="text-light"><button  class="btn btn-primary">Update</button></a>
                   <a href="delete.php? deleteid=' . $result['item_id'] . '"  class="text-light"><button  class="btn btn-danger">Delete</button></a>
                    </td>
            
                    </tr>';
                };
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php';
