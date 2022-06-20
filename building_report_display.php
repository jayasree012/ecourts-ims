<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$word="WHERE";
$building_id = mysqli_real_escape_string($conn, $_POST['building_id']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$taluk = mysqli_real_escape_string($conn, $_POST['taluk']);
$village = mysqli_real_escape_string($conn, $_POST['village']);
$t_s_no = mysqli_real_escape_string($conn, $_POST['t_s_no']);
$description_area = mysqli_real_escape_string($conn, $_POST['description_area']); 
$value = mysqli_real_escape_string($conn, $_POST['value']);
$value_1 = mysqli_real_escape_string($conn, $_POST['value_1']);

if (strcmp($building_id, "None") !== 0)
{
$query = "SELECT * FROM building_details WHERE building_id='$building_id' ";
}
else
{
$query = "SELECT * FROM building_details ";
}
if (strcmp($district, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and district='$district' ";
	} else{
    	    $query = $query . "WHERE district='$district' ";
}

}
if (strcmp($taluk, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and taluk='$taluk' ";
	} else{
    	    $query = $query . "WHERE taluk='$taluk' ";
    	    }
}
if (strcmp($village, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and village='$village' ";
	} else{
    	    $query = $query . "WHERE village='$village' ";
    	    }
}
if (strcmp($t_s_no, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and T_S_no='$t_s_no' ";
	} else{
    	    $query = $query . "WHERE T_S_no='$t_s_no' ";
    	    }
}
if (strcmp($value_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($value_1, "lesser_than") == 0)
  {
	$query = $query . "and value <'$value'";
  }
  if (strcmp($value_1, "greater_than") == 0)
  {
	$query = $query . "and value >'$value'";
  }
  }
  else{
  if (strcmp($value_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE value <'$value'";
  }
  if (strcmp($value_1, "greater_than") == 0)
  {
	$query = $query . "WHERE value >'$value'";
  }
  }
}

$array_name='display_building';
$table='building_details';
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
       <th>Building ID</th>
    <th>District</th>
    <th>Taluk</th>
    <th>Village</th>
    <th>T S no</th>
    <th>Description area</th>
    <th>Value</th>
        
    	
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
