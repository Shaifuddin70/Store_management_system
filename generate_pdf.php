<?php
//include connection file
include_once("db_connect.php");
include_once('libs/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    
    $this->SetFont('Arial','B',14);
    // Move to the right
    
    // Title
    $this->Cell(170,10,'Item Stock',0,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();

$display_heading = array('catagory_id'=>'Catagory','item_id'=> 'Item','quantity'=> 'Quantity','issued_quantity'=>'Issued Quantity','recieve_date'=> 'Recieve Date');
 

// SELECT item_catagory.catagory, item.item_name, item_stock.quantity
// FROM item_stock
//   LEFT JOIN item_catagory ON item_stock.catagory_id = item_catagory.catagory_id
//   LEFT JOIN item ON item_stock.item_id = item.item_id

$result = mysqli_query($connString, "

SELECT item_catagory.catagory, item.item_name, item_stock.quantity,item_stock.issued_quantity,item_stock.recieve_date
FROM item_stock
  LEFT JOIN item_catagory ON item_stock.catagory_id = item_catagory.catagory_id
  LEFT JOIN item ON item_stock.item_id = item.item_id
") or die("database error:". mysqli_error($connString));
$q=mysqli_query($connString,"CREATE TEMPORARY TABLE tstock AS 
SELECT
	catagory_id,
	item_id,
	quantity,
    issued_quantity,
    recieve_date
FROM
	item_stock;
");
$header = mysqli_query($connString, "SHOW COLUMNS FROM tstock");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>
