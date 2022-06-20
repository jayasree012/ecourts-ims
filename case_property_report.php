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

<h2>Case Property Details</h2>


<div class="container">
  <form action="case_property_report_display.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="Case_No">Case No</label>
      </div>
      <div class="col-75">
        <select id="Case_No" name="Case_No" required>
        <option value="None">None</option>
        
        <?php
          $query = "SELECT DISTINCT Case_No FROM case_property";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Case_No'];?>"><?php echo $data['Case_No'];?></option>
        

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="Name_of_the_station">Name of the station</label>
      </div>
      <div class="col-75">
        <select id="Name_of_the_station" name="Name_of_the_station" required>
        <option value="None">None</option>
         <?php
          $query = "SELECT DISTINCT Name_of_the_station FROM case_property";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Name_of_the_station'];?>"><?php echo $data['Name_of_the_station'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    
    
<div class="row">
      <div class="col-25">
        <label for="value">Date Of Case</label>
      </div>
      <div class="col-75">
        <select id="Date_of_case_1" name="Date_of_case_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">After</option>
        <option value="lesser_than">Before</option>
        </select>
        <input type="date" id="Date_of_case" name="Date_of_case" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
      </div>
    </div>
    
    
    <div class="row">
      <div class="col-25">
        <label for="Section_of_law">Section of law</label>
      </div>
      <div class="col-75">
        <select id="Section_of_law" name="Section_of_law" required>
        <option value="None">None</option>
        <?php
          $query = "SELECT DISTINCT Section_of_law FROM case_property";
	  $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
  		$sn=1;
  		while($data = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $data['Section_of_law'];?>"><?php echo $data['Section_of_law'];?></option>

        <?php
 		}
 	 } 
        ?>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="value">Date Of order of disposal</label>
      </div>
      <div class="col-75">
        <select id="Date_of_order_for_disposal_1" name="Date_of_order_for_disposal_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">After</option>
        <option value="lesser_than">Before</option>
        </select>
        <input type="date" id="Date_of_order_for_disposal" name="Date_of_order_for_disposal" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
      </div>
    </div>
    
    
<div class="row">
      <div class="col-25">
        <label for="value">Date Returned</label>
      </div>
      <div class="col-75">
        <select id="Date_returned_1" name="Date_returned_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">After</option>
        <option value="lesser_than">Before</option>
        </select>
        <input type="date" id="Date_returned" name="Date_returned" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
      </div>
    </div>
    
    
<div class="row">
      <div class="col-25">
        <label for="value">Date Of auction</label>
      </div>
      <div class="col-75">
        <select id="Date_of_auction_1" name="Date_of_auction_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">After</option>
        <option value="lesser_than">Before</option>
        </select>
        <input type="date" id="Date_of_auction" name="Date_of_auction" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
      </div>
    </div>


   <div class="row">
      <div class="col-25">
        <label for="value">Date of remittance of male proceeds to treasury</label>
      </div>
      <div class="col-75">
        <select id="Date_of_remittance_of_male_proceeds_to_treasury_1" name="Date_of_remittance_of_male_proceeds_to_treasury_1" required style="width:300px">
        <option value="None">None</option>
        <option value="on">On</option>
        <option value="greater_than">After</option>
        <option value="lesser_than">Before</option>
        </select>
        <input type="date" id="Date_of_remittance_of_male_proceeds_to_treasury" name="Date_of_remittance_of_male_proceeds_to_treasury" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="Amount_realized">Amount realized</label>
      </div>
      <div class="col-75">
        <select id="Amount_realized1" name="Amount_realized1" required style="width:300px">
        <option value="None">None</option>
        <option value="greater_than">Greater than</option>
        <option value="lesser_than">Lesser than</option>
        </select>
        <input type="text" id="Amount_realized" name="Amount_realized" pattern="[a-zA-Z0-9]+" oninvalid="alert('Enter a valid value');" style="width:300px">
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

