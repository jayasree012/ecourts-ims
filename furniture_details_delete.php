<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"DELETE FROM furniture_details WHERE furniture_id='" . $_GET['furniture_id'] . "'");
mysqli_query($conn,"UPDATE furniture_list set furniture_quantity=furniture_quantity-1 where furniture_name='" . $_GET['furniture_name'] . "' and furniture_quantity>0");
header("Location: furniture_details_display.php");
}

?>
