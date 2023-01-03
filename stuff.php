<?php include 'nav/enav.php';

?>


<div class="container">
<br><br><br><br>
<div class="home-content">
        <span class="text">Catagory</span>
    </div>
    <a href="add_catagory.php" class="text"><button class="btn btn-primary my-5">Add New Catagory</button></a>
      
        <table class="table table">
            <thread>
                <tr>
                    <th>Catagory ID</th>
                    <th>Item Catagory</th>
                    <th>Operation</th>
                </tr>
            </thread>
            <?php
           
            $query = "select * from item_catagory";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                 
                    echo '
        <tr>
        <td>' . $result['catagory_id'] . '</td>
        <td>' . $result['catagory'] . '</td>
        <td>
        <a href="view.php? selectid='.$result['catagory_id'].'"  class="text-light"><button  class="btn btn-primary"
        >View Items</button></a></td>
        </tr>';
                }
            } 
            else {
                echo "NO records Found";
            };
 

            include 'nav/footer.php';