<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"DELETE FROM amc_t WHERE product_id='" . $_GET['product_id'] . "'");
header("Location: amc_display.php");

}

?>
