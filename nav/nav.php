<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Store Management System </title>
  <link rel="stylesheet" href="nav/navstyle.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <script src="Jquery/jquery.js"></script>

</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">WELLCOME</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="employee.php">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="catagory.php">Category</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="catagory.php">
            <i class='bx bx-collection'></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="catagory.php">Category</a></li>
          <li><a href="catagory.php">Item Catagory</a></li>
          <li><a href="item.php">Item</a></li>
          <li><a href="stock.php">Stock</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="issue_table.php">
            <i class='bx bxs-store'></i>
            <span class="link_name">Issue</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Issue</a></li>
          <li><a href="issue_table.php">Issue Table</a></li>
          <li><a href="item_request.php">Pending_request</a></li>
          <li><a href="purchase_request.php">Purchase Request</a></li>
          <li><a href="purchase_recieve.php">Purchase Recieve</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="employeepanel.php">
            <i class='bx bxs-user'></i>
            <span class="link_name">Employee Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="employeepanel.php">Employee Panel</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="image/user.png" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name">

              <div class="job"></div>
            </div>
            <a href="logout.php"> <i class='bx bx-log-out'></i></a>
          </div>
      </li>
    </ul>
  </div>
  <section class="home-section">


    <div class="home-content">
      <i class='bx bx-menu'></i>
    </div>



  </section>


  <script src="nav/script.js"></script>

</body>

</html>