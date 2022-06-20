<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"DELETE FROM building_details WHERE building_id='" . $_GET['building_id'] . "'");
header("Location: building_display.php");
}
?>
