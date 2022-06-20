<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$word="WHERE";
$furniture_id = mysqli_real_escape_string($conn, $_POST['furniture_id']);
$furniture_name = mysqli_real_escape_string($conn, $_POST['furniture_name']);
$court_id = mysqli_real_escape_string($conn, $_POST['court_id']);
$court_name = mysqli_real_escape_string($conn, $_POST['court_name']);
$department_name = mysqli_real_escape_string($conn, $_POST['department_name']); 
$room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
$date_of_purchase = mysqli_real_escape_string($conn, $_POST['date_of_purchase']);
$date_of_purchase_1 = mysqli_real_escape_string($conn, $_POST['date_of_purchase_1']);


if (strcmp($furniture_id, '') !== 0)
{
$query = "SELECT * FROM furniture_details WHERE furniture_id='$furniture_id' ";
}
else
{
$query = "SELECT * FROM furniture_details ";
}
if (strcmp($furniture_name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and furniture_name='$furniture_name' ";
	} else{
    	    $query = $query . "WHERE furniture_name='$furniture_name' ";
}

}
if (strcmp($court_id, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and court_id='$court_id' ";
	} else{
    	    $query = $query . "WHERE court_id='$court_id' ";
    	    }
}
if (strcmp($court_name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and court_name='$court_name' ";
	} else{
    	    $query = $query . "WHERE court_name='$court_name' ";
    	    }
}
if (strcmp($department_name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and department_name='$department_name' ";
	} else{
    	    $query = $query . "WHERE department_name='$department_name' ";
    	    }
}
if (strcmp($room_id , "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and room_id ='$room_id ' ";
	} else{
    	    $query = $query . "WHERE room_id ='$room_id ' ";
    	    }
}

if (strcmp($date_of_purchase_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($date_of_purchase_1, "lesser_than") == 0)
  {
	$query = $query . "and date_of_purchase <'$date_of_purchase'";
  }
  if (strcmp($date_of_purchase_1, "greater_than") == 0)
  {
	$query = $query . "and date_of_purchase >'$date_of_purchase'";
  }
  if (strcmp($date_of_purchase_1, "on") == 0)
  {
	$query = $query . "and date_of_purchase ='$date_of_purchase'";
  }
  }
  else{
  if (strcmp($date_of_purchase_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE date_of_purchase <'$date_of_purchase'";
  }
  if (strcmp($date_of_purchase_1, "greater_than") == 0)
  {
	$query = $query . "WHERE date_of_purchase >'$date_of_purchase'";
  }
  if (strcmp($date_of_purchase_1, "on") == 0)
  {
	$query = $query . "WHERE date_of_purchase ='$date_of_purchase'";
  }
  }
}

$array_name='display_furniture';
$table='furniture_details';
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
</style>
  
</head>
<body>

<div class="container">
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Furniture ID</th>
    	<th>Furniture Name</th>
    	<th>Court ID</th>
    	<th>Court Name</th>
    	<th>Department Name</th>
    	<th>Room ID</th>
    	<th>Date of Purchase</th>
    	
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
   <td><?php echo $data['court_id']; ?> </td>
   <td><?php echo $data['court_name']; ?> </td>
   <td><?php echo $data['department_name']; ?> </td>
   <td><?php echo $data['room_id']; ?> </td>
   <td><?php echo $data['date_of_purchase']; ?> </td>

   
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
