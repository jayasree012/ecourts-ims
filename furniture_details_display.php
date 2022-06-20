<?php
require_once "db.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	exit();
}
$query = "SELECT * FROM furniture_details";
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
<h2>Furniture Details</h2>
<div class="container">
            
  <table class="table table-hover">
    <thead>
  <tr>
    <th>Furniture ID</th>
    <th>Furniture name</th>
    <th>Date of purchase</th>
    <th>Court ID</th>
    <th>Court name</th>
    <th>Department name</th>
    <th>Room name/id</th>
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
   
   <td><?php echo $data['furniture_id']; ?> </td>
   <td><?php echo $data['furniture_name']; ?> </td>
   <td><?php echo $data['date_of_purchase']; ?> </td>
   <td><?php echo $data['court_id']; ?> </td>
   <td><?php echo $data['court_name']; ?> </td>
   <td><?php echo $data['department_name']; ?> </td>
   <td><?php echo $data['room_id']; ?> </td>
   <td><a href="furniture_details_barcode.php?furniture_id=<?php echo $data["furniture_id"]; ?>"><i class="fa fa-qrcode"></i></td>
   <td><a href="furniture_details_update.php?furniture_id=<?php echo $data["furniture_id"]; ?>"><i class=' far fa-edit'></i></td>
   <td><a class="text-danger delete" href="furniture_details_delete.php?furniture_id=<?php echo $data["furniture_id"]; ?>?furniture_name=<?php echo $data["furniture_name"]; ?>"><i class='far fa-trash-alt'></i></td>
   
 <tr>
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
 

