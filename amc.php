<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
$ITpro = mysqli_real_escape_string($conn, $_POST['ITpro']);
$bcp = mysqli_real_escape_string($conn, $_POST['bcp']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
$amccost = mysqli_real_escape_string($conn, $_POST['amccost']);
$procedure = mysqli_real_escape_string($conn, $_POST['procedure']);
$warranty = mysqli_real_escape_string($conn, $_POST['warranty']);
$mainamt = mysqli_real_escape_string($conn, $_POST['mainamt']);

// database insert SQL code
if(mysqli_query($conn, "INSERT INTO `amc_t`(`ITpro`, `bcp`, `quantity`, `t_cost`, `amc_cost`, `proce`, `expiry`, `maintain_amt`) VALUES ('$ITpro', $bcp, $quantity, $cost,$amccost,'$procedure',$warranty,$mainamt)"))
{
  header("location: home.php");
   exit();
} else {
}
mysqli_close($conn);
}
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

<h2>Data Entry for AMC Details</h2>


<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Description of IT Products</label>
      </div>
      <div class="col-75">
        <select name="ITpro" id="ITpro">
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
        <input type="text" id="bcp"   name="bcp" pattern="[0-9]+" oninvalid="alert('Enter the Basic cost price');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="quantity">Quantity in Nos</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity" name="quantity" pattern="[0-9]+" oninvalid="alert('Enter the Quantity');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="cost">Total Cost Price in Rs.</label>
      </div>
      <div class="col-75">
        <input type="text" id="cost" name="cost" pattern="[0-9]+" oninvalid="alert('Enter the Total cost price');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="amccost">AMC Cost not exceeding 10% as per G.O.Ms.No.1 dated 03.03.2005</label>
      </div>
      <div class="col-75">
         <input type="text" id="value" name="amccost" value="" class="container" pattern="[0-9]+" oninvalid="alert('Enter a valid value');"required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="value">Procedure under Phase I of e-courts Projects/ Phase II of e-courts Project /State Government funds:</label>
      </div>
      <div class="col-75">
     <select name="procedure" id="procedure">
       <option value="Choose">Procedure1</option>
         <option value="Choose">Procedure2</option>
           <option value="Choose">Procedure3</option>
       </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="warranty">Expiry of Warrant Period:</label>
      </div>
      <div class="col-75">
        <input type="text" id="warranty" name="warranty" pattern="[0-9]+" class="container" value="" oninvalid="alert('Enter the warranty period');" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="mainamt">Other Maintenance amount required in Financial Year:</label>
      </div>
      <div class="col-75">
        <input type="text" id="mainamt" name="mainamt" pattern="[0-9]+" class="container" value="" oninvalid="alert('Enter the amount');" required>
      </div>
    </div>
    
    <div class="row">
      <div class="space">
      <input type="submit" value="Submit" name="submit">
      </div>
    </div>
    
  </form>
</div>

</body>
</html>
