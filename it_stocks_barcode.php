<?php
require_once "db.php";
include "qrcode.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	
 	exit();
}

$query = "SELECT * FROM itstocks WHERE IT_Stocks_id='" . $_GET['IT_Stocks_id'] . "'";

$result = mysqli_query($conn, $query);
$data= mysqli_fetch_array($result);

$qc = new QRCODE();

$IT_Stocks_id=$data['IT_Stocks_id'];
$Product_Name=$data['Product_Name'];
$Brand_Name=$data['Brand_Name'];
$Model_Name=$data['Model_Name'];
$Serial_No=$data['Serial_No'];
$Complex_Name=$data['Complex_Name'];
$Court_Name=$data['Court_Name'];
$Project_Fund=$data['Project_Fund'];
$Installed_Year=$data['Installed_Year'];



$qc->TEXT("Product Name:$Product_Name\n
Brand Name:$Brand_Name\n
Model Name:$Model_Name\n
Serial No:$Serial_No\n
Complex Name:$Complex_Name\n
Court Name:$Court_Name\n
Project Fund:$Project_Fund\n
Installed Year:$Installed_Year\n");

header("location:it_stocks_barcode.php");

$qc->QRCODE(400,"$IT_Stocks_id.png");

?>
