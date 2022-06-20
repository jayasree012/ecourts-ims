<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$word="WHERE";
$IT_Stocks_id = mysqli_real_escape_string($conn, $_POST['IT_Stocks_id']);
$Product_Name = mysqli_real_escape_string($conn, $_POST['Product_Name']);
$Brand_Name = mysqli_real_escape_string($conn, $_POST['Brand_Name']);
$Model_Name = mysqli_real_escape_string($conn, $_POST['Model_Name']);
$Serial_No = mysqli_real_escape_string($conn, $_POST['Serial_No']);
$Complex_Name = mysqli_real_escape_string($conn, $_POST['Complex_Name']); 
$Court_Name = mysqli_real_escape_string($conn, $_POST['Court_Name']);
$Project_Fund = mysqli_real_escape_string($conn, $_POST['Project_Fund']);
$Installed_Year = mysqli_real_escape_string($conn, $_POST['Installed_Year']);

if (strcmp($IT_Stocks_id, "None") !== 0)
{
$query = "SELECT * FROM itstocks WHERE IT_Stocks_id='$IT_Stocks_id' ";
}
else
{
$query = "SELECT * FROM itstocks ";
}
if (strcmp($Product_Name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Product_Name='$Product_Name' ";
	} else{
    	    $query = $query . "WHERE Product_Name='$Product_Name' ";
}

}
if (strcmp($Brand_Name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Brand_Name='$Brand_Name' ";
	} else{
    	    $query = $query . "WHERE Brand_Name='$Brand_Name' ";
    	    }
}
if (strcmp($Model_Name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Model_Name='$Model_Name' ";
	} else{
    	    $query = $query . "WHERE Model_Name='$Model_Name' ";
    	    }
}
if (strcmp($Serial_No, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Serial_No='$Serial_No' ";
	} else{
    	    $query = $query . "WHERE Serial_No='$Serial_No' ";
    	    }
}
if (strcmp($Complex_Name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Complex_Name='$Complex_Name' ";
	} else{
    	    $query = $query . "WHERE Complex_Name='$Complex_Name' ";
    	    }
}

if (strcmp($Court_Name, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Court_Name='$Court_Name' ";
	} else{
    	    $query = $query . "WHERE Court_Name='$Court_Name' ";
    	    }
}

if (strcmp($Project_Fund, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Project_Fund='$Project_Fund' ";
	} else{
    	    $query = $query . "WHERE Project_Fund='$Project_Fund' ";
    	    }
}

if (strcmp($Installed_Year, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and Installed_Year='$Installed_Year' ";
	} else{
    	    $query = $query . "WHERE Installed_Year='$Installed_Year' ";
    	    }
}

$table='itstocks';
$array_name='display_itstock';

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
        <th>IT Stocks ID</th>
    	<th>Product Name</th>
    	<th>Brand Name</th>
    	<th>Model Name</th>
    	<th>Serial No</th>
    	<th>Complex Name</th>
    	<th>Court Name</th>
        <th>Project Fund</th>
        <th>Installed Year</th>
        <th>Date of Purchase</th>
        <th>Date of Expiry</th>
    	
      </tr>
    </thead>  
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tbody>
 <tr>
   
   <td><?php echo $data['IT_Stocks_id']; ?> </td>
   <td><?php echo $data['Product_Name']; ?> </td>
   <td><?php echo $data['Brand_Name']; ?> </td>
   <td><?php echo $data['Model_Name']; ?> </td>
   <td><?php echo $data['Serial_No']; ?> </td>
   <td><?php echo $data['Complex_Name']; ?> </td>
   <td><?php echo $data['Court_Name']; ?> </td>
   <td><?php echo $data['Project_Fund']; ?> </td>
   <td><?php echo $data['Installed_Year']; ?> </td>
   <td><?php echo $data['DateOfPurchase']; ?> </td>
   <td><?php echo $data['expiry']; ?> </td>

   
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
