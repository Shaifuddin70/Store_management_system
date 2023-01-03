<?php include 'nav/enav.php'; 


$query = "SELECT item.item_name,issue.quantity,issue.id,issue.issue_date,employee.name FROM item JOIN issue on item.item_id=issue.item JOIN employee on issue.employee_id=employee.id order by id desc";
?>
<head> 
    <style>
        .inputbox {
    position: relative;
    width: 150px;
    padding: 10px 10px 0px;
    background: transparent;
    border: 1px solid #dddfe2;
    border-radius: 10px;
    outline: none;
    color: rgb(0, 0, 0);
    letter-spacing: .1em;
    z-index: 10;
}
    </style>
</head>

<div class="container" style="height: 0;">
<h1> Issue Report</h1>

  <table class="table table-borderless">
    <thread>
      <tr>
        <th>S/N</th>
        <th>User Name</th>
        <th>Item Name</th>
        <th>Issue Date</th>
        <th>Quantity</th>
        <th>return</th>
      </tr>
    </thread>

    <?php
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    $c=1;
    if ($total != 0) {
      while ($result = mysqli_fetch_assoc($data)) {


        echo '
                    <tr >
                    <td>' .$c . '</td>
                    <td>' . $result['name'] . '</td>
                    <td>' . $result['item_name'] . '</td>
                    <td>' . $result['issue_date'] . '</td>
                    <td>' . $result['quantity'] . '</td>
                    <td>
                    <a href="adminreturn.php? returnid='.$result['id'].'"  class="text-light"><button  class="btn btn-primary"
                    >Return</button></a>
                    </td>
            
                    </tr>';$c++;
      }
    } else {
      echo "NO records Found";
    };
    ?>
  </table>
</div>
<script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat : "dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
<?php
include 'nav/footer.php';
?>