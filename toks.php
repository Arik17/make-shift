<?php
session_start();
ob_start();
include_once ('db.php'); 
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");

$s=mysql_query("select * from dailytok where user_transaction_id='$_SESSION[user_tranmsaction_id]' and date='$date'");
$rs=mysql_fetch_assoc($s);
$_SESSION[toks]=$rs[token];