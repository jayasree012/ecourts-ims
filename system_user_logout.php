<?php
ob_start();
session_start();
if(isset($_SESSION['mu_id'])) {
session_destroy();
unset($_SESSION['mu_id']);
unset($_SESSION['m_username']);

header("Location: system_user_login.php");
} else {
header("Location: system_user_login.php");
}
?>
