<?php
echo " Record deleted successfully ";
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if(count($_POST)==0) {
mysqli_query($conn,"DELETE FROM itstocks WHERE IT_Stocks_id='" . $_GET['IT_Stocks_id'] . "'");
header("Location: it_stocks_display.php");
}
?>
