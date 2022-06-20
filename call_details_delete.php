<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"UPDATE call_booking set status='Completed' WHERE call_id='" . $_GET['call_id'] . "'");
header("Location: call_display.php");
}

?>
