<?php
session_start();

include("connect.php");
$user_id=$_SESSION["id"];
$prod_id=$_GET["prod_id"];
$sql="delete from cart_details where user_id='$user_id' and prod_id='$prod_id' ";
$r=$con->query($sql);

header("location:mycart.php");
exit();
?>



