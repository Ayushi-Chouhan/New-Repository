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
<div style="padding:3%;">
<?php
session_start();
include("connect.php");
$pid=$_GET["prod_id"];
$r=$con->query("select * from product where prod_id='$pid'");
echo "<table class=table table-responsive>";
if($row=$r->fetch_assoc())
{
echo "<tr><td rowspan=8>";
echo "<img style=width:100%; src=../image/$row[prod_img]></td>";
echo "<tr><th>ID</th><td>$row[prod_id]</td></tr>";
echo "<tr><th>Product</th><td>$row[prod_name]</td></tr>";
echo "<tr><th>Category</th><td>$row[prod_cat]</td></tr>";
echo "<tr><th>Brand</th><td>$row[prod_brand]</td></tr>";
echo "<tr><th>Description</th><td>$row[prod_desc]</td></tr>";
echo "<tr><th>Price</th><td>$row[prod_price]</td></tr>";
echo "<tr><th>Available Quantity</th><td>$row[prod_qty]</td></tr>";
}
echo "</table>" ;
echo "<form method=post action=insertcart.php>";
echo "<input type=number value=1 name=ordered_qty style=width:50;height:50>";
echo "<input type=hidden name=prod_id value=$row[prod_id]>";
echo "<input type=hidden name=prod_name value=$row[prod_name]>";
echo "<input type=hidden name=prod_price value=$row[prod_price]>";
echo "<button type=submit >add to cart</button>";
echo "</form>";
?>
</div>
</body>
</html>