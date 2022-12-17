<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
<style>
table,tr{
background-color:white;
text-align:center;
border:2px solid gray; 
}
#tbl{
background-color:rgba(0,0,0,0.9);
 padding:7%;
}
a:hover{
color:#000000;
background-color:rgb(255,255,255);

}
img{
    margin:0% 10%;
}
</style>
</head>
<body>
<header style=background-color:rgba(185,190,195,0.4);>
<img style=width:100%; src="../image/head.jpg">
<div>
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href=index.php>Home</a></li>
<li class="nav-item"><a class="nav-link" href=login.php>Login</a></li>
<li class="nav-item"><a class="nav-link" href=mycart.php>MyCart</a></li>
<li class="nav-item"><a class="nav-link" href=logout.php>Logout</a></li>
</ul>
</div>
</header>
<div id=tbl style="overflow-x:auto;">
<?php
session_start();
include("connect.php");
$r=$con->query("select * from product");
echo "<table>";
echo "<tr class=thead><th>ID</th><th>Product</th><th>Category</th><th>Brand</th><th>Description</th><th>Price</th><th>Available Quantity</th> <th>image</th> <th></th></tr>";
while($row=$r->fetch_assoc())
{
echo "<tr><td>$row[prod_id]</td>";
echo "<td>$row[prod_name]</td>";
echo "<td>$row[prod_cat]</td>";
echo "<td>$row[prod_brand]</td>";
echo "<td>$row[prod_desc]</td>";
echo "<td>$row[prod_price]</td>";
echo "<td>$row[prod_qty]</td>";
echo "<td><a href=pdetails.php?prod_id=$row[prod_id]>";
echo "<img width=100px src=../image/$row[prod_img]>view</a></td>";
}
echo "</table>"
?>
</div>
</body>
</html>