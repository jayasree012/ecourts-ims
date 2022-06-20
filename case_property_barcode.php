<?php
require_once "db.php";
include "qrcode.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	
 	exit();
}

$query = "SELECT * FROM case_property WHERE Case_No='" . $_GET['Case_No'] . "'";
$result = mysqli_query($conn, $query);
$data= mysqli_fetch_array($result);
$qc = new QRCODE();

$case_no=$data['Case_No'];
$date_of_case=$data['Date_of_case'];
$charge_sheet_no=$data['Number_of_charge_sheet'];
$name_of_the_station=$data['Name_of_the_station'];
$serial_no=$data['Serial_No'];
$valuable_property=$data['Valuable_property'];
$other_properties=$data['Other_properties'];
$initials_of_judge1=$data['Initials_of_the_Judge_or_Magistrate1'];
$particulars=$data['Particulars_of_orders'];
$section_of_law=$data['Section_of_law'];
$date_of_disposal=$data['Date_of_order_for_disposal'];
$signature_of_party=$data['Signature_of_the_party'];
$date_returned=$data['Date_returned'];
$initials_of_judge2=$data['Initials_of_the_Judge_or_Magistrate2'];
$date_of_auction=$data['Date_of_auction'];
$amount_realized=$data['Amount_realized'];
$date_of_remittance=$data['Date_of_remittance_of_male_proceeds_to_treasury'];
$initials_of_judge3=$data['Initials_of_the_Judge_or_Magistrate3'];
$remarks=$data['Remarks_or_Inspecting_Officers_(if_any)'];


$qc->TEXT("Case No:$case_no\n
Date Of case:$date_of_case\n
Number of charge sheet:$charge_sheet_no\n
Name of the station:$name_of_the_station\n
Serial No:$serial_no\n
Valuable property:$valuable_property\n
Other properties:$other_properties\n
Initials of the Judge or Magistrate1:$initials_of_judge1\n
Particulars of orders:$particulars\n
Section of law:$section_of_law\n
Date of order for disposal:$date_of_disposal\n
Signature of the party:$signature_of_party\n
Date returned:$date_returned\n
Initials of the Judge or Magistrate2:$initials_of_judge2\n
Date of auction:$date_of_auction\n
Amount realized:$amount_realized\n
Date of remittance of male proceeds to treasury:$date_of_remittance\n
Initials of the Judge or Magistrate3:$initials_of_judge3\n
Remarks:$remarks");
header("location:case_property_barcode.php");

$qc->QRCODE(400,"$case_no.png");
?>
