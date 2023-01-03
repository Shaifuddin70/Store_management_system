<?php
session_start();
include 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
// stock notification
$query = mysqli_query($conn, "Select *from item_stock");
$total = mysqli_num_rows($query);
$c = 0;
if ($total != 0) {
    while ($result =  mysqli_fetch_assoc($query)) {
        if ($result['quantity'] < 5) {
            $c++;
        }
    }
}
// issue notification
$iquery = mysqli_query($conn, "Select *from item_request");
$itotal = mysqli_num_rows($iquery);
$i = 0;
if ($itotal != 0) {
    while ($iresult =  mysqli_fetch_assoc($iquery)) {
        if ($iresult['status'] == null) {
            $i++;
        }
    }
}
// purcahse notification
$pquery = mysqli_query($conn, "Select *from order_table");
$ptotal = mysqli_num_rows($pquery);
$p = 0;
if ($ptotal != 0) {
    while ($presult =  mysqli_fetch_assoc($pquery)) {
        if ($presult['status'] == null) {
            $p++;
        }
    }
}
// Notice
$nquery = mysqli_query($conn, "SELECT * FROM `item_request` WHERE `employee_id`='$_SESSION[eid]'");
$ntotal = mysqli_num_rows($nquery);
$n = 0;
if ($ntotal != 0) {
    while ($nresult =  mysqli_fetch_assoc($nquery)) {
        if ($nresult['status'] == 1) {
            $n++;
        }
    }
}

// receive notification
$purquery = mysqli_query($conn, "SELECT * FROM `purchase_table`");
$purtotal = mysqli_num_rows($purquery);
$pur = 0;
if ($purtotal != 0) {
    while ($purresult =  mysqli_fetch_assoc($purquery)) {
        if ($purresult['status'] == null) {
            $pur++;
        }
    }
}

?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="nav/adminstyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="Jquery/jquery.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Store Management System</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="image/user.png" alt="">
            </div>


            <span class="logo_name"> <?php

                                        $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id`='$_SESSION[eid]'");
                                        $fetch = mysqli_fetch_array($query);
                                        echo $fetch['name'];
                                        ?></span>
        </div>
<!-- admin section -->
        <div class="menu-items">
            <ul class="nav-links">
                <?php if (isset($_SESSION['admin'])) {
                    echo ' <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="item_request.php">
                <i class="uil uil-user-arrows"></i>
                    <span class="link-name">Issue Request</span>
                    ' ?>
                    <?php
                    if ($i != 0) echo '
                        <span style="position: absolute; top: -0.1px;left: 170px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                        ' . $i . '</span>'

                    ?>

                    <?php echo '
                </a></li>
                <li><a href="purchase_request.php">
                <i class="uil uil-wallet"></i>
                    <span class="link-name">Purchase Request</span>
                    ' ?>
                    <?php
                    if ($p != 0) echo '
                        <span style="position: absolute; top: -0.1px;left: 210px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                        ' . $p . '</span>'

                    ?>

                    <?php echo '
                </a></li>
                <li><a href="stock.php">
                <i class="uil uil-shop"></i>
                    <span class="link-name">Stock</span>
                </a></li>
                <li><a href="catagory.php">
                <i class="uil uil-database-alt"></i>
                <span class="link-name">Catagory</span>
                </a></li>
                <li><a href="item.php">
                <i class="uil uil-apps"></i>
                <span class="link-name">Item</span>
                </a></li>
                <li><a href="issue.php">
                <i class="uil uil-check-circle"></i>
                    <span class="link-name">Issued item</span>
                </a></li>
                <li><a href="employeepanel.php">
                <i class="uil uil-user-check"></i>
                    <span class="link-name">Employee Panel</span>
                </a></li>
                <li><a href="outofstock.php">
                <i class="uil uil-bell"></i>
                    <span class="link-name">Out of Stock</span>' ?>
                    <?php
                    if ($c != 0) echo '
                        <span style="position: absolute; top: -0.1px;left: 160px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                        ' . $c . '</span>'?><?php echo'
                    </a></li>
                <li><a href="reports.php">
                <i class="uil uil-user-check"></i>
                <span class="link-name">Reports</span>
                </a></li>
                </a></li>
                <li><a href="options.php">
                <i class="uil uil-icons"></i>
                <span class="link-name">Options</span>
                </a></li>';
                } elseif (isset($_SESSION['stuff'])) {
                    echo ' <li><a href="purchase_recieve.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Recieve Order</span>' ?>
                    <?php
                    if ($pur != 0) echo '
                        <span style="position: absolute; top: -0.1px;left: 170px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                        ' . $pur . '</span>'

                    ?>

                    <?php echo '
                </a></li>
                <li><a href="catagory.php">
                <i class="uil uil-database-alt"></i>
                    <span class="link-name">Catagory</span>
                </a></li>
                <li><a href="item.php">
                <i class="uil uil-apps"></i>
                <span class="link-name">Item</span>
                </a></li>
                <li><a href="stock.php">
                <i class="uil uil-shop"></i>
                    <span class="link-name">Stock</span>
                </a></li>
                <li><a href="outofstock.php">
                <i class="uil uil-bell"></i>
                    <span class="link-name">Out of Stock</span>' ?>
                    <?php
                    if ($c != 0) echo '
                        <span style="position: absolute; top: -0.1px;left: 160px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                        ' . $c . '</span>'

                    ?>

<!-- employee section -->

                <?php echo '</a></li>
                 <li><a href="employeepanel.php">
                 <i class="uil uil-user-check"></i>
                     <span class="link-name">Employee Panel</span>
                 </a></li>
                 <li><a href="notification.php">
                    <i class="uil uil-bell"></i>
                        <span class="link-name">Notification</span>' ?>
                    <?php
                    if ($n != 0) echo '
                            <span style="position: absolute; top: -0.1px;left: 160px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                            ' . $n . '</span>'

                    ?>

                <?php echo '</a></li>';
                } elseif (isset($_SESSION['employee'])) {
                    echo ' <li><a href="employeepanel.php">
                    <i class="uil uil-user-check"></i>
                        <span class="link-name">Employee Panel</span>
                    </a></li>
                    <li><a href="notification.php">
                    <i class="uil uil-bell"></i>
                        <span class="link-name">Notification</span>' ?>
                    <?php
                    if ($n != 0) echo '
                            <span style="position: absolute; top: -0.1px;left: 160px;padding: 0.1px 9px;border-radius: 50%;background: red;color: white;">
                            ' . $n . '</span>'

                    ?>

                <?php echo '</a></li>';
                }
                ?>
            </ul>

            <ul class="logout-mode">
            <li><a href="profile.php">
            <i class="uil uil-user-circle"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <li><a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <div class="mode-toggle">

                </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div class="dash-content">