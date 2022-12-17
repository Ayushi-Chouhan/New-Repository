<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
<style>
table{
background-color:white;    
padding:2%;
border:3px solid black;
} 
a:hover{
color:#000000;
background-color:rgb(255,255,255);
} 
</style>
</head>
<body>
<header style=background-color:rgba(185,190,195,0.4);>
<h1><strong>SHOP@timrl</strong></h1>   
<div style=background-color:rgba(0,0,0,0.7);>
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href=index.php>Home</a></li>
<li class="nav-item"><a class="nav-link" href=prd.php>Appliances</a></li>
<li class="nav-item"><a class="nav-link" href=login.php>Login</a></li>
<li class="nav-item"><a class="nav-link" href=logout.php>Logout</a></li>
</ul>
</div>
</header>
<div style="padding: 6%;background-color: #3333ff;">
<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id"]))
header("location: login.php");

$r=$con->query("select * from cart_details");
echo "<table class=\"table table-responsive\">";
echo "<tr><th>UserID</th><th>ProductId</th><th>Product</th><th>Price</th><th>Quantity</th><th>total</th><th>Extra Charges</th><th>Net Price</th><th></th></tr>";
$total=0;
while($row=$r->fetch_assoc())
{
echo "<tr><td>$row[user_id]</td>";
echo "<td>$row[prod_id]</td>";
echo "<td>$row[prod_name]</td>";
echo "<td>$row[prod_price]</td>";
echo "<td>$row[prod_qty]</td>";
echo "<td>$row[total_price]</td>";
echo "<td>$row[charge_tax]</td>";
echo "<td>$row[net_price]</td>";
$total=$total+$row['net_price'];
echo "<td><form method=post action=remove.php?prod_id=$row[prod_id]>";
echo "<button class=btn-primary type=submit>Remove from cart</button>";
echo "<a href=pdetails.php?prod_id=$row[prod_id]>";
echo "</form></td></tr>";
}
echo "<tr><td><td><td><td><td><td><td>Total Bill<td>$total</tr>";
$_SESSION["billamount"]=$total;
echo "</table>";
echo "<p><strong>To Confirm this order click on<a href=confirm.php><button>Confirm Order</button></a></strong></p>";

?>
</div>
</body>
</html>