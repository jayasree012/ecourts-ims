<?php
echo " Hello ";
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"DELETE FROM case_property WHERE Case_No='" . $_GET['Case_No'] . "'");
header("Location: case_property_display.php");
}
?>
