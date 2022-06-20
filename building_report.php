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

<h2>Building Details</h2>


<div class="container">
  <form action="building_report_display.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="building_id">Building id</label>
      </div>
      <div class="col-75">
        <select id="building_id" name="building_id" required>
        <option value="None">None</option>
        
        <?php
          $query = "SELECT DISTINCT building_id FROM building_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['building_id'];?>"><?php echo $data['building_id'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="district">District</label>
      </div>
      <div class="col-75">
        <select id="district" name="district" required>
        <option value="None">None</option>
         <?php
          $query = "SELECT DISTINCT district FROM building_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['district'];?>"><?php echo $data['district'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="taluk">Taluk</label>
      </div>
      <div class="col-75">
        <select id="taluk" name="taluk" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT taluk FROM building_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['taluk'];?>"><?php echo $data['taluk'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="village">Village</label>
      </div>
      <div class="col-75">
        <select id="village" name="village" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT village FROM building_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['village'];?>"><?php echo $data['village'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="t_s_no">Town Survey No.</label>
      </div>
      <div class="col-75">
        <select id="t_s_no" name="t_s_no" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT T_S_no FROM building_details";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['T_S_no'];?>"><?php echo $data['T_S_no'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="value">Value</label>
      </div>
      <div class="col-75">
        <select id="value_1" name="value_1" required style="width:300px">
        <option value="None">None</option>
        <option value="greater_than">Greater than</option>
        <option value="lesser_than">Lesser than</option>
        </select>
        <input type="text" id="value" name="value" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid building id');" style="width:300px">
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

