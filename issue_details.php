<?php include 'nav/enav.php';
$query = "SELECT item.item_name,issue.id, issue.quantity,issue.employee_id,issue.issue_date FROM issue INNER JOIN item ON item.item_id=issue.item";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$id = $_GET['selectid'];
$ename = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `name` from `employee` WHERE `id`=$id"));
?>
<div class="container">

    <h1> Items issued under <?php echo $ename['name']; ?> </h1>

   
    <table class="table table-borderless">
        <thread>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Issue Date</th>
                <th>Operation</th>
            </tr>
        </thread>
        <?php
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                if ($result['employee_id'] == $id) {

                    echo '
                    <tr>
                    <td>' . $result['item_name'] . '</td>
                    <td>' . $result['quantity'] . '</td>
                    <td>' . $result['issue_date'] . '</td>
                    <td>
                    <a href="adminreturn.php? returnid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary"
                    >Return</button></a>
                    </td>        
            
                    </tr>';
                };
            }
        } else {
            echo "NO records Found";
        };

        include 'nav/footer.php';
