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

<h2>IT Stocks</h2>


<div class="container">
  <form action="itstocks_report_display.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="IT_Stocks_id">stock id</label>
      </div>
      <div class="col-75">
        <select id="IT_Stocks_id" name="IT_Stocks_id" required>
        <option value="None">None</option>
        
        <?php
          $query = "SELECT DISTINCT IT_Stocks_id FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['IT_Stocks_id'];?>"><?php echo $data['IT_Stocks_id'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="Product_Name">Product_Name</label>
      </div>
      <div class="col-75">
        <select id="Product_Name" name="Product_Name" required>
        <option value="None">None</option>
         <?php
          $query = "SELECT DISTINCT Product_Name FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Product_Name'];?>"><?php echo $data['Product_Name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Brand_Name">Brand_Name</label>
      </div>
      <div class="col-75">
        <select id="Brand_Name" name="Brand_Name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Brand_Name FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Brand_Name'];?>"><?php echo $data['Brand_Name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Model_Name">Model_Name</label>
      </div>
      <div class="col-75">
        <select id="Model_Name" name="Model_Name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Model_Name FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Model_Name'];?>"><?php echo $data['Model_Name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Serial_No">Serial_No</label>
      </div>
      <div class="col-75">
        <select id="Serial_No" name="Serial_No" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Serial_No FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Serial_No'];?>"><?php echo $data['Serial_No'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="Complex_Name">Complex_Name</label>
      </div>
      <div class="col-75">
        <select id="Complex_Name" name="Complex_Name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Complex_Name FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Complex_Name'];?>"><?php echo $data['Complex_Name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Court_Name">Brand_Name</label>
      </div>
      <div class="col-75">
        <select id="Court_Name" name="Court_Name" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Court_Name FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Court_Name'];?>"><?php echo $data['Court_Name'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Project_Fund">Project_Fund</label>
      </div>
      <div class="col-75">
        <select id="Project_Fund" name="Project_Fund" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Project_Fund FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Project_Fund'];?>"><?php echo $data['Project_Fund'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Installed_Year">Installed_Year</label>
      </div>
      <div class="col-75">
        <select id="Installed_Year" name="Installed_Year" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Installed_Year FROM itstocks";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Installed_Year'];?>"><?php echo $data['Installed_Year'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
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
