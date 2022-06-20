<?php
require_once "db.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	exit();
}
$query = "SELECT * FROM case_property";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
h2{
margin-top:15px;
margin-left:15px;
font-family: Georgia, serif;
font-size:25px;
font-weight:bolder;
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
</style>
  
</head>
<body>
 <h2>Case Property Details</h2>
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
<th>Generate QR code</th>
<th>Edit</th>
<th>Delete</th>
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

 <td><a href="case_property_barcode.php?Case_No=<?php echo $data["Case_No"]; ?>"><i class="fa fa-qrcode"></i></td>
<td><a href="case_property_update.php?Case_No=<?php echo $data['Case_No']; ?>"><i class=' far fa-edit'></i></td>
<td><a class="text-danger delete" href="case_property_delete.php?Case_No=<?php echo $data['Case_No']; ?>"><i class='far fa-trash-alt'></i></td>
   
 </tr>
 </tbody>
 </div>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table>
 </body>
 </html>

