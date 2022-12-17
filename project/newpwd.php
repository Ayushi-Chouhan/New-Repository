<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
</head>
<body>
<?php 
session_start();
include("connect.php");
$_SESSION['token']=$_GET['token'];
?>
<form method=post action="new_pwd.php">
<label>Enter New Password</label><input type=password name=pwd required/><br>
<label>Confirm Password</label><input type=password name=cpwd required/><br>
<button type=submit>Submit</button>
</form>

</body>
</html>