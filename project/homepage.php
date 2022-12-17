<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="../css/bootstrap.min.css">
<style>
table{
background-color:#ffffff;
border:3px solid blue; 
border-radius:5%;
display:inline-block;
margin:2%;
padding:2%;
}
#tbl{
background-color:rgba(0,0,0,0.8);
margin:3% 7%;; 
padding:7% 7%;
}
a:hover{
color:#000000;
background-color:rgb(255,255,255);
}
</style>
</head>
<body>
<header style=background-color:rgba(185,190,195,0.4);>
<img style=width:50%; src="../image/head.jpg"></header>
<div style=background-color:rgb(0,0,0);>
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href=index.php>Home</a></li>
<li class="nav-item"><a class="nav-link" href=login.php>Login</a></li>
<li class="nav-item"><a class="nav-link" href=mycart.php>MyCart</a></li>
<li class="nav-item"><a class="nav-link" href=logout.php>Logout</a></li>
</ul>
</div>
<section id=tbl style="overflow-x:auto;">
<?php
session_start();
include("connect.php");
$r=$con->query("select * from product");
while($row=$r->fetch_assoc())
{
echo "<table>";
echo "<tr><th>ID</th><td>$row[prod_id]</td></tr>";
echo "<tr><th>Product</th><td>$row[prod_name]</td></tr>";
echo "<tr><th>Category</th><td>$row[prod_cat]</td></tr>";
echo "<tr><th>Brand</th><td>$row[prod_brand]</td></tr>";
echo "<tr><th>Description</th><td>$row[prod_desc]</td></tr>";
echo "<tr><th>Price</th><td>$row[prod_price]</td></tr>";
echo "<tr><th>Available Quantity</th><td>$row[prod_qty]</td></tr>";
echo "<tr><th>image</th><td><a href=pdetails.php?prod_id=$row[prod_id]>";
echo "<img width=120px src=../image/$row[prod_img]>view</a></td></tr>";
echo "</table>";
}
?>
</section>
</body>
</html>