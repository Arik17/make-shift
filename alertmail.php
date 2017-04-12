<?php
session_start();
require("class.phpmailer.php"); // path to the PHPMailer class
include "db.php";

//$_SESSION[vcounter]=395;
$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "e-tickets@arikair.com"; // SMTP username
$mail->Password = "password@3"; // SMTP password
//$_SESSION[email]="folasope.oludairo@arikair.com";
$k=mysql_query("select * from acceptable_profile where transaction_id='$_POST[transaction_id]' and status='ACTIVE' and id=2");
$me = mysql_fetch_assoc($k);
                
                //$email.= $me['email'];
//$mail->AddAddress($news);
$username.= $me['username'];
$password.= $me['pwd'];
$firstname.= $me['firstname'];
			$email="taiwo.aiyerin@arikair.com";
$mail->AddAddress($email);
$mail->Subject = "LOGIN CREDENTIALS : INTEGRAL SOFTWARE!";
//$mail->Subject = "Customer Escalation Report";
$mail->Body = "Dear $firstname,
\n Welcome To Integral. Ensure you keep your credentials save and you dont disclose it to anyone as it is private to you.
\n You daily requires a Token to complete any transaction like sales, checking-in on INTEGRAL. you can always retrieve your token daily by answering your security questions. Once answered correctly, your token for that day is displayed. 
\n Your Usernamme is $username and password is $password. 
\n The link is https://webapp.arikair.com/integral
\n Go online with the link and then login.
\n For any clarification, Email : folasope.oludairo@arikair.com or itsupportteam@arikair.com
\n
\n Best regards,
\n IT Team
\n
\n
\n ARIK AIR LTD
\n Arik Aviation Centre, 
\n Murtala Mohammed Airport (Domestic Wing)
\n P.O. Box 10468, Ikeja, Lagos, Nigerian
\n Telephone: +234- 1 279-9900 
\n Email: hradvisors@arikair.com
\n Web: www.arikair.com
";
$mail->WordWrap = 160;
$mail->Send();
//echo $_SESSION[vcounter];
//header("location:broadcastmail2.php");
?>