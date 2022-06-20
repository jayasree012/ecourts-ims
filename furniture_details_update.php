<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)>0) {

mysqli_query($conn,"UPDATE furniture_details set furniture_name='" . $_POST['furniture_name'] . "', court_id='" . $_POST['court_id'] . "' ,court_name='" . $_POST['court_name'] . "',department_name='" . $_POST['department_name'] . "',room_id='" . $_POST['room_id'] . "' WHERE furniture_id='" . $_POST['furniture_id'] . "'");
header("Location: furniture_details_display.php");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM furniture_details WHERE furniture_id='" . $_GET['furniture_id'] . "'");


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

<h2>Furniture Details</h2>


<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Furniture Name</label>
      </div>
      <div class="col-75">
        <select id="furniture_name" name="furniture_name" value="<?php echo $row['furniture_name']; ?>" required>
          <option value="Executive table">Executive table</option>
          <option value="Revolving chair">Revolving chair</option>
          <option value="Wooden table(6.5'X3.5'X30')">Wooden table(6.5'X3.5'X30')</option>
          <option value="Wooden table(5'X3'X30')">Wooden table(5'X3'X30')</option>
          <option value="Wooden table(4'X2.5'X30')">Wooden table(4'X2.5'X30')</option>
          <option value="Typist table">Typist table</option>
          <option value="Steel Bureau">Steel Bureau</option>
          <option value="Steel Long Bench(6'X1.5'X1.5')">Steel Long Bench(6'X1.5'X1.5')+</option>
          <option value="Wooden long bench(6'X1.5'X1.5')">Wooden long bench(6'X1.5'X1.5')</option>
          <option value="Almirah">Almirah</option>
          <option value="Weighing machine">Weighing machine</option>
          <option value="Long table(6'X2'X2.5')">Long table(6'X2'X2.5')</option>
          <option value="Resting chair">Resting chair</option>
          <option value="Witness box">Witness box</option>
          <option value="Accused box">Accused box</option>
          <option value="5 type steel chair">5 type steel chair</option>
          <option value="Wooden chair">Wooden chair</option>
          <option value="Typist chair">Typist chair</option>
          <option value="Steel rack">Steel rack</option>
          <option value="New furniture received from PWD for Principal District Court new combined Court building,Tiruppur">New furniture received from PWD for Principal District Court new combined Court building,Tiruppur</option>
          <option value="Fire extinguisher">Fire extinguisher</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="court_id">Court ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="court_id" name="court_id" pattern="[0-9]+" oninvalid="alert('Enter a valid court_id');" value="<?php echo $row['court_id']; ?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="court_name">Court name</label>
      </div>
      <div class="col-75">
        <input type="text" id="court_name" name="court_name" pattern="[a-z A-Z]+" oninvalid="alert('Enter a valid court name');" value="<?php echo $row['court_name']; ?>" required>
      </div>
    </div>    
    <div class="row">
      <div class="col-25">
        <label for="dept_name">Department name</label>
      </div>
      <div class="col-75">
        <input type="text" id="department_name" name="department_name" pattern="[a-z A-Z]+" oninvalid="alert('Enter a valid department name');" value="<?php echo $row['department_name']; ?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="room">Room id/name</label>
      </div>
      <div class="col-75">
        <input type="text" id="room_id" name="room_id" pattern="[0-9A-Z a-z]+" oninvalid="alert('Enter a valid room id/room name');" value="<?php echo $row['room_id']; ?>" required>
      </div>
    </div>
    <div class="row">
      <div class="space">
      <input type="submit" value="Update" name="submit">
      </div>
    </div>
    <input type="hidden" id="furniture_id" name="furniture_id" value="<?php echo $row['furniture_id']; ?>" required>
  </form>
</div>
</body>
</html>

