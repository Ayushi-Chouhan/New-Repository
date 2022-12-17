<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
<style>
form
{
margin:20% 25%;
text-align:center;
position:relative;
background-color:white;
padding:20px;
}
body{
background-image:url("../image/loginpg.jpg");  
padding:3%;
}
</style>
</head>
<body>
<div style="background-color:black;"><h1 style="font-family: Bebas Neue;text-align: center;color: white;">SHOP@Timrl</h1></div>
<div>
<form method=post class="form-group">

<label> Enter UserId </label><input name=id class=form-control /><br>
<label> Enter Password </label><input class=form-control type=password name=pwd required/>
<a style="float: right;" href="forgetpwd.php">Forget password?</a><br>
<button style="margin: 0px" type=submit class="btn btn-primary">Login</button><br>
OR<br>
<strong>If you don't have an account sign up and then Log In</strong>
<nav><a href="Register.php">Sign Up</nav>
</div>
</form>

<?php
session_start();
include("connect.php");
if(isset($_POST["id"]))
{
$r=$con->query("select * from users where (id='$_POST[id]' OR email='$_POST[id]') AND (password='$_POST[pwd]')");
if($row=$r->fetch_assoc())
{
$_SESSION["id"]=$row["id"];
$_SESSION["name"]=$row["name"];
header("location:index.php");
exit();
}
else
echo "Invalid UserId or password";
}
?>
</body>
</html>
