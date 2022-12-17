<?php
session_start();

$uid=$_SESSION["id"];
$bill=$_SESSION["billamount"];
$uaddress=$_POST["address"];
$uname=$_POST["name"];
$ucon=$_POST["contact"];

include("connect.php");

$con->query("update users set name='$uname',Address='$uaddress',contactno='$ucon' where id='$uid'");

$sql1="select max(order_no) from orders";
$r1=$con->query($sql1);
if($row1=$r1->fetch_assoc())
$order_no=$row1["max(order_no)"] + 1;

$sql="insert into orders(order_no, user_id, address, contact_no, order_price) values($order_no,'$uid','$uaddress','$ucon','$bill')";
$con->query($sql);
echo "$sql";

$sql2="select * from cart_details where user_id='$uid'";
$r2=$con->query($sql2);
echo "$sql2";
while($row1=$r2->fetch_assoc())
{
$sql3="insert into order_details values($order_no, '$row1[prod_id]','$row1[prod_name]', '$row1[prod_qty]', '$row1[prod_price]', '$row1[charge_tax]', '$row1[net_price]' )";
$con->query($sql3);
}

$sql4="delete from cart_details where user_id='$uid' ";
$con->query($sql4);

header("location:myorder.php?order_no=$order_no");
exit();
?>