<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$word="WHERE";
$Case_No = mysqli_real_escape_string($conn, $_POST['Case_No']);
$Name_of_the_station = mysqli_real_escape_string($conn, $_POST['Name_of_the_station']);

$Date_of_case = mysqli_real_escape_string($conn, $_POST['Date_of_case']);
$Date_of_case_1 = mysqli_real_escape_string($conn, $_POST['Date_of_case_1']);

$Section_of_law  = mysqli_real_escape_string($conn, $_POST['Section_of_law']);
$Date_of_order_for_disposal = mysqli_real_escape_string($conn, $_POST['Date_of_order_for_disposal']);
$Date_of_order_for_disposal_1 = mysqli_real_escape_string($conn, $_POST['Date_of_order_for_disposal_1']);

$Date_returned = mysqli_real_escape_string($conn, $_POST['Date_returned']);
$Date_returned_1 = mysqli_real_escape_string($conn, $_POST['Date_returned_1']);


$Date_of_auction = mysqli_real_escape_string($conn, $_POST['Date_of_auction']);
$Date_of_auction_1 = mysqli_real_escape_string($conn, $_POST['Date_of_auction_1']);

$Date_of_remittance_of_male_proceeds_to_treasury = mysqli_real_escape_string($conn, $_POST['Date_of_remittance_of_male_proceeds_to_treasury']);
$Date_of_remittance_of_male_proceeds_to_treasury_1 = mysqli_real_escape_string($conn, $_POST['Date_of_remittance_of_male_proceeds_to_treasury_1']);


$Amount_realized = mysqli_real_escape_string($conn, $_POST['Amount_realized']);
$Amount_realized1 = mysqli_real_escape_string($conn, $_POST['Amount_realized1']);

if (strcmp($Case_No, "None") !== 0)
{
$query = "SELECT * FROM case_property WHERE Case_No='$Case_No' ";
}
else
{
$query = "SELECT * FROM case_property ";
}

if (strcmp($Name_of_the_station, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Name_of_the_station='$Name_of_the_station' ";
	} else{
    	    $query = $query . "WHERE Name_of_the_station='$Name_of_the_station' ";
}

}
if (strcmp($Date_of_case_1, "None") !== 0)
{ 
if(strpos($query, $word) !== false)
{
  if (strcmp($Date_of_case_1, "lesser_than") == 0)
  {
	$query = $query . "and Date_of_case <'$Date_of_case'";
  }
  if (strcmp($Date_of_case_1, "greater_than") == 0)
  {
	$query = $query . "and Date_of_case >'$Date_of_case'";
  }
  if (strcmp($Date_of_case_1, "on") == 0)
  {
	$query = $query . "and Date_of_case ='$Date_of_case'";
  }
  }
  else{
  if (strcmp($Date_of_case_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Date_of_case <'$Date_of_case'";
  }
  if (strcmp($Date_of_case_1, "greater_than") == 0)
  {
	$query = $query . "WHERE Date_of_case >'$Date_of_case'";
  }
  if (strcmp($Date_of_case_1, "on") == 0)
  {
	$query = $query . "WHERE Date_of_case ='$Date_of_case'";
  }
  }
}
if (strcmp($Section_of_law , "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Section_of_law ='$Section_of_law' ";
	}
	else{
    	    $query = $query . "WHERE Section_of_law ='$Section_of_law' ";
    	    }
}

if (strcmp($Date_of_order_for_disposal_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($Date_of_order_for_disposal_1, "lesser_than") == 0)
  {
	$query = $query . "and Date_of_order_for_disposal <'$Date_of_order_for_disposal'";
  }
  if (strcmp($Date_of_order_for_disposal_1, "greater_than") == 0)
  {
	$query = $query . "and Date_of_order_for_disposal >'$Date_of_order_for_disposal'";
  }
  if (strcmp($Date_of_order_for_disposal_1, "on") == 0)
  {
	$query = $query . "and Date_of_order_for_disposal ='$Date_of_order_for_disposal'";
  }
  }
  else{
  if (strcmp($Date_of_order_for_disposal_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Date_of_order_for_disposal <'$Date_of_order_for_disposal'";
  }
  if (strcmp($Date_of_order_for_disposal_1, "greater_than") == 0)
  {
	$query = $query . "WHERE Date_of_order_for_disposal >'$Date_of_order_for_disposal'";
  }
  if (strcmp($Date_of_order_for_disposal_1, "on") == 0)
  {
	$query = $query . "WHERE Date_of_order_for_disposal ='$Date_of_order_for_disposal'";
  }
  }
}

if (strcmp($Date_returned_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($Date_returned_1, "lesser_than") == 0)
  {
	$query = $query . "and Date_returned <'$Date_returned'";
  }
  if (strcmp($Date_returned_1, "greater_than") == 0)
  {
	$query = $query . "and Date_returned >'$Date_returned'";
  }
  if (strcmp($Date_returned_1, "on") == 0)
  {
	$query = $query . "and Date_returned ='$Date_returned'";
  }
  }
  else{
  if (strcmp($Date_returned_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Date_returned <'$Date_returned'";
  }
  if (strcmp($Date_returned_1, "greater_than") == 0)
  {
	$query = $query . "WHERE Date_returned >'$Date_returned'";
  }
  if (strcmp($Date_returned_1, "on") == 0)
  {
	$query = $query . "WHERE Date_returned ='$Date_returned'";
  }
  }
}


if (strcmp($Date_of_auction_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($Date_of_auction_1, "lesser_than") == 0)
  {
	$query = $query . "and Date_of_auction <'$Date_of_auction'";
  }
  if (strcmp($Date_of_auction_1, "greater_than") == 0)
  {
	$query = $query . "and Date_of_auction >'$Date_of_auction'";
  }
  if (strcmp($Date_of_auction_1, "on") == 0)
  {
	$query = $query . "and Date_of_auction ='$Date_of_auction'";
  }
  }
  else{
  if (strcmp($Date_of_auction_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Date_of_auction <'$Date_of_auction'";
  }
  if (strcmp($Date_of_auction_1, "greater_than") == 0)
  {
	$query = $query . "WHERE Date_of_auction >'$Date_of_auction'";
  }
  if (strcmp($Date_of_auction_1, "on") == 0)
  {
	$query = $query . "WHERE Date_of_auction ='$Date_of_auction'";
  }
  }
}

if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "lesser_than") == 0)
  {
	$query = $query . "and Date_of_remittance_of_male_proceeds_to_treasury <'$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "greater_than") == 0)
  {
	$query = $query . "and Date_of_remittance_of_male_proceeds_to_treasury >'$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "on") == 0)
  {
	$query = $query . "and Date_of_remittance_of_male_proceeds_to_treasury ='$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  }
  else{
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Date_of_remittance_of_male_proceeds_to_treasury <'$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "greater_than") == 0)
  {
	$query = $query . "WHERE Date_of_remittance_of_male_proceeds_to_treasury >'$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  if (strcmp($Date_of_remittance_of_male_proceeds_to_treasury_1, "on") == 0)
  {
	$query = $query . "WHERE Date_of_remittance_of_male_proceeds_to_treasury ='$Date_of_remittance_of_male_proceeds_to_treasury'";
  }
  }
}

if (strcmp($Amount_realized1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($Amount_realized1, "lesser_than") == 0)
  {
	$query = $query . "and Amount_realized <'$Amount_realized'";
  }
  if (strcmp($Amount_realized1, "greater_than") == 0)
  {
	$query = $query . "and Amount_realized >'$Amount_realized'";
  }
  }
  else{
  if (strcmp($Amount_realized1, "lesser_than") == 0)
  {
	$query = $query . "WHERE Amount_realized <'$Amount_realized'";
  }
  if (strcmp($Amount_realized1, "greater_than") == 0)
  {
	$query = $query . "WHERE Amount_realized >'$Amount_realized'";
  }
  }
}

$array_name='display_case';
$table='case_property';

$result = mysqli_query($conn, $query);
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <style>
* {
  box-sizing: border-box;
}

.container {
  margin-top: 25px;
  border-radius: 10px;
   background-color: white;
  padding: 10px 10px;
  margin-left:10px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  {
    width: 100%;
    margin-top: 0;
  }
}
</style><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>

<div class="container">
            
  <table class="table table-hover">
    <thead>
      <tr>
   <th>Case No</th>
<th>Date of case</th>
<th>Number of charge sheet</th>
<th>Name of the station</th>
<th>Serial No</th>
<th>Valuable property</th>
<th>Other properties</th>
<th>Initials of the Judge or Magistrate1</th>
<th>Particulars of orders</th>
<th>Section of law</th>
<th>Date of order for disposal</th>
<th>Signature of the party</th>
<th>Date returned</th>
<th>Initials of the Judge or Magistrate2</th>
<th>Date of auction</th>
<th>Amount realized</th>
<th>Date of remittance of male proceeds to treasury</th>
<th>Initials of the Judge or Magistrate3</th>
<th>Remarks or Inspecting Officers (if any)</th>
    	
      </tr>
    </thead>  

<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tbody>
 <tr>
   
 <td><?php echo $data['Case_No']; ?> </td>
<td><?php echo $data['Date_of_case']; ?> </td>
<td><?php echo $data['Number_of_charge_sheet']; ?> </td>
<td><?php echo $data['Name_of_the_station']; ?> </td>
<td><?php echo $data['Serial_No']; ?> </td>
<td><?php echo $data['Valuable_property']; ?> </td>
<td><?php echo $data['Other_properties']; ?> </td>
<td><?php echo $data['Initials_of_the_Judge_or_Magistrate1']; ?> </td>
<td><?php echo $data['Particulars_of_orders']; ?> </td>
<td><?php echo $data['Section_of_law']; ?> </td>
<td><?php echo $data['Date_of_order_for_disposal']; ?> </td>
<td><?php echo $data['Signature_of_the_party']; ?> </td>
<td><?php echo $data['Date_returned']; ?> </td>
<td><?php echo $data['Initials_of_the_Judge_or_Magistrate2']; ?> </td>
<td><?php echo $data['Date_of_auction']; ?> </td>
<td><?php echo $data['Amount_realized']; ?> </td>
<td><?php echo $data['Date_of_remittance_of_male_proceeds_to_treasury']; ?> </td>
<td><?php echo $data['Initials_of_the_Judge_or_Magistrate3']; ?> </td>
<td><?php echo $data['Remarks_or_Inspecting_Officers_(if_any)']; ?> </td>

   
 <tr>
 <tbody>
 </div>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table>
 <form class="form-inline" method="post" action="generate_pdf.php?query=<?php echo $query; ?>&&table=<?php echo $table; ?>&&head=<?php echo $array_name; ?>">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-dark"><i class="fa fa-pdf" aria-hidden="true"></i>
Generate PDF</button>
</form>
 <body>
 </html>
