<?php
require_once "db.php";
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
  <form action="furniture_report_display.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="furniture_id">Furniture id</label>
      </div>
      <div class="col-75">
        <input type="text" id="furniture_id" name="furniture_id" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid furniture id');" style="width:300px">
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="furniture_name">Furniture Name</label>
      </div>
      <div class="col-75">
        <select id="furniture_name" name="furniture_name" required>
        <option value="None">None</option>
         <?php
          $query = "SELECT DISTINCT furniture_name FROM furniture_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['furniture_name'];?>"><?php echo $data['furniture_name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="court_id">Court ID</label>
      </div>
      <div class="col-75">
        <select id="court_id" name="court_id" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT court_id FROM furniture_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['court_id'];?>"><?php echo $data['court_id'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="court_name">Court Name</label>
      </div>
      <div class="col-75">
        <select id="court_name" name="court_name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT court_name FROM furniture_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['court_name'];?>"><?php echo $data['court_name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="department_name">Department Name</label>
      </div>
      <div class="col-75">
        <select id="department_name" name="department_name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT department_name FROM furniture_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['department_name'];?>"><?php echo $data['department_name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="room_id">Room ID</label>
      </div>
      <div class="col-75">
        <select id="room_id" name="room_id" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT room_id FROM furniture_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['room_id'];?>"><?php echo $data['room_id'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="value">Date of purchase</label>
      </div>
      <div class="col-75">
        <select id="date_of_purchase_1" name="date_of_purchase_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">Greater than</option>
        <option value="lesser_than">Lesser than</option>
        </select>
        <input type="date" id="date_of_purchase" name="date_of_purchase" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid building id');" style="width:300px">
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

