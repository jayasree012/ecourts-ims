<?php
require_once "db.php";

if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}


$query = "SELECT * FROM itstocks WHERE DATEDIFF(expiry,CURRENT_DATE)<=7";
$result = mysqli_query($conn, $query);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
 

body{
	font-family: 'Roboto', sans-serif;
}
.card{
	width: 60%;
	border: none;
	border-radius: 20px;
	margin:auto;
	padding:10px 10px 10px 10px;
	background-color: #f2f2f2;
	
}
h1{
margin-top:15px;
margin-left:15px;
font-family: Georgia, serif;
font-size:25px;
font-weight:bolder;

}
h4{
	color: black;
}
h2{
	color: red;
}
  </style>
  
 
</head>
<body>
<h1>Notifications</h1>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <div class="container d-flex justify-content-center">
	<div class="card mt-5 p-3">
		<div class="media">
  			
  			<div class="media-body">
      

    			<h2 class="mt-2 mb-0">Warranty Period for <?php echo $data['IT_Stocks_id']; ?> IT Product <?php echo $data['Product_Name']; ?> will expire by <?php echo $data['expiry']; ?> </h2>
    			    
    			
    			<h4><u><center>More Details</center></u></h4>
    			<h4>Brand Name : <?php echo $data['Brand_Name']; ?></h4>
    			<h4>Model Name : <?php echo $data['Model_Name']; ?></h4> 
    			
    			<h4>Complex Name : <?php echo $data['Complex_Name']; ?></h4>
    			<h4>Court Name :<?php echo $data['Court_Name']; ?>  </h4> 
  			</div>
		</div>
	</div>
</div>

 <br>
<br>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table>
 </body>
 </html>
 
