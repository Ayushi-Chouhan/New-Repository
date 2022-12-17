<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
<style>
form{background-color:#FFFFFF;
border:2px;
padding:10%;
margin:10%;
}
</style>
</head>
<body style=background-color:#660033>
<link rel=stylesheet href="../css/bootstrap.min">
<div class="jumbotron"><h1 class="display-4" style=font-family:"Bebas Neue",Arial,sans-serif;>SHOP@Timrl</h1><a href="login.php"><button type=submit class="btn btn-primary">Login</button></a></div>
<div class=container>
<form method=post>

<h1>Enter Details:</h1>
<br>
<label> Enter UserId </label><input class=form-control name=id /><br>
<label> Enter Name </label><input class=form-control name=name  required /><br>
<label> Enter Password </label><input type=password class=form-control name=pwd required /><br>
<label> Enter Email-Id </label><input type=email class=form-control name=email  required /><br>
<label> Select Gender: </label><br>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br>
<label> Enter Address </label><input class=form-control name=address required /><br>
<label> Enter Date of Birth </label><input name=dob class=form-control placeholder=dd-mm-yyyy required /><br>
<label> Enter Contact Number </label><input class=form-control name=contact required /><br>
<a href="login.php"><button type=submit class="btn btn-primary">Sign In</button></a>
</form>
</div>

<?php
session_start();
if(isset($_POST["id"]))
{
$id=$_POST["id"];
$name=$_POST["name"];
$pwd=$_POST["pwd"];
$mailid=$_POST["email"];
$role=$_POST["role"];
$gen=$_POST["gender"];
$address=$_POST["address"];
$dob=$_POST["dob"];
$no=$_POST["contact"];
include("connect.php");
$con->query("insert into users values('$id','$name','$pwd','$mailid','$role','$gen','$address','$dob','$no')" );
$con->close();
}
?>
</body>
</html>
