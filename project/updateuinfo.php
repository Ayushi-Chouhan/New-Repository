<?php
session_start();

if(!isset($_SESSION["id"]))
header("location: login.php");
exit();

$uid=$_SESSION["id"];
$bill=$_SESSION["billamount"];
$uaddress=$_POST["address"];
$uname=$_POST["name"];
$ucon=$_POST["contact"];

include("connect.php");
$con->query("update users set name='$uname',Address='$uaddress',contactno='$ucon' where id='$uid'");

?>
