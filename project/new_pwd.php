<?php
session_start();
include("connect.php");
$pwd=$_POST['pwd'];
$cpwd=$_POST['cpwd'];
if($cpwd != $pwd)
{
echo "password doesn't match";
header("location:newpwd.php");
}
echo "$_SESSION[token]";
$token=$_SESSION['token'];
$sql="select * from pwd_reset where token='$token'";
$r=$con->query($sql);
if($row=$r->fetch_assoc())
{
$mail=$row['email'];
}
if($mail) 
{
$r1=$con->query("update users set password=$pwd where email='$mail'");
header("location:index.php");
}
?>