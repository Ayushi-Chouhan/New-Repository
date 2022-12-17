<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
</head>
<body>
<header style=background-color:rgba(185,190,195,0.4);>
<h1><strong>SHOP@timrl</strong></h1>   
<div style=background-color:rgba(0,0,0,0.7);>
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href=index.php>Home</a></li>
<li class="nav-item"><a class="nav-link" href=prd.php>Appliances</a></li>
<li class="nav-item"><a class="nav-link" href=login.php>Login</a></li>
<li class="nav-item"><a class="nav-link" href=mycart.php>MyCart</a></li>
<li class="nav-item"><a class="nav-link" href=logout.php>Logout</a></li>
</ul>
</div>
</header>
<?php
session_start();

if(!isset($_SESSION["id"]))
header("location: login.php");

include("connect.php");
$uid=$_SESSION["id"];
$r=$con->query("select * from users where id='$uid'");

if($row=$r->fetch_assoc())
{
echo "<section style=padding:3%;>";
echo "UserId : $uid ";
echo "<table class=table table-responsive>";
echo "<tr><td><form method=post action=k.php></td>";
echo "<tr><td>Enter Name<input name=name value=$row[name] /></td></tr>";
echo "<tr><td>Enter Delivery Address<input name=address value=$row[Address] /></td></tr>";
echo "<tr><td>Enter Contact Number<input name=contact value=$row[contactno] /></td></tr>";
echo "<tr><td>Total Bill Amount :  $_SESSION[billamount]</td></tr>";
echo "<tr><td><button class=btn-primary type=submit>Confirm</button></td></tr>";
echo "<tr><td></form></td></tr>";
echo "</section>";
}

?>
</body>
</html>