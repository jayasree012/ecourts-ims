<?php
require_once "db.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	exit();
}
$query = "SELECT * FROM call_booking where status='Pending'";
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
</head>
<body>

<div class="container">
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Call ID</th>
    	<th>Name</th>
    	<th>Department</th>
    	<th>Inter com no</th>
    	<th>User Mail id</th>
    	<th>Property</th>
    	<th>Date of call booking</th>
    	<th>Block</th>
    	<th>Problem</th>
    	<th>Done</th>
      </tr>
    </thead>  

<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tbody>
 <tr>
   
   <td><?php echo $data['call_id']; ?> </td>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['dept']; ?> </td>
   <td><?php echo $data['intercom_number']; ?> </td>
   <td><?php echo $data['mail_id']; ?> </td>
   <td><?php echo $data['property']; ?> </td>
   <td><?php echo $data['date_time']; ?> </td>
   <td><?php echo $data['block']; ?> </td>
   <td><?php echo $data['problem']; ?> </td>
 
   <td><a href="call_details_delete.php?call_id=<?php echo $data["call_id"]; ?>">Done</td>
   
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
 <body>
 </html>
