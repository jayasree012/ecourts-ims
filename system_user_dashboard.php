<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['mu_id']) =="") {
header("Location: system_user_login.php");
$user=$_SESSION['mu_id'];
echo($user);
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 220px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #084594;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 220px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #5D8BF4;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.logo{
height:100px;
width:100px;
margin-left:40px;
margin-bottom:40px;
}
</style>
</head>
<body>

<div class="sidenav">
<div class="image">
      <img class="logo" src="https://media.9curry.com/uploads/organization/image/1956/tiruppur-district-court-logo.png">
    </div>
    <a href="home.php" target="iframe_a">Home <i class="fas fa-home"></i></a>
     
  
  
   <a href="callbook.php" target="iframe_a">Call Book <i class="fas fa-phone"></i></a>
  <a href="call_display_user.php?user=<?php echo $_SESSION['mu_id']; ?>" target="iframe_a">My Bookings</a>
  
   <a href="system_user_logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
</div>

<div class="main">

<iframe src="home.php" style="border:none;" name="iframe_a" height="710px" width="100%" title="Iframe Example"></iframe> 

</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html>
