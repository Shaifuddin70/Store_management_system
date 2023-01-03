<?php
require_once 'db_connect.php';
$db = new dbObj();
$conn =  $db->getConnstring();
require 'vendor/autoload.php';
use Dompdf\Dompdf;

?>

<body>
    <h1>Purchase Report</h1>
    <table>
        <th>cata</th>
    </table>
</body>

</html>