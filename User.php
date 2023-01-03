<?php include 'nav/nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Item Lists</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
  h2 {
    display: inline-flex;
    padding: 0px 0px 0px;
    color: coral;
  }

  img {
    border-radius: 50px;
    width: 50px;
    padding: 10px 10px 10px;
  }
</style>

<body>

  <div class="container">
    <h1>All Registered User</h1>
    <a href="home.php" class="text-light"><button class="btn btn-primary my-5">Home</button></a>


    <table class="table table">
      <thread>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>NID</th>
        </tr>
      </thread>
      <?php
      include("db_connect.php");
      $query = "select * from user";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);
      if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {

          echo '
        <tr>
        <td>' . $result['username'] . '</td>
        <td>' . $result['email'] . '</td>
        <td>' . $result['p_number'] . '</td>
        <td>' . $result['nid'] . '</td>
        </tr>';
        }
      } else {
        echo "NO records Found";
      };
