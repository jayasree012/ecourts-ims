<?php
require_once "db.php";
include "qrcode.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	
 	exit();
}

$query = "SELECT * FROM furniture_details where furniture_id='" . $_GET['furniture_id'] . "'";
$result = mysqli_query($conn, $query);
$data= mysqli_fetch_array($result);
$qc = new QRCODE();

$furniture_id=$data['furniture_id'];
$furniture_name=$data['furniture_name'];
$date_of_purchase=$data['date_of_purchase'];
$court_id=$data['court_id'];
$court_name=$data['court_name'];
$department_name=$data['department_name']; 
$room_id=$data['room_id']; 

$qc->TEXT("Furniture id:$furniture_id\nFurniture_name=$furniture_name\nDate of purchase: $date_of_purchase\nCourt_id: $court_id\nCourt_name: $court_name\n Department name: $department_name\nRoom id/name:$room_id");


$qc->QRCODE(400,"$furniture_id.png");

header("location:furniture_details_display.php");

?>
