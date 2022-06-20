<?php
require_once "db.php";
if(isset($_POST['submit_btn']))
{
 	header("location: login.php");
 	exit();
}
$query = "SELECT * FROM building_details";
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
<h2>Building Details</h2>

<div class="container">
            
  <table class="table table-hover">
    <thead>
    <tr>
    <th>Building ID</th>
    <th>District</th>
    <th>Taluk</th>
    <th>Village</th>
    <th>T S no</th>
    <th>Description area</th>
    <th>Value</th>
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
   
   <td><?php echo $data['building_id']; ?> </td>
   <td><?php echo $data['district']; ?> </td>
   <td><?php echo $data['taluk']; ?> </td>
   <td><?php echo $data['village']; ?> </td>
   <td><?php echo $data['T_S_no']; ?> </td>
   <td><?php echo $data['description_area']; ?> </td>
   <td><?php echo $data['value']; ?> </td>
   <td><a href="building_details_update.php?building_id=<?php echo $data["building_id"]; ?>"><i class=' far fa-edit'></i></td>
   <td><a class="text-danger delete" href="building_details_delete.php?building_id=<?php echo $data["building_id"]; ?> "><i class='far fa-trash-alt'></i></td>
   
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
