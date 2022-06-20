<?php
require_once "db.php";
if(isset($_SESSION['mu_id'])!="") {
header("Location: system_user_dashboard.php");
}

if (isset($_POST['submit'])) {
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$dept = mysqli_real_escape_string($conn, $_POST['dept']);
$intercom_number = mysqli_real_escape_string($conn, $_POST['intercom_number']);
$mail_id = mysqli_real_escape_string($conn, $_POST['mail_id']);
$property = mysqli_real_escape_string($conn, $_POST['property']);
$block = mysqli_real_escape_string($conn, $_POST['block']);
$problem = mysqli_real_escape_string($conn, $_POST['problem']);

// database insert SQL code
if(mysqli_query($conn, "INSERT INTO `call_booking`(`user_id`, `name`, `dept`, `intercom_number`, `mail_id`, `property`, `block`, `problem`) VALUES ('$user_id', '$name', '$dept', '$intercom_number', '$mail_id', '$property', '$block', '$problem')"))
                         
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

input[type=text], input[type=email],select, textarea {
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

<h2>Call Booking Details</h2>


<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="user_id">User_id</label>
      </div>
      <div class="col-75">
        <input type="text" id="user_id"   name="user_id" pattern="[0-9A-Z a-z]+" oninvalid="alert('Enter a valid Id');" class="container" value="<?php echo $_SESSION['mu_id']; ?>" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" pattern="[0-9A-Z a-z]+" oninvalid="alert('Enter the correct name');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="dept">Department</label>
      </div>
      <div class="col-75">
      <input type="text" name="dept" id="dept" pattern="[0-9A-Z a-z]+" oninvalid="alert('Enter the correct dept');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="intercom_number">Intercom Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="intercom_number" name="intercom_number" pattern="[0-9]+" oninvalid="alert('Enter the correct number');" class="container" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="mail_id">Mail Id</label>
      </div>
      <div class="col-75">
         <input type="email" id="mail_id" name="mail_id" value="" class="container"  oninvalid="alert('Enter a valid Mail Id');"required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="property">Property</label>
      </div>
      <div class="col-75">
        <select name="property" id="property">
      <option value="Server">Server-HP</option>
      <option value="KVM">KVM_SWITCH</option>
      <option value="UPS">1_KVA_UPS</option>
      <option value="Laptop">Laptop</option>
      <option value="Projector">Projector</option>
      <option value="Printer">Printer</option>
      <option value="Scanner">Scanner</option>
      <option value="Fan">Fan</option>
      <option value="Tubelight">Tubelight</option>
      <option value="Regulator">Regulator</option>
      </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="block">Block</label>
      </div>
      <div class="col-75">
        <input type="text" id="block" name="block" pattern="[0-9A-Z a-z]+" class="container" value="" oninvalid="alert('Enter correct the Block');" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="problem">Problem</label>
      </div>
      <div class="col-75">
       <textarea id="description_area" id="problem" name="problem"  class="container" value="" style="height:200px" required></textarea>
        
      </div>
    </div>
    
    <div class="row">
      <div class="space">
      <input type="submit" value="Book Call" name="submit">
      </div>
    </div>
    
  </form>
</div>

</body>
</html>
