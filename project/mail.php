<?php
session_start();
include("connect.php");
settype($msg,"string");
if(isset($_POST["mailid"]))
{
$email=$_POST["mailid"];    
$token=bin2hex(random_bytes(50));
$sql="insert into pwd_reset(email, token) values('$email','$token')";
$r=$con->query($sql);
$to=$_POST['mailid']; 
$subject="Reset your password of site ayushichouhan-cs064-shopattimrl.000webhostapp.com";
$msg="<a href=\"https://ayushichouhan-cs064-shopattimrl.000webhostapp.com/newpwd.php?token=" . $token . "\"></a>";
$msg=wordwrap($msg,150);
$headers="From: ayushichouhan12345@gmail.com";
@mail($to, $subject, $msg, $headers);
echo "Email sent<br>";
echo "Use the link in the email to change your password";
}
else
{
echo "No such user exist";
}
?>
