<?php
session_start();
ob_start();
include_once ('db.php');
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");
   //$transaction_id= $_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Flights to and from Nigeria &amp; West Africa | Arik Air</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
		<script type="text/javascript" src="js/script.js"></script> 


  <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
  <script>
  $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading"); },
     ajaxStop: function() { $body.removeClass("loading"); }    
});
   </script>
   <style type="text/css">
*{
	padding: 0;
	margin: 0;
	border: 0;
}

body {
    
    background-image: url(images/standard_background_1.jpg);
    margin-top: 0px;
    margin-bottom: 0px;
    background-repeat: no-repeat;
       font-family: Verdana,Arial, Helvetica, sans-serif;
    height: 100%;
    font-size: 70%;
    margin:10px;
    
}
p {
    padding: 7px 0 7px 0;
    font-weight: 500;
    font-size: 10pt;
}
a {
    color: #656565;
    text-decoration:none;
}
a:hover{
    color: #4C99CC;
    text-decoration: none;
}
h1 {
    font-weight:200;
    color: #888888;
    font-size:16pt;
    padding-left:33px;
    margin:8px ;
}

/* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}
.clear{
    width:100%;
    float:none;
    clear:both;
}
form.register{
    width:800px;
    margin: 20px auto 0px auto;
    background-color:#FFF;
    padding:5px;
}
.heading{
    width:800px;
    height: 50px;
    margin: 20px auto 0px auto;
left:-1px; top:100%; color:#FFFFFF;
-moz-box-shadow: inset -5px px 5px #888;
-webkit-box-shadow: inset -5px -5px 5px #888;
box-shadow: inset 0px -5px 5px #6E063C;

}

.headings{
    width:800px;
    height: 50px;
    margin: 20px auto 0px auto;
left:-1px; top:100%; color:#FFFFFF;

}

form p{
    font-size: 8pt;
    clear:both;
    margin: 0;
    color:gray;
    padding:4px;
}
fieldset.row1{
    width:100%;
    padding:5px;
    float:left;
    border-top:1px solid #F5F5F5;
    margin-bottom:15px;
}
fieldset.row2{
    border-top:1px solid #F1F1F1;
    border-right:1px solid #F1F1F1;
    padding:5px;
    float:left;
    min-height:220px;
}
fieldset.row3{
    border-top: 1px solid #F1F1F1;
    padding: 5px;
    float: left;
    margin-bottom: 15px;
    width: 159px;
 
}
fieldset.row4,fieldset.row5{
    border-top:1px solid #F1F1F1;
    border-right:1px solid #F1F1F1;
    padding:5px;
    float:left;
    clear:both;
}
fieldset.row5{
    width:100%;
}

.register .form label{
    float: left;
    text-align: left;
    margin-right: 5px;
    margin-top:2px;
    width:auto;
}
.register .form input{
    width:100px;
}
.form td{
    border-right:1px solid #F1F1F1;
    border-top:1px solid #F1F1F1;
    border-bottom:1px solid #F1F1F1;
    border-left:0px solid #F1F1F1;
    padding:2px;
    margin:0;
}
.register legend{
    color: #4C99CC;
    padding:2px;
    margin-left: 14px;
    font-weight:bold;
    font-size: 14px;
    font-weight:100;
}
.register label{
    color:#444;
    width:100px;
    float: left;
    text-align: right;
    margin-right: 6px;
    margin-top:2px;
}
form.register label.optional{
    float: left;
    text-align: right;
    margin-right: 6px;
    margin-top:2px;
    color: #A3A3A3;
}
form.register label.obinfo{
    float:right;
    padding:3px;
    font-style:italic;
}

.datas{
	font-weight:bold;}
form.register input{
    width: 140px;
    color: #505050;
    float: left;
    margin-right: 5px;
}
form.register input.long{
    width: 247px;
    color: #505050;
}
form.register input.short{
    width: 40px;
    color: #505050;
}
form.register input[type=radio]{
    float:left;
    width:15px;
}
form.register label.gender{
    margin-top:-1px;
    margin-bottom:2px;
    width:34px;
    float:left;
    text-align:left;
    line-height:19px;
}
form.register input[type=text]{
    border: 1px solid #E1E1E1;
    height: 18px;
}
form.register input[type=password]{
    border: 1px solid #E1E1E1;
    height: 18px;
}

form.register input[type=button]:hover{
    cursor:pointer;
    background:#ccc;
}
form.register  .submit{
    color: #fff;
    cursor: pointer;
    float:left;
    margin:10px;
    padding:5px;
    background: #4C99CC;
    background-image: linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -o-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -moz-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -webkit-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -ms-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0,rgba(0, 0, 0, 0.1)),color-stop(1,rgba(255, 255, 255, 0.1)));

}
.suba:hover {
	color:#CCC;
	}

.suba {
	  color: #fff;
	  font-weight:bold;
    cursor: pointer;
    float:left;
    margin:0% 0% 0% 30%;
    padding:15px;
	font-size:16px;
    background: #4C99CC;
    background-image: linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -o-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -moz-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -webkit-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -ms-linear-gradient(bottom,rgba(0, 0, 0, 0.1) 0,rgba(255, 255, 255, 0.1) 100%);
    background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0,rgba(0, 0, 0, 0.1)),color-stop(1,rgba(255, 255, 255, 0.1)));}
form.register  .submit:hover{
    background:#505050;

}
form.register  .submit:active{
    background:#ccc;
        color: #000;
}
form.register input[type=text].small{
    border: 1px solid #E1E1E1;
    height: 18px;
    width:30px;
}
form.register input[type=checkbox] {
    width:14px;
    margin-top:4px;
}
form.register select{
    border: 1px solid #E1E1E1;
    float:left;
    margin-bottom:3px;
    color: #505050;
    margin-right:5px;
}
input:focus, select:focus{
    background-color: #F1F1F1;
}
p.info{
    font-size:7pt;
    color: gray;
}
p.agreement{
    margin-left:15px;
}
p.agreement label{
    width:390px;
    text-align:left;
    margin-top:3px;
}

   </style>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
<link rel="stylesheet" href="js/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="js/ui.theme.css" type="text/css">
    </head>
    <body> 
    <div class="heading">
         
            <a href="index.php"><img src="images/LOGO-BASIC.png" width="155" height="70" border="0" /></a>
                </div>  
          <div class="headings">  
         <span style="font-weight:bold; font-size:18px; float:right; padding:10px 10px 10px 10px;">Payment Confirmation</span>
            
         
    </div>   
    <form class="register" method="POST">
          <fieldset class="row1">
				<legend>Bookings</legend>
		 <?php 
		 $allpnr = $_GET['transaction_id'];
		 list($pnr, $pnrinfo) = explode("-", $allpnr);



		// $tick = array();
		 $query = mysql_query("SELECT * FROM temp_name WHERE pnr= '".$pnr."' and status='BOOKED' and location='WEB' and booking_date='$date'") or die(mysql_error()); 
		 while($rowad = mysql_fetch_assoc($query)){
			//include "ticketonly.php";
//TRIM to remove whitespaces
$rowad['sta']=trim($rowad['sta']);
$rowad['std']=trim($rowad['std']);
$rowad['flt']=trim($rowad['flt']);
$rowad['ticket_class']=trim($rowad['ticket_class']);
 
$randnum = rand(100000000,999999999);
$tkt="7256".$randnum;



	
$check = mysql_query("select * from collection WHERE pnr = '".$rowad['pnr']."' and origin = '".$rowad['origin']."' and destination='".$rowad['destination']."' and pax='".$rowad['pax']."' and travel_date='".$rowad['travel_date']."' ");

if(mysql_num_rows($check)>0){
	
	
	echo '<p>Your tickets has already been issued successfully. Please check your email for confirmation of your ticket. Call our call Centre on 012799999 if you did not recieve an email from us.</p>';
              
			  
} else{ 
	//}




//insert into collection table
$q=mysql_query("insert into collection (transaction_id,uref,sales_date,fop,pax,surname,firstname,category,origin,destination,dob,travel_date,flt_no,sta,std,booking_class,ticket_class,ticket_no,pnr,pnr_ref,ffp_no,passport_no,pax_mobile,pax_email,amount,status,posted_time,uti,fltsched_id,location,country,currency,title,issuing_city) values ('$rowad[transaction_id]','$uref','$date','WEB','".$rowad['surname'].'/'.$rowad['firstname']."','$rowad[surname]','$rowad[firstname]','$rowad[category]','$rowad[origin]','$rowad[destination]','$rowad[dob]','$rowad[travel_date]','$rowad[flt]','$rowad[sta]','$rowad[std]','$rowad[booking_class]','$rowad[ticket_class]','$tkt','$rowad[pnr]','$pnrinfo','$rowad[ffp_no]','$rowad[passport_no]','$rowad[mobile]','$rowad[email]','$rowad[amount]','WEB','$time','$rowad[uti]','$rowad[fltsched_id]','$rowad[location]','$rowad[country]','$rowad[currency]','$rowad[title]','$rowad[issuing_city]')") or die(mysql_error()); // or die(mysql_error())
//change the status to sales
$qq=mysql_query("update temp_name set status='SALES' where pnr='$pnr' and status='booked'"); 

include("sendsms.php");
                                                                                                                                                                                                                                                                
//$_SESSION['pnr'] = $rowad['pnr'];
//$_SESSION['tktno'] = $tkt.'<br> ';

echo '<p>Your ticket has been issued successfully. Call our call Centre on 012799999 if you did not get our email.</p>';
              
			    echo '<p>Passenger Name: <b>' .$rowad['pax']. '</b></p>';
           echo '<p>Ticket Number: <b>' .$tkt. '</b></p>';
                 echo    '<p>Reference Number: <b>' .$rowad['pnr'].'</b></p><br><br>';
				 
			//	 $
                 // include("alertmailnew.php"); 
		 	}
	
		 }
		 ?>
     <?php   if(mysql_num_rows($check)<1){ ?>
           <?php
		  // $paxname = $names;
		   
		  // echo $tick;
		  
		  /* $app_id="axcv";

$_POST[message]="Dear ADEYINKA ADEKOYA, You are scheduled to fly with Arik Air on Flight W3 603 ABB-LOS on 2017-04-21. Your Ticket Number is 7251056258745 and Reference is P0Y8U1. Thanks for choosing Arik Air.";
$phone='8077791181';
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
*/
        //
		   ?>
	
                <?php } ?>  
				
			  <div class="clear"></div>
            </fieldset>
            
     
       



                  
                   <br />
              
                 <br />
              <br />
     
              <br />
               <br />
              
                 <br />
              <br />
     
              <br />
      <br />
              
                 <br />
              <br />
     
      <br />
              	
            <fieldset class="row1">
                <legend>Further Information</legend>
				<p>For All International Flights out of Lagos Airport, Check-in opens <strong>4½ hours</strong> and closes 90 minutes before your scheduled take off			
		Avoid the queues, check-in online to selected destinations. Online check-in opens <strong>24 hours before the scheduled departure</strong> of the flight and <strong>closes 3 hours before</strong>. Visit <a href="http://www.arikair.com/" target="_blank">www.arikair.com</a> for details. </p>
				<div class="clear"></div>
            </fieldset>
    
          
   
              
            
			
	
	  <div class="clear"></div>
            
      </form> 
<div class="register">
		
                 
    </div>
</body>
	<!-- Start of StatCounter Code for Default Guide -->

<div class="modal"><!-- Place at bottom of page --></div>
<!-- End of StatCounter Code for Default Guide -->
</html>

<?php session_destroy(); ?>

 
    </body>