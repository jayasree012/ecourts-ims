<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE amc_t set ITpro='" . $_POST['ITpro'] . "', bcp='" . $_POST['bcp'] . "', t_cost='" . $_POST['cost'] . "',quantity='" . $_POST['quantity'] . "' ,amc_cost='" . $_POST['amccost'] . "',
proce='" .$_POST['procedure'] . "',expiry='" . $_POST['warranty'] . "',
maintain_amt='" . $_POST['mainamt'] . "' WHERE product_id='" . $_POST['product_id'] . "'");
header("Location: amc_display.php");
$message = "Record Modified Successfully";

}
$result = mysqli_query($conn,"SELECT * FROM amc_t WHERE product_id='" . $_GET['product_id'] . "'");
$row= mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #413F42;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position:relative;
  left:50%;
  font-size:15px;
}

input[type=submit]:hover {
  background-color: #7F8487;
}
.space{
  padding:20px 0px 0px 0px;
  
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>AMC Details</h2>


<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Description of IT Products</label>
      </div>
      <div class="col-75">
        <select name="ITpro" id="ITpro" value="<?php echo $row['ITpro']; ?>"required>
      <option value="Server">Server-HP</option>
      <option value="KVM">KVM_SWITCH</option>
      <option value="UPS">1_KVA_UPS</option>
      <option value="Laptop">Laptop</option>
      <option value="Projector">Projector</option>
      <option value="Printer">Printer</option>
      <option value="Scanner">Scanner</option>
      </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Basic Cost Price(Per Unit)</label>
      </div>
      <div class="col-75">
        <input type="text" id="bcp"   name="bcp" pattern="[0-9]+" oninvalid="alert('Enter the Basic cost price');" class="container" value="<?php echo $row['bcp']; ?>" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="quantity">Quantity in Nos</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity" name="quantity" pattern="[0-9]+" oninvalid="alert('Enter the Quantity');" class="container" value="<?php echo $row['quantity']; ?>" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="t_s_no">Total Cost Price in Rs.</label>
      </div>
      <div class="col-75">
        <input type="text" id="cost" name="cost" pattern="[0-9]+" oninvalid="alert('Enter the Total cost price');" class="container" value="<?php echo $row['t_cost']; ?>" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="description_area">AMC Cost not exceeding 10% as per G.O.Ms.No.1 dated 03.03.2005</label>
      </div>
      <div class="col-75">
         <input type="text" id="amccost" name="amccost" class="container" pattern="[0-9]+" oninvalid="alert('Enter a valid value');" value ="<?php echo $row['amc_cost']; ?>" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="value">Procedure under Phase I of e-courts Projects/ Phase II of e-courts Project /State Government funds:</label>
      </div>
      <div class="col-75">
     <select name="procedure" id="procedure" value="<?php echo $row['proce']; ?>">
        <option value="Procedure1">Procedure1</option>
         <option value="Procedure2">Procedure2</option>
           <option value="Procedure3">Procedure3</option>
       </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="value">Expiry of Warrant Period:</label>
      </div>
      <div class="col-75">
        <input type="text" id="warranty" name="warranty" pattern="[0-9]+" class="container" value="<?php echo $row['expiry']; ?>" oninvalid="alert('Enter the warranty period');" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="value">Other Maintenance amount required in Financial Year:</label>
      </div>
      <div class="col-75">
        <input type="text" id="mainamt" name="mainamt" pattern="[0-9]+" class="container" value="<?php echo $row['maintain_amt']; ?>" oninvalid="alert('Enter the amount');" required>
      </div>
    </div>
    
    <div class="row">
      <div class="space">
      <input type="submit" value="Update" name="submit">
      </div>
    </div>
    <input type="hidden" id="product_id" name="product_id" value="<?php echo $row['product_id']; ?>" required>
  </form>
</div>

</body>
</html>
