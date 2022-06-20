<?php
session_start();
require_once "db.php";
if(isset($_SESSION['mu_id'])!="") {
header("Location: system_user_dashboard.php");
}
if (isset($_POST['login'])) {
$m_username = mysqli_real_escape_string($conn, $_POST['m_username']);
$m_password = mysqli_real_escape_string($conn, $_POST['m_password']);

if(strlen($m_password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}  
$result = mysqli_query($conn, "SELECT * FROM system_users WHERE m_username = '" . $m_username. "' and m_password = '" . $m_password. "'");
if(!empty($result)){
if ($row = mysqli_fetch_array($result)) {
$_SESSION['mu_id'] = $row['mu_id'];
$_SESSION['m_username'] = $row['m_username'];
header("Location: system_user_dashboard.php");
} 
}else {
$error_message = "Incorrect Email or Password!!!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>System User Login Form</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.container{
background-color:#084594;
width:40%;
margin-top:150px;
padding:50px;
padding-top:50px;
}
.row{
width:100%;
background-color:#1C658C;
padding-top:50px;
padding-bottom:50px;
padding-left:100px;
padding-right:100px;
margin-bottom:50px;
}
.login-form{
align-self:center;
font-size:40px;
color:white;
font-weight:bold;
}
.btn{
background-color:white;
color:#22577E;
width:100px;
font-size:20px;
}
label{
color:white;
font-size:20px;
}
form-control{
 margin:auto;
}
body{
background-color:#DBDFFD;
}

</style>
</head>
<body>

<div class="container">
<center>
<h2 class="login-form">USER LOGIN</h2>
</center>
<div class="row">
<div class="col">
<div class="page-header">

</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group ">
<label>Username</label>
<input type="text" name="m_username" class="form-control" value="" maxlength="30" required="">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="m_password" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
</div>  

<br>

</div>
</div>  
<center>
<input type="submit" class="btn btn-primary" name="login" value="Login">
</center>
   </form>
</div>
</body>
</html>
