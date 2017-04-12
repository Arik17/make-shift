<?php
include "db.php";
$b=time();
$date=date("g:i:s A D, F jS Y",$b);
$datee=date("Y-m-d");
session_start();
//system info
$k1=$_SERVER['REMOTE_ADDR'];
$k2=gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$user_ip=$k1."/".$k2;
$sql=mysql_query("insert into logs (date,user_transaction_id,fullname,username,user_ip,logout_time) values('$datee','$_SESSION[user_transaction_id]','$_SESSION[cn]','$_SESSION[username]','$user_ip','$time')") or die(mysql_error());
$result=mysql_query($sql);
session_destroy();
header("location:index.php");

?>