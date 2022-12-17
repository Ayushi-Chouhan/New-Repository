<?php
session_start();

if(!isset($_SESSION["id"]))
header("location: login.php");

$uid=$_SESSION["id"];
$pid=$_POST["prod_id"];
$pname=$_POST["prod_name"];
$pprice=$_POST["prod_price"];
$oqty=$_POST["ordered_qty"];
$total_price=$oqty * $pprice;
$charge_tax=$total_price * .1;
$net_price=$charge_tax + $total_price;

include("connect.php");
$sql="insert into cart_details(user_id, prod_id, prod_name, prod_price, prod_qty, total_price, charge_tax, net_price)  values('$uid','$pid','$pname','$pprice','$oqty','$total_price','$charge_tax','$net_price')";
$r=$con->query($sql);
header("location:mycart.php");

exit();
?>



