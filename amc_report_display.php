<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$word="WHERE";
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$ITpro = mysqli_real_escape_string($conn, $_POST['ITpro']);
$bcp = mysqli_real_escape_string($conn, $_POST['bcp']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$t_cost = mysqli_real_escape_string($conn, $_POST['t_cost']);
$amc_cost = mysqli_real_escape_string($conn, $_POST['amc_cost']); 
$proce = mysqli_real_escape_string($conn, $_POST['proce']);
$expiry = mysqli_real_escape_string($conn, $_POST['expiry']);
$maintain_amt = mysqli_real_escape_string($conn, $_POST['maintain_amt']);
$bcp_1= mysqli_real_escape_string($conn, $_POST['bcp_1']);
$quantity_1= mysqli_real_escape_string($conn, $_POST['quantity_1']);
$t_cost_1= mysqli_real_escape_string($conn, $_POST['t_cost_1']);
$amc_cost_1= mysqli_real_escape_string($conn, $_POST['amc_cost_1']); 
$expiry_1= mysqli_real_escape_string($conn, $_POST['expiry_1']);
$maintain_amt_1= mysqli_real_escape_string($conn, $_POST['maintain_amt_1']);

if (strcmp($product_id, "None") !== 0)
{
$query = "SELECT * FROM amc_t WHERE product_id='$product_id' ";
}
else
{
$query = "SELECT * FROM amc_t ";
}
if (strcmp($ITpro, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and ITpro='$ITpro' ";
	} else{
    	    $query = $query . "WHERE ITpro='$ITpro' ";
}

}
if (strcmp($bcp_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($bcp_1, "lesser_than") == 0)
  {
	$query = $query . "and bcp <'$bcp'";
  }
  if (strcmp($bcp_1, "greater_than") == 0)
  {
	$query = $query . "and bcp >'$bcp'";
  }
  }
  else{
  if (strcmp($bcp_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE bcp <'$bcp'";
  }
  if (strcmp($bcp_1, "greater_than") == 0)
  {
	$query = $query . "WHERE bcp >'$bcp'";
  }
  }
}
if (strcmp($quantity_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($quantity_1, "lesser_than") == 0)
  {
	$query = $query . "and quantity <'$quantity'";
  }
  if (strcmp($quantity_1, "greater_than") == 0)
  {
	$query = $query . "and quantity >'$quantity'";
  }
  }
  else{
  if (strcmp($quantity_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE quantity <'$quantity'";
  }
  if (strcmp($quantity_1, "greater_than") == 0)
  {
	$query = $query . "WHERE quantity >'$quantity'";
  }
  }
}
if (strcmp($t_cost_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($t_cost_1, "lesser_than") == 0)
  {
	$query = $query . "and t_cost<'$t_cost'";
  }
  if (strcmp($t_cost_1, "greater_than") == 0)
  {
	$query = $query . "and t_cost >'$t_cost'";
  }
  }
  else{
  if (strcmp($t_cost_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE t_cost <'$t_cost'";
  }
  if (strcmp($t_cost_1, "greater_than") == 0)
  {
	$query = $query . "WHERE t_cost >'$t_cost'";
  }
  }
}
if (strcmp($amc_cost_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($amc_cost_1, "lesser_than") == 0)
  {
	$query = $query . "and amc_cost <'$amc_cost'";
  }
  if (strcmp($amc_cost_1, "greater_than") == 0)
  {
	$query = $query . "and amc_cost >'$amc_cost'";
  }
  }
  else{
  if (strcmp($amc_cost_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE amc_cost <'$amc_cost'";
  }
  if (strcmp($amc_cost_1, "greater_than") == 0)
  {
	$query = $query . "WHERE amc_cost>'$amc_cost'";
  }
  }
}
if (strcmp($proce, "None") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and proce='$proce' ";
	} else{
    	    $query = $query . "WHERE proce='$proce' ";
}
}
if (strcmp($expiry_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($expiry_1, "lesser_than") == 0)
  {
	$query = $query . "and expiry <'$expiry'";
  }
  if (strcmp($expiry_1, "greater_than") == 0)
  {
	$query = $query . "and expiry >'$expiry'";
  }
  }
  else{
  if (strcmp($expiry_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE expiry <'$expiry'";
  }
  if (strcmp($expiry_1, "greater_than") == 0)
  {
	$query = $query . "WHERE expiry >'$expiry'";
  }
  }
}
if (strcmp($maintain_amt_1, "None") !== 0)
{ if(strpos($query, $word) !== false){
  if (strcmp($maintain_amt_1, "lesser_than") == 0)
  {
	$query = $query . "and maintain_amt <'$maintain_amt'";
  }
  if (strcmp($maintain_amt_1, "greater_than") == 0)
  {
	$query = $query . "and maintain_amt >'$maintain_amt'";
  }
  }
  else{
  if (strcmp($maintain_amt_1, "lesser_than") == 0)
  {
	$query = $query . "WHERE maintain_amt <'$maintain_amt'";
  }
  if (strcmp($maintain_amt_1, "greater_than") == 0)
  {
	$query = $query . "WHERE maintain_amt >'$maintain_amt'";
  }
  }
}

$array_name='display_amc';
$table='amc_t';
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
</head>
<body>

<div class="container">
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product_id</th>
    	<th>IT product</th>
    	<th>Basic Cost Price</th>
    	<th>Quantity</th>
    	<th>Total Cost Price</th>
    	<th>AMC Cost</th>
    	<th>Procedure</th>
    	<th>Warranty</th>
    	<th>Other Maintenance Amount</th>
    	
      </tr>
    </thead>  

<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tbody>
 <tr>
   
   <td><?php echo $data['product_id']; ?> </td>
   <td><?php echo $data['ITpro']; ?> </td>
   <td><?php echo $data['bcp']; ?> </td>
   <td><?php echo $data['quantity']; ?> </td>
   <td><?php echo $data['t_cost']; ?> </td>
   <td><?php echo $data['amc_cost']; ?> </td>
   <td><?php echo $data['proce']; ?> </td>
   <td><?php echo $data['expiry']; ?> </td>
   <td><?php echo $data['maintain_amt']; ?> </td>

   
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
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-dark"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate PDF</button>
</form>
 <body>
 </html>
