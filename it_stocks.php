<?php 

require_once "db.php";
// $conn = mysqli_connect("localhost", "root", "", "ims");
 if(isset($_SESSION['user_id'])!="") {
 header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
    $ProductName = mysqli_real_escape_string($conn, $_POST['Product-Name']);
    $BrandName = mysqli_real_escape_string($conn, $_POST['Brand-Name']);
    $ModelName = mysqli_real_escape_string($conn, $_POST['Model-Name']);
    $SerialNo = mysqli_real_escape_string($conn, $_POST['Serial-No']);
    $ComplexName = mysqli_real_escape_string($conn, $_POST['Complex-Name']);
    $CourtName = mysqli_real_escape_string($conn, $_POST['Court-Name']);
    $ProjectFund = mysqli_real_escape_string($conn, $_POST['Project-Fund']);
    $InstalledYear = mysqli_real_escape_string($conn, $_POST['Installed-Year']);
    
    $DateOfPurchase=mysqli_real_escape_string($conn, $_POST['DateOfPurchase']);
    $expiry=mysqli_real_escape_string($conn, $_POST['expiry']);
    
if(mysqli_query($conn, "INSERT INTO itstocks(Product_Name,Brand_Name,Model_Name,Serial_No,Complex_Name,Court_Name,Project_Fund,Installed_Year,DateOfPurchase,expiry)  VALUES('$ProductName','$BrandName','$ModelName','$SerialNo','$ComplexName','$CourtName','$ProjectFund','$InstalledYear','$DateOfPurchase','$expiry')")) {
   header("location: home.php");
   exit();
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

  <h2>Data Entry for IT Stocks</h2>

  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="row">
      <div class="col-25">
        <label for="Product-Name">Product-Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Product-Name" name="Product-Name" pattern="[a-zA-Z]+" oninvalid="alert('Enter a valid Product-Name ');" required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Brand-Name">Brand-Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Brand-Name" name="Brand-Name" pattern="[a-zA-Z]+" oninvalid="alert('Enter a valid Brand-Name name');" required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Model-Name">Model-Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Model-Name" name="Model-Name" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid Model-Name name');" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Serial-No">Serial-No</label>
      </div>
      <div class="col-75">
        <input type="text" id="Serial-No" name="Serial-No" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid Serial-No ');"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Complex-Name">Complex-Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Complex-Name" name="Complex-Name" pattern="[a-z A-Z [-]a-zA-Z]+" oninvalid="alert('Enter a valid Complex-Name ');"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Court-Name">Court-Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Court-Name" name="Court-Name" pattern="[a-z A-Z]+" oninvalid="alert('Enter a valid Court-Name');"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Project-Fund">Project-Fund</label>
      </div>
      <div class="col-75">
        <input type="text" id="Project-Fund" name="Project-Fund" pattern="[a-zA-Z[-]a-zA-Z[-]a-zA-Z]+" oninvalid="alert('Enter a valid Project-Fund');"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Installed-Year">Installed-Year</label>
      </div>
      <div class="col-75">
        <input type="text" id="Installed-Year" name="Installed-Year" pattern="[0-9]+" oninvalid="alert('Enter a valid Installed-Year');"required>
      </div>
    </div>
    
    <div class="row">
        <div class="col-25">
          <label>Date Of Purchase</label>
        </div>
        <div class="col-75">
          <input type="date" name="DateOfPurchase" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label>Expiry</label>
        </div>
        <div class="col-75">
          <input type="date" name="expiry" class="form-control" value="" maxlength="50" required="">
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
