<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
$district = mysqli_real_escape_string($conn, $_POST['district']);
$taluk = mysqli_real_escape_string($conn, $_POST['taluk']);
$village = mysqli_real_escape_string($conn, $_POST['village']);
$t_s_no = mysqli_real_escape_string($conn, $_POST['t_s_no']);
$description_area = mysqli_real_escape_string($conn, $_POST['description_area']); 
$value = mysqli_real_escape_string($conn, $_POST['value']);


if(mysqli_query($conn, "INSERT INTO building_details( district, taluk, village ,T_S_no,description_area,value) VALUES('$district', '$taluk', '$village', $t_s_no , ' $description_area ',  $value )")) {
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

<h2>Data Entry for Buildings</h2>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">District</label>
      </div>
      <div class="col-75">
        <select id="district" name="district" required>
          <option value="Ariyalur">Ariyalur</option>
          <option value="Chengalpattu">Chengalpattu</option>
          <option value="Chennai">Chennai</option>
          <option value="Coimbatore">Coimbatore</option>
          <option value="Cuddalore">Cuddalore</option>
          <option value="Dharmapuri">Dharmapuri</option>
          <option value="Dindigul">Dindigul</option>
          <option value="Erode">Erode</option>
          <option value="Kallakurichi">Kallakurichi</option>
          <option value="Kanchipuram">Kanchipuram</option>
          <option value="Kanyakumari">Kanyakumari</option>
          <option value="Karur">Karur</option>
          <option value="Krishnagiri">Krishnagiri</option>
          <option value="Madurai">Madurai</option>
          <option value="Nagapattinam">Nagapattinam</option>
          <option value="Namakkal">Namakkal</option>
          <option value="Nilgiris">Nilgiris</option>
          <option value="Perambalur">Perambalur</option>
          <option value="Pudukkottai">Pudukkottai</option>
          <option value="Ramanathapuram">Ramanathapuram</option>
          <option value="Ranipet">Ranipet</option>
          <option value="Salem">Salem</option>
          <option value="Sivaganga">Sivaganga</option>
          <option value="Tenkasi">Tenkasi</option>
          <option value="Thanjavur">Thanjavur</option>
          <option value="Theni">Theni</option>
          <option value="Thoothukudi">Thoothukudi</option>
          <option value="Tiruchirappalli">Tiruchirappalli</option>
          <option value="Tirunelveli">Tirunelveli</option>
          <option value="Tirupathur">Tirupathur</option>
          <option value="Tiruppur" selected="selected">Tiruppur</option>
          <option value="Tiruvallur">Tiruvallur</option>
          <option value="Tiruvannamalai">Tiruvannamalai</option>
          <option value="Tiruvarur">Tiruvarur</option>
          <option value="Vellore">Vellore</option>
          <option value="Viluppuram">Viluppuram</option>
          <option value="Virudhunagar">Virudhunagar</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="taluk">Taluk</label>
      </div>
      <div class="col-75">
        <input type="text" id="taluk" name="taluk" pattern="[a-zA-Z]+" oninvalid="alert('Enter a valid taluk name');" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="village">Village</label>
      </div>
      <div class="col-75">
        <input type="text" id="village" name="village" pattern="[a-zA-Z]+" oninvalid="alert('Enter a valid village name');" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="t_s_no">Town Survey No.</label>
      </div>
      <div class="col-75">
        <input type="text" id="t_s_no" name="t_s_no" pattern="[0-9]+" oninvalid="alert('Enter a valid Town survey Number');"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description_area">Description of area</label>
      </div>
      <div class="col-75">
       <textarea id="description_area" name="description_area" style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="value">Area of building(in sq feet)</label>
      </div>
      <div class="col-75">
        <input type="text" id="value" name="value" pattern="^\d*\.?\d*" oninvalid="alert('Enter a valid value');"required>
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

