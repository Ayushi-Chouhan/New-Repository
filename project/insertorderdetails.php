<?php
session_start();

if(!isset($_SESSION["id"]))
header("location: login.php");

echo "$_POST[prod_price]";
$pid=$_POST["prod_id"];
$pname=$_POST["prod_name"];
$pprice=$_POST["prod_price"];
$pqty=$_POST["prod_qty"];
$pqty=$_POST["prod_qty"];
$tax=$_POST["charge_tax"];
$total=$_POST["net_price"];

include("connect.php");
$sql="insert into orders(prod_id, prod_name, prod_price, prod_qty, charge_tax, net_price)  values('$pid','$pname','$pprice','$pqty','$total_price','$tax','$total')";
$r=$con->query($sql);
?>



