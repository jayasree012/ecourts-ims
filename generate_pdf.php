<?php
//include connection file 
include_once("db.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(20,10,'Report','C');
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


$display_building = array('building_id'=>'Building id', 'district'=> 'District', 'taluk'=> 'Taluk','village'=> 'Village','T_S_no'=> 'Town Survey No','description_area'=>'Description Area','value'=> 'Value');
$display_furniture = array('furniture_id'=>'Furniture ID', 'furniture_name'=> 'Furniture Name', 'date_of_purchase'=> 'Date of Purchase','court_id'=> 'Court ID','court_name'=> 'Court Name','department_name'=> 'Department Name','room_id'=> 'Room ID');

$display_case = array(
'Case_No'=>'Case No',
'Date_of_case'=>'Date of case',
'Number_of_charge_sheet'=>'Number of charge sheet',
'Name_of_the_station'=>'Name of the station',
'Serial_No'=>'Serial No',
'Valuable_property'=>'Valuable property',
'Other_properties' =>'Other properties',
'Initials_of_the_Judge_or_Magistrate1'=>'Initials of the Judge or Magistrate1',
'Particulars_of_orders'=>'Particulars of orders',
'Section_of_law'=>'Section of law',
'Date_of_order_for_disposal'=>'Date of order for disposal',
'Signature_of_the_party'=>'Signature of the party',
'Date_returned'=>'Date returned',
'Initials_of_the_Judge_or_Magistrate2'=>'Initials of the Judge or Magistrate2',
'Date_of_auction'=>'Date of auction',
'Amount_realized' =>'Amount realized',
'Date_of_remittance_of_male_proceeds_to_treasury'=>'Date of remittance of male proceeds to treasury',
'Initials_of_the_Judge_or_Magistrate3'=>'Initials of the Judge or Magistrate3',
'Remarks_or_Inspecting_Officers_(if_any)' =>'Remarks or Inspecting Officers (if any)');

$display_itstock= array('IT_Stocks_id'=>'ID', 'Product_Name'=> 'Product Name', 'Brand_Name'=> 'Brand Name','Model_Name'=> 'Model Name','Serial_No'=> 'Serial No','Complex_Name'=> 'Complex Name','Court_Name'=> 'Court Name','Project_Fund'=> 'Project Fund','Installed_Year'=> 'Installed Year','DateOfPurchase'=>'Date Of Purchase','expiry'=>'Date Of Expiry');

$display_amc=array('product_id'=>'Product_id','ITpro'=>'IT Product','bcp'=>'Basic Cost Price','quantity'=>'quantity','t_cost'=>'Total Cost Price','amc_cost'=>'AMC Cost','proce'=>'procedure',
'expiry'=>'Warranty Period','maintain_amt'=>'Other Amount');

$array_n=$_GET['head'];
$result = mysqli_query($conn,$_GET['query']) or die("database error:". mysqli_error($connString));

$header = mysqli_query($conn, "SHOW columns FROM ".$_GET['table']);

$pdf = new PDF();
//header

$pdf->AddPage();

//footer page

$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);

foreach($header as $heading) {
if(strcmp($array_n, "display_building") == 0){
$pdf->Cell(40,12,$display_building[$heading['Field']],1);
}
if(strcmp($array_n, "display_furniture") == 0){
$pdf->Cell(40,12,$display_furniture[$heading['Field']],1);
}
if(strcmp($array_n, "display_case") == 0){
$pdf->Cell(40,12,$display_case[$heading['Field']],1);
}
if(strcmp($array_n, "display_itstock") == 0){
$pdf->Cell(40,12,$display_itstock[$heading['Field']],1);
}
if(strcmp($array_n, "display_amc") == 0){
$pdf->Cell(40,12,$display_amc[$heading['Field']],1);
}
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}

$pdf->Output();
?>
