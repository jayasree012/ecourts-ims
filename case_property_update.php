<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE case_property set Date_of_case='" . $_POST['date_of_case'] . "' ,
Number_of_charge_sheet='" . $_POST['charge_sheet_no'] . "' ,
Name_of_the_station='" . $_POST['name_of_the_station'] . "', 
Serial_No='" . $_POST['serial_no'] . "', 
Valuable_property='" . $_POST['valuable_property'] . "', 
Other_properties='" . $_POST['other_properties'] . "' ,
Initials_of_the_Judge_or_Magistrate1='" . $_POST['initials_of_judge1'] . "', 
Particulars_of_orders='" . $_POST['particulars'] . "', 
Section_of_law='" . $_POST['section_of_law'] . "',
Date_of_order_for_disposal='" . $_POST['date_of_disposal'] . "' ,
Signature_of_the_party='" . $_POST['signature_of_party'] . "',
Date_returned='" . $_POST['date_returned'] . "',
Initials_of_the_Judge_or_Magistrate2='" . $_POST['initials_of_judge2'] . "',
Date_of_auction='" . $_POST['date_of_auction'] . "',
Amount_realized='" . $_POST['amount_realized'] . "', 
Date_of_remittance_of_male_proceeds_to_treasury='" . $_POST['date_of_remittance'] . "',
Initials_of_the_Judge_or_Magistrate3='" . $_POST['initials_of_judge3'] . "' WHERE Case_No='" . $_POST['case_no'] . "' ");
header("location: case_property_display.php");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM case_property WHERE Case_No='" . $_GET['Case_No'] . "'");
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

  <h2> Case Property</h2>

  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <div class="row">
        <div class="col-25">
          <label>Case No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="case_no" class="form-control" value="<?php echo $row['Case_No']; ?>" pattern="[0-9]+" oninvalid="alert('Enter a valid case no.');" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date of case </label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_case" class="form-control" value="<?php echo $row['Date_of_case']; ?>"
maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Charge sheet No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="charge_sheet_no" class="form-control" value="<?php echo $row['Number_of_charge_sheet']; ?>"
maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Name of the station</label>
        </div>
        <div class="col-75">
          <input type="text" name="name_of_the_station" class="form-control" value="<?php echo $row['Name_of_the_station']; ?>"
maxlength="50" required="">
        </div>
      </div>
      <h4>Description of properties</h4>

      <div class="row">
        <div class="col-25">
          <label>Serial No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="serial_no" class="form-control" value="<?php echo $row['Serial_No']; ?>"
maxlength="30" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Valuable property</label>
        </div>
        <div class="col-75">
          <input type="text" name="valuable_property" class="form-control" value="<?php echo $row['Valuable_property']; ?>"
 maxlength="90" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Other properties</label>
        </div>
        <div class="col-75">
          <input type="text" name="other_properties" class="form-control" value="<?php echo $row['Other_properties']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge1" class="form-control" value="<?php echo $row['Initials_of_the_Judge_or_Magistrate1']; ?>"
 maxlength="50" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Particulars of orders for disposal</label>
        </div>
        <div class="col-75">
          <input type="text" name="particulars" class="form-control" value="<?php echo $row['Particulars_of_orders']; ?>"
 maxlength="50" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Section of law</label>
        </div>
        <div class="col-75">
          <input type="text" name="section_of_law" class="form-control" value="<?php echo $row['Section_of_law']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date of order for disposal</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_disposal" class="form-control" value="<?php echo $row['Date_of_order_for_disposal']; ?>"
maxlength="50" required="">
        </div>
      </div>
      <h4>If returned to party producing it or his agent</h4>
      <div class="row">
        <div class="col-25">
          <label>Signature of party</label>
        </div>
        <div class="col-75">
          <input type="text" name="signature_of_party" class="form-control" value="<?php echo $row['Signature_of_the_party']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date returned</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_returned" class="form-control" value="<?php echo $row['Date_returned']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge2" class="form-control" value="<?php echo $row['Initials_of_the_Judge_or_Magistrate2']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <h4>If sold by auction</h4>
      <div class="row">
        <div class="col-25">
          <label>Date of auction</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_auction" class="form-control" value="<?php echo $row['Date_of_auction']; ?>"
maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Amount realized</label>
        </div>
        <div class="col-75">
          <input type="text" name="amount_realized" class="form-control" value="<?php echo $row['Amount_realized']; ?>"
maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date of remittance of male proceeds to treasury</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_remittance" class="form-control" value="<?php echo $row['Date_of_remittance_of_male_proceeds_to_treasury']; ?>"
 maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge3" class="form-control" value="<?php echo $row['Initials_of_the_Judge_or_Magistrate3']; ?>"
maxlength="50" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label>Remarks or Inspecting Officers (if any)</label>
        </div>
        <div class="col-75">
          <input type="text" name="remarks" class="form-control" value="<?php echo $row['Remarks_or_Inspecting_Officers_(if_any)']; ?>" maxlength="50">
        </div>
      </div>

      <div class="row">
        <div class="space">
          <input type="submit" value="Update" name="submit">
        </div>
      </div>
    </form>
  </div>
</body>

</html>


