<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['insert_case'])) {
$case_no  = mysqli_real_escape_string($conn, $_POST['case_no']);
$date_of_case = mysqli_real_escape_string($conn, $_POST['date_of_case']);
$charge_sheet_no= mysqli_real_escape_string($conn, $_POST['charge_sheet_no']);
$name_of_the_station= mysqli_real_escape_string($conn, $_POST['name_of_the_station']);
$serial_no= mysqli_real_escape_string($conn, $_POST['serial_no']);
$valuable_property= mysqli_real_escape_string($conn, $_POST['valuable_property']);
$other_properties= mysqli_real_escape_string($conn, $_POST['other_properties']);
$initials_of_judge1= mysqli_real_escape_string($conn, $_POST['initials_of_judge1']);
$particulars= mysqli_real_escape_string($conn, $_POST['particulars']);
$section_of_law= mysqli_real_escape_string($conn, $_POST['section_of_law']);
$date_of_disposal= mysqli_real_escape_string($conn, $_POST['date_of_disposal']);
$signature_of_party= mysqli_real_escape_string($conn, $_POST['signature_of_party']);
$date_returned= mysqli_real_escape_string($conn, $_POST['date_returned']);
$initials_of_judge2= mysqli_real_escape_string($conn, $_POST['initials_of_judge2']);
$date_of_auction= mysqli_real_escape_string($conn, $_POST['date_of_auction']);
$amount_realized= mysqli_real_escape_string($conn, $_POST['amount_realized']);
$date_of_remittance= mysqli_real_escape_string($conn, $_POST['date_of_remittance']);
$initials_of_judge3= mysqli_real_escape_string($conn, $_POST['initials_of_judge3']);
$remarks= mysqli_real_escape_string($conn, $_POST['remarks']);


if(mysqli_query($conn, "INSERT INTO `case_property` (`Case_No`, `Date_of_case`, `Number_of_charge_sheet`, `Name_of_the_station`, `Serial_No`, `Valuable_property`, `Other_properties`, `Initials_of_the_Judge_or_Magistrate1`, `Particulars_of_orders`, `Section_of_law`, `Date_of_order_for_disposal`, `Signature_of_the_party`, `Date_returned`, `Initials_of_the_Judge_or_Magistrate2`, `Date_of_auction`, `Amount_realized`, `Date_of_remittance_of_male_proceeds_to_treasury`, `Initials_of_the_Judge_or_Magistrate3`, `Remarks_or_Inspecting_Officers_(if_any)`) VALUES ($case_no,'$date_of_case',$charge_sheet_no,'$name_of_the_station',$serial_no,
'$valuable_property','$other_properties','$initials_of_judge1','$particulars','$section_of_law','$date_of_disposal',
'$signature_of_party','$date_returned','$initials_of_judge2','$date_of_auction',$amount_realized,'$date_of_remittance','$initials_of_judge3','$remarks')")) {
    header("location: home.php");
   exit();
} else {
    echo "Error";
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
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

    .space {
      padding: 20px 0px 0px 0px;

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

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>

  <h2>Data entry for Case Details</h2>


  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <div class="row">
        <div class="col-25">
          <label>Case No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="case_no" class="form-control" value="" pattern="[0-9]+" oninvalid="alert('Enter a valid case no.');" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date of case </label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_case" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Charge sheet No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="charge_sheet_no" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Name of the station</label>
        </div>
        <div class="col-75">
          <input type="text" name="name_of_the_station" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>
      <h4>Description of properties</h4>

      <div class="row">
        <div class="col-25">
          <label>Serial No.</label>
        </div>
        <div class="col-75">
          <input type="text" name="serial_no" class="form-control" value="" maxlength="30" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Valuable property</label>
        </div>
        <div class="col-75">
          <input type="text" name="valuable_property" class="form-control" value="" maxlength="90" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Other properties</label>
        </div>
        <div class="col-75">
          <input type="text" name="other_properties" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge1" class="form-control" value="" maxlength="50" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Particulars of orders for disposal</label>
        </div>
        <div class="col-75">
          <input type="text" name="particulars" class="form-control" value="" maxlength="50" required="">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Section of law</label>
        </div>
        <div class="col-75">
          <input type="text" name="section_of_law" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date of order for disposal</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_disposal" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>
      <h4>If returned to party producing it or his agent</h4>
      <div class="row">
        <div class="col-25">
          <label>Signature of party</label>
        </div>
        <div class="col-75">
          <input type="text" name="signature_of_party" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Date returned</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_returned" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge2" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <h4>If sold by auction</h4>
      <div class="row">
        <div class="col-25">
          <label>Date of auction</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_auction" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Amount realized</label>
        </div>
        <div class="col-75">
          <input type="text" name="amount_realized" class="form-control" value="20" maxlength="50" required="">
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label>Date of remittance of male proceeds to treasury</label>
        </div>
        <div class="col-75">
          <input type="date" name="date_of_remittance" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Initials of the Judge or Magistrate</label>
        </div>
        <div class="col-75">
          <input type="text" name="initials_of_judge3" class="form-control" value="" maxlength="50" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label>Remarks or Inspecting Officers (if any)</label>
        </div>
        <div class="col-75">
          <input type="text" name="remarks" class="form-control" value="" maxlength="50">
        </div>
      </div>

      <div class="row">
        <div class="space">
          <input type="submit" value="Submit" name="insert_case">
        </div>
      </div>
    </form>
  </div>
</body>

</html>


