<?php
include 'nav/enav.php';
if(isset($_SESSION['admin'])){
    

}elseif(isset($_SESSION['stuff'])){}
else{
    echo "<script>alert('Unautorized Access')</script>";
    echo "<script>window.location='employeelogin.php'</script>";
}
?>

<div class="container">
<div class="title">
    <span class="text">All Items</span>
    <a href="add_item.php" class="text"><button class="btn btn-primary" style="position: relative;
    left: 700px;"> Add Item</button> </i></a>
</div>



        <table class="table table-borderless">
            <thread>
                <tr>
                    <th>Catagory</th>
                    <th>Item Name</th>
                    <th>Reusability</th>
                    <th>Operation</th>



                </tr>
            </thread>
            <?php

            $query = "select * from item";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    $cid = $result['catagory_id'];
                    $cname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `item_catagory` WHERE catagory_id='$cid'"));

                    echo '
        <tr>
        <td>' . $cname['catagory'] . '</td>
        <td>' . $result['item_name'] . '</td>
        <td>' . $result['reusable'] . '</td>
        
        <td>
        <a href="update.php? updateid=' . $result['item_id'] . '"  class="text-light"><button  class="btn btn-primary"
        ><i class="bx bxs-edit-alt" ></i></a>
        <a href="delete.php? deleteid=' . $result['item_id'] . '"  class="text-light"><button  class="btn btn-danger"><i class="bx bxs-trash" ></i></button></a>
        </td>

        </tr>';
                }
            } else {
                echo "NO records Found";
            };



            include 'nav/footer.php';
