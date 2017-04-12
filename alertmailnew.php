<?php

require("class.phpmailer.php"); // path to the PHPMailer class


//$_SESSION[vcounter]=395;
$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "itdept.arikair@gmail.com"; // SMTP username
//$mail->Username = "itdept.arikair@gmail.com"; // SMTP username
$mail->Password = "password@3"; // SMTP password
//$_SESSION[email]="folasope.oludairo@arikair.com";
                
                //$email.= $me['email'];
//$mail->AddAddress($news);
$username.= $me['firstname'].' '.$me['surname'];
//$firstname.= $me['firstname'];
$email="textaiwo@yahoo.com";
$mail->AddAddress($email);
$mail->From = 'eticket@arikair.com';
$mail->FromName = 'Arik Air Bookings';
$mail->AddReplyTo('callcentre@arikair.com');
$mail->Subject = "Your Bookings at Arik Air Website";
//$mail->Subject = "Customer Escalation Report";
$mail->Body = "Dear $username,
\n Thank you for choosing to fly with Arik Air.
\n Your bookings with Arik Air was completed successfully and below are the details of your tickets.
\n Name: $username
\n Ticket Number: $tkt
\n Passenger Reference Number: $me[pnr]
\n Mobile Number: $me[mobile]
\n Flight Number: W3 $me[flt]
\n Departure Date: $me[travel_date]
\n Departure: $me[std]
\n Arrival: $me[sta]
\n Click on the link below to download your ticket
\n https://webapp.arikair.com/integral/eticket.php?transaction_id=$tkt
\n
\n Enjoy your flight.
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