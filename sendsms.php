<?php
//SMSLIVE247 PLATFORM
include "db.php";
session_start();
date_default_timezone_set('Africa/Lagos');
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");
$app_id="axcv";


$_POST[message]="Dear $rowad[firstname], You are scheduled to fly with Arik Air on Flight W3 $rowad[flt] $rowad[origin]-$rowad[destination]' on $rowad[travel_date]. Your Ticket Number is $tkt and Reference is $rowad[pnr]. Thanks for choosing Arik Air.";
$phone=$rowad[mobile];

$owneremail="adedoyin.osibanjo@arikair.com"; //password for this account is webadmin@123
$subacct="E-Ticket"; //another subaccount is HR. sender id is hr and password is arik
$subacctpwd="welcome@1";
$sender="Arik Air";
$inv = $_POST[message];
$url="http://www.smslive247.com/http/index.aspx?"
     ."cmd=sendmsg"
                 ."&sessionid=f9720341-9916-4d94-9298-7269e159d7e8"
                 ."&message=". UrlEncode($inv)
                 ."&sender=". UrlEncode($sender)
                 ."&sendto=". UrlEncode($phone)
                 ."&msgtype=0";

$te=file_get_contents($url);
//generating history
//$s=mysql_query("insert into sms_history (date,recipient,message,posted_time,posted_by) values ('$date','$_POST[recipient]','$_POST[message]','$time','$_SESSION[cn]')");

?>
