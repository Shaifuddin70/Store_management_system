<?php
//include connection file
include_once("db_connect.php");
include_once('libs/fpdf.php');
$db = new dbObj();
$conn =  $db->getConnstring();
$id = $_GET['selectid'];
$ename = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `name` from `employee` WHERE `id`=$id"));
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    
    $this->SetFont('Arial','B',13);
    // Move to the right
    
    // Title
    $this->Cell(150,10,'Issue Item',0,0,'C');
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
 


$display_heading = array('name'=>'Name','item_name'=>'Item Name','quantity'=> 'Quantity','issue_date'=> 'Issue Date');
 

$result = mysqli_query($conn, "SELECT employee.name,item.item_name,issue.quantity, issue.issue_date
FROM issue
  LEFT JOIN item ON issue.item_id=item.item_id 
  LEFT JOIN employee ON issue.employee_id = employee.id WHERE issue.employee_id=$id") or die("database error:". mysqli_error($conn));
$q=mysqli_query($conn,"CREATE TEMPORARY TABLE uissue AS 
SELECT
	`name`,
	`item_name`,
	`quantity`,
    `issue_date`
FROM
	issue,
    item,
    employee");
$header = mysqli_query($conn, "SHOW COLUMNS FROM uissue");
 
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
