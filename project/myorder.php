<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
</head>
<style>
nav a{
margin-left:4%;
}
</style>
<body>
<img src="../image/homepg.jpg">
<div>
<nav>
<a style=margin-left:11%; href=index.php>Home</a>
<a href=prd.php>Appliances</a>
<a href=login.php>Login</a>
<a href=mycart.php>MyCart</a>
<a href=logout.php>Logout</a>
</nav>
</div>

<div class=container>
<?php
session_start();
include("connect.php");

if(!isset($_SESSION["id"]))
header("location: login.php");

$uid=$_SESSION["id"];
$order_no=$_GET["order_no"];

$r1=$con->query("select * from orders where order_no='$order_no'");
if($row1=$r1->fetch_assoc())
{
echo "<br>Order no:$order_no Dated:$row1[order_date]";
echo "<br>Bill Amount:$row1[order_price]";
}

$r=$con->query("select * from order_details where order_no='$order_no'");
echo "<table class=table table-responsive>";
echo "<tr><th>ProductId</th><th>Product</th><th>Price</th><th>Quantity</th><th>total</th><th>Extra Charges</th><th>Net Price</th><th></th></tr>";
while($row=$r->fetch_assoc())
{
echo "<tr><td>$row[prod_id]</td>";
echo "<td>$row[prod_name]</td>";
echo "<td>$row[prod_price]</td>";
echo "<td>$row[prod_qty]</td>";
echo "<td>$row[prod_price]</td>";
echo "<td>$row[charge_tax]</td>";
echo "<td>$row[net_price]</td>";

echo "</tr>";
}

echo "</table>";

?>
</div>
</body>
</html>
