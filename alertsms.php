<?php
//SMSLIVE247 PLATFORM
include "db.php";
session_start();

//fetching students and login info 
$sqlk = "select * from acceptable_profile where transaction_id='$_POST[transaction_id]' and status='ACTIVE'";
$resultk = mysql_query($sqlk);
while ($rowk=mysql_fetch_assoc($resultk)){
extract($rowk);
$mobile=$rowk['mobile'];

//validating all numbers to 10-digits : ensuring the length of mobile number corresponds to the sms platform requirement.$mobile = substr($mobile, 1); //to make 11 digits 10 

if (strlen($mobile)==10){$mobile=$mobile;}elseif (strlen($mobile)==11){$mobile = substr($mobile, 1);}
//if after validating to 11 digits and both column are not mobile completely
if ((strlen($mobile)==10)&& (strlen($mobile2)==10)){$phone=$mobile.",".$mobile2;}elseif ((strlen($mobile)==10)&& (strlen($mobile2)!=10)){$phone=$mobile;}elseif ((strlen($mobile)!=10)&& (strlen($mobile2)==10)){$phone=$mobile2;}

$username=$rowk['username'];
$password=$rowk['pwd'];
$firstname=$rowk['firstname'];
$owneremail="webadmin.applications@arikair.com"; //password for this account is webadmin@123
$subacct="HR"; //another subaccount is HR. sender id is hr and password is arik
$subacctpwd="arik";
$sender="INTEGRAL";
$login="Welcome To INTEGRAL $firstname, your username as $username and password is $password and the link is https://webapp.arikair.com/integral";
$inv = "Dear $firstname,"." ".$login;
$url="http://www.smslive247.com/http/index.aspx?"
     ."cmd=sendmsg"
                 ."&sessionid=014d8a16-481e-45cd-86ed-6921736537c0"
                 ."&message=". UrlEncode($inv)
                 ."&sender=". UrlEncode($sender)
                 ."&sendto=". UrlEncode($phone)
                 ."&msgtype=0";

$te=file_get_contents($url);
}
?>