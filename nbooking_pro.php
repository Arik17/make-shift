<?php
session_start();
include "db.php"; 
$page="bookingtosales.php"; 
include "priviledgechecker.php";
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");

if(isset($_GET[transaction_id])&&$_GET[action]=="Delete"){
mysql_query("update temp_name set status='cancelled' where transaction_id='$_GET[transaction_id]'");
//total sum to be paid
$sad=mysql_query("select sum(amount) as amount from temp_name where booking_date='$date' and uti='$_SESSION[user_transaction_id]' and pnr='$_SESSION[pnr]' and status <>'cancelled'"); $rsad=mysql_fetch_assoc($sad);
}

//fetching selected fare//fetching selected fare and flt info
$v=mysql_query("select * from fares_pricing where transaction_id='$_SESSION[fares_transaction_id]'"); 
$rv=mysql_fetch_assoc($v);

$ad=mysql_query("select * from temp_name where booking_date='$date' and uti='$_SESSION[user_transaction_id]' and pnr='$_SESSION[pnr]' and status <>'cancelled'"); 

//total sum to be paid
$sad=mysql_query("select sum(amount) as amount from temp_name where booking_date='$date' and uti='$_SESSION[user_transaction_id]' and pnr='$_SESSION[pnr]' and status <>'cancelled'"); $rsad=mysql_fetch_assoc($sad);




//counting the no of booking for today

if (isset($_POST[Submit])){ //to finally confirm the booking
$q=mysql_query("update temp_name set status='BOOKED' where booking_date='$date' and uti='$_SESSION[user_transaction_id]' and pnr='$_SESSION[pnr]' and status<>'cancelled'"); 
$_SESSION[mobile]="";
$_SESSION[email]="";
session_write_close();
header("location:mybookings2.php");
}


if (isset($_POST[Submit2])){ 
$_SESSION[email]=$_POST[email];
$_SESSION[mobile]=$_POST[mobile];
$_POST[surname]=trim($_POST[surname]);
$_POST[firstname]=trim($_POST[firstname]);

//getting the number of days between date to know if child or infant
$date=date("Y-m-d");
$day=substr("$date",8);
$month = substr("$date", 5, 2);// 2015-04-05 will produce 04
$year = substr("$date", 0, 4); //2015-04-05 will produce 2015
$end=$year."-".$month."-".$day;
$start=$_POST[dob];
$diff = (strtotime($end)- strtotime($start))/24/3600; 
if ($diff<733){$infant=1;}if ($diff<4384){$child=1;}
//fetching selected fare and flt info
$q=mysql_query("select * from fares_pricing where transaction_id='$_SESSION[fares_transaction_id]'"); $rq=mysql_fetch_assoc($q);
//warning if it exceed a child age and child is selected
if ((!empty($_POST[surname]))&&(!empty($_POST[firstname]))&&($_POST[category]=="CD")&&($child!=1)){
header("location:nbooking_pro.php?msg=Not Submitted because the entry is NOT A CHILD");
}elseif ((!empty($_POST[surname]))&&(!empty($_POST[firstname]))&&($_POST[category]=="IT")&&($infant!=1)){
header("location:nbooking_pro.php?msg=Not Submitted because the entry is NOT AN INFANT");
}elseif ((!empty($_POST[surname]))&&(!empty($_POST[firstname]))&&($_POST[category]=="AD")){
$transaction_id=md5(time().$_SESSION[user_transaction_id]);
$child=0.75*($rq[adult_fare]);
$infant=0.1*($rq[adult_fare]);
if ($_POST[category]=="AD"){$amount=$rq[adult_fare];}elseif ($_POST[category]=="CD"){$amount=$child;}else{$amount=$infant;}
$pax=$_POST[surname]." ".$_POST[firstname];
$q=mysql_query("insert into temp_name (transaction_id,travel_date,title,pax,surname,firstname,dob,passport_no,ffp_no,email,mobile,category,flt,sta,std,ticket_class,origin,destination,amount,status,pnr,booking_date,booking_class,fltsched_id,posted_by,posted_time,uti,location,country,currency,perc,user_priviledge,shift,issuing_city) values ('$transaction_id','$_SESSION[tdate]','$_POST[title]','$pax','$_POST[surname]','$_POST[firstname]','$_POST[dob]','$_POST[passport]','$_POST[ffp]','$_POST[email]','$_POST[mobile]','$_POST[category]','$_SESSION[flt_no]','$_SESSION[sta]','$_SESSION[std]','$rq[ticket_class]','$_SESSION[origin]','$_SESSION[destination]','$amount','','$_SESSION[pnr]','$date','$rq[booking_class]','$_SESSION[schedule_transaction_id]','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]','$_SESSION[user_location]','$_SESSION[user_country]','$_SESSION[user_currency]','$_SESSION[user_perc]','$_SESSION[user_level]','$_SESSION[shift]','$_SESSION[issuing_city]')") or die(mysql_error());
session_write_close();
header("location:nbooking_pro.php");
}elseif ((!empty($_POST[surname]))&&(!empty($_POST[firstname]))&&($_POST[category]=="CD")&&($child==1)){
$transaction_id=md5(time().$_SESSION[user_transaction_id]);
$child=0.75*($rq[adult_fare]);
$infant=0.1*($rq[adult_fare]);
if ($_POST[category]=="AD"){$amount=$rq[adult_fare];}elseif ($_POST[category]=="CD"){$amount=$child;}else{$amount=$infant;}
$pax=$_POST[surname]." ".$_POST[firstname];
$q=mysql_query("insert into temp_name (transaction_id,travel_date,title,pax,surname,firstname,dob,passport_no,ffp_no,email,mobile,category,flt,sta,std,ticket_class,origin,destination,amount,status,pnr,booking_date,booking_class,fltsched_id,posted_by,posted_time,uti,location,country,currency,perc,user_priviledge,shift,issuing_city) values ('$transaction_id','$_SESSION[tdate]','$_POST[title]','$pax','$_POST[surname]','$_POST[firstname]','$_POST[dob]','$_POST[passport]','$_POST[ffp]','$_POST[email]','$_POST[mobile]','$_POST[category]','$_SESSION[flt_no]','$_SESSION[sta]','$_SESSION[std]','$rq[ticket_class]','$_SESSION[origin]','$_SESSION[destination]','$amount','','$_SESSION[pnr]','$date','$rq[booking_class]','$_SESSION[schedule_transaction_id]','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]','$_SESSION[user_location]','$_SESSION[country]','$_SESSION[currency]','$_SESSION[user_perc]','$_SESSION[user_level]','$_SESSION[shift]','$_SESSION[issuing_city]')") or die(mysql_error());
session_write_close();
header("location:nbooking_pro.php?msg=Successful");
}elseif ((!empty($_POST[surname]))&&(!empty($_POST[firstname]))&&($_POST[category]=="IT")&&($infant==1)){
$transaction_id=md5(time().$_SESSION[user_transaction_id]);
$child=0.75*($rq[adult_fare]);
$infant=0.1*($rq[adult_fare]);
if ($_POST[category]=="AD"){$amount=$rq[adult_fare];}elseif ($_POST[category]=="CD"){$amount=$child;}else{$amount=$infant;}
$pax=$_POST[surname]." ".$_POST[firstname];
$q=mysql_query("insert into temp_name (transaction_id,travel_date,title,pax,surname,firstname,dob,passport_no,ffp_no,email,mobile,category,flt,sta,std,ticket_class,origin,destination,amount,status,pnr,booking_date,booking_class,fltsched_id,posted_by,posted_time,uti,location,country,currency,perc,user_priviledge,shift,issuing_city) values ('$transaction_id','$_SESSION[tdate]','$_POST[title]','$pax','$_POST[surname]','$_POST[firstname]','$_POST[dob]','$_POST[passport]','$_POST[ffp]','$_POST[email]','$_POST[mobile]','$_POST[category]','$_SESSION[flt_no]','$_SESSION[sta]','$_SESSION[std]','$rq[ticket_class]','$_SESSION[origin]','$_SESSION[destination]','$amount','','$_SESSION[pnr]','$date','$rq[booking_class]','$_SESSION[schedule_transaction_id]','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]','$_SESSION[user_location]','$_SESSION[country]','$_SESSION[currency]','$_SESSION[user_perc]','$_SESSION[user_level]','$_SESSION[shift]','$_SESSION[issuing_city]')") or die(mysql_error());
session_write_close();
header("location:nbooking_pro.php?msg=Successful");
}else{
header("location:nbooking_pro.php?msg=Your input was not Successful");
}

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: PSS -  Arik Air</title>
<style type="text/css">
<!--
body {
	background-image: url(images/standard_background_1.jpg);
	margin-top: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond;
}
.bidex {
	BORDER-BOTTOM: #CCCCCC 1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC 1px solid; COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond; FONT-SIZE: 16px
}
.bidex2{
	BORDER-BOTTOM: #CCCCCC 1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC 1px solid; COLOR: #000033; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond; FONT-SIZE: 16px
}
.Example_H {
-moz-box-shadow: inset -5px px 5px #888;
-webkit-box-shadow: inset -5px -5px 5px #888;
box-shadow: inset 0px -5px 5px #333333;
border-radius: 7px;
}
.border{ border-style: solid;   border: 2px solid  #000066; border-radius: 5px; }
#nav, .nav, #nav .nav li { margin:0px; padding:0px; width:100%; }

#nav li {float:left; display:inline; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:normal; margin-right:1em; margin-top:5px; margin-left:7px; cursor:pointer; list-style:none; padding:0px 10px 0px 10px;  position:relative;}

#nav li ul.first {left:-1px; top:100%; color:#FFFFFF; background:#333333; z-index:100;}

li, li a {color:#000; font-family:Verdana, Arial, Helvetica, sans-serif; text-decoration:none;}

#nav li ul li, .nav li ul li, nav li ul li ul li {color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif;}

#nav .nav li { width:100%; text-indent:10px; font-family:Verdana, Arial, Helvetica, sans-serif; line-height:30px; margin-right:20px; position:relative; border-bottom:1px #fff solid; border-left:none; border-right:none; background:#333333; }

#nav li a {display:block; width:inherit; height:inherit; font-family:Verdana, Arial, Helvetica, sans-serif;}

ul.nav { display:none; }

#nav li:hover > a, #nav li:hover { color:#fff; background:#6E063C; } 

li:hover > .nav { display:block; position:absolute; width:250px; border:1px #000 solid; } 
li:hover {  }  
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-size: 35px;
	color: #FFFFFF;
}
.opc{
    opacity: 0.9;
}
.style5 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #FF0000;
	font-weight: bold;
}
.style7 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FF0000;
	}
p {
    opacity:1;
    transition:opacity 500ms;
}
p.waa {
    opacity:0;
}
input[type='submit']
{
/*width: 90px;*/
height: 25px;
background-color:#003366;
color:#fff; font-size:14px;
}
input[type='submit']:hover
{
height: 25px;
background-color: #990000;
color:#fff; font-size:14px;
}
</style>
<script src="datepicker/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="datepicker/jquery.min.js"></script>
<script type="text/javascript" src="datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="datepicker/ui.datepicker.js"></script>
<link rel="stylesheet" href="datepicker/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="datepicker/ui.theme.css" type="text/css">
<link rel="stylesheet" href="datepicker/demos.css" type="text/css">
<script type="text/javascript">
    // show jquery calendar
	$(function() {
		$("#datepicker").datepicker({ minDate: 0});
	});
    </script>
<script type="text/javascript">
    // show jquery calendar
	$(function() {
		$("#datepickers").datepicker({ minDate: 0});
	});
</script>
<script type="text/javascript">
    // show jquery calendar
	$(function() {
		$("#datepickera").datepicker({ minDate: 0});
	});
</script>
<script type="text/JavaScript">
setTimeout(function(){
    document.getElementById('aap').className = 'waa';
}, 15000);
</script>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<script language="javascript">

    function ToUpper(ctrl)

    {  

    var t = ctrl.value;

    ctrl.value = t.toUpperCase();

    }

    function ToLower(ctrl)

    {  

    var t = ctrl.value;

    ctrl.value = t.toLowerCase();

    }

    </script>
<script type='text/javascript'>

function formValidator(){

var errors=[];
	// Make quick references to our fields
 		
	    var surname = document.getElementById('surname');
	    var firstname = document.getElementById('firstname');
	    var category = document.getElementById('category');
	    var mobile = document.getElementById('mobile');
	    var email = document.getElementById('email');
	    var dob = document.getElementById('dob');

if (surname.value.length==0){
errors.push("PASSENER SURNAME required");
}	
if (firstname.value.length==0){
errors.push("PASSENGER FIRSTNAME required");
}
if (title.selectedIndex==""){
errors.push("TITLE is required to identify SEX");
}	
if (category.selectedIndex==0){
errors.push("CATEGORY must be selected");
}
if ((category.value!="AD")&&(dob.value.length<10)){
errors.push("DATE OF BIRTH (YYYY-MM-DD) Required");
}
if (mobile.value.length==0){
errors.push("MOBILE number required");
}
/*
if (email.value.length==0){
errors.push("PASSENGER EMAIL required");
}*/

if (errors.length >0){
alert(errors.join("\n"));
return false;
}
Submit.disabled=true;
return true;
}
	

</script>
<style type="text/css">
<!--
.style13 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style8 {
	color: #990000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style14 {
	color: #FFFFFF;
	font-weight: bold;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }
.style18 {color: #009900}
.style22 {
	color: #FF0000;
	font-weight: bold;
}
.bidex1 {BORDER-BOTTOM: #CCCCCC 1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC 1px solid; COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond; FONT-SIZE: 11px 
}
.style23 {	font-size: 16px;
	font-weight: bold;
}
.style25 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style27 {color: #FF0000; font-weight: bold; font-size: 16px; }
.style28 {font-size: 14px}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<div align="center">
  <table width="1060" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="139" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="155" height="16"></td>
            <td width="681"></td>
            <td width="224"></td>
          </tr>
          <tr>
            <td height="70" valign="top"><a href="index.php"><img src="images/LOGO-BASIC.png" width="155" height="70" border="0" /></a></td>
            <td>&nbsp;</td>
            <td rowspan="2" align="right" valign="middle"><img src="images/mssg.png" width="224" height="62" /></td>
          </tr>
          <tr>
            <td height="7"></td>
            <td></td>
          </tr>
          <tr>
            <td height="40" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="Example_H">
                <!--DWLayoutTable-->
                <tr>
                  <td width="961" rowspan="2" valign="top"><ul id="nav">
                      <?php include("includes/menu.php"); ?>
                    </ul></td>
                  <td width="66" height="35"></td>
                  <td width="33" align="right" valign="top"><a href="processor.php"><img src="images/logout.png" width="35" height="35" border="0" /></a></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td height="6"></td>
            <td></td>
            <td></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="577" height="23">&nbsp;</td>
      <td width="483" align="right" valign="top"><span class="style13">Logged in As: <?php echo $_SESSION[cn];?></span></td>
    </tr>
    <tr>
      <td height="521" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="1060" height="56" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="opc">
                <!--DWLayoutTable-->
                <tr>
                  <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;Booking Engine +++ ..... </span></td>
                </tr>
              </table></td>
          </tr>
		  <tr><?php 
		  if (isset($_POST[Submit])){
if (($_SESSION[seat_available]>=$_SESSION[npeople])){ //PROVIDED SEAT IS AVAILABLE

//sms

foreach( $_POST['transaction_id'] as $id ){
$uti=$_SESSION[user_transaction_id].time();
//include "pnrticketnogen.php";

//$k=mysql_query("select * from fares_pricing where uref='$_SESSION[uref]'");
//$rk=mysql_fetch_assoc($k);

//$rqst=$_POST['rqst'][$id];
//if ($rqst=="AD"){$amount=$_SESSION[adultcost];}elseif($rqst=="CD"){$amount=$_SESSION[childcost];}elseif ($rqst=="INFT"){$amount=$_SESSION[infantcost];}
    $price = $_POST[$id];
	$surname=$_POST['surname'][$id];
	$firstname=$_POST['firstname'][$id];
	$mobile=$_POST['mobile'][$id];
	$email=$_POST['email'][$id];
	$passport=$_POST['passport'][$id];
	$ffp_no=$_POST['ffp_no'][$id];
	$infant_surname=$_POST['infant_surname'][$id];
	$pax=$surname."/".$firstname;
	
	
	echo $surname;
	echo $infant_surname;
	
    // $query =mysql_query("UPDATE temp_name SET surname ='$surname',firstname ='$firstname' WHERE transaction_id = '$id'");
	 //insert into booking
//$k=mysql_query("insert into bookingtb (transaction_id,sales_date,uref,pax,surname,firstname,origin,destination,travel_date,flt_no,booking_class,ticket_class,ticket_no,pnr,passport_no,ffp_no,pax_mobile,pax_email,bank,teller,amount,sta,std,posted_by,posted_time) values ('$rk[transaction_id]','$date','$uti','$pax','$surname','$firstname','$rk[origin]','$rk[destination]','$_SESSION[tdate]','$rk[flt_no]','$rk[booking_class]','$rk[ticket_class]','$_SESSION[ticket_no]','$_SESSION[pnr]','$passport','$ffp_no','$mobile','$email','$_POST[bank]','$_POST[teller]','$amount','$rk[sta]','$rk[std]','$_SESSION[cn]','$time')") or die(mysql_error()); 
}
//header("location:nbooking.php?msg=Booking was Successful");
}
}

?></tr>
          <tr>
            <td height="264" valign="top"><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
                  <!--DWLayoutTable-->
                  <tr>
                    <td width="21" height="14"></td>
                    <td width="103"></td>
                    <td width="23"></td>
                    <td width="525"></td>
                    <td width="69"></td>
                    <td width="294" rowspan="2" align="right" valign="middle"><input type="submit" name="Submit" value="Confirm &amp; Save My Booking" /></td>
                    <td width="25"></td>
                  </tr>
                  <tr>
                    <td height="23"></td>
                    <td valign="top"><span class="style7">Today :</span> <span class="style6"><?php echo $nd;?></span></td>
                    <td>&nbsp;</td>
                    <td align="center" valign="middle"><span class="style13"> </span><span class="style9">
                      
                    </span></td>
                    <td>&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="655"></td>
                    <td colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                        <!--DWLayoutTable-->
                        <tr>
                          <td width="18" height="18"></td>
                          <td colspan="2" align="left" valign="top"><span class="style22">Travel Date : <?php echo $_SESSION[tdate];?></span></td>
                          <td colspan="3" align="center" valign="top"><span class="style9"><span class="style22">No Of Seat For your Request :</span> <span class="style23"><?php echo $_SESSION[npeople];?></span></span></td>
                          <td width="13"></td>
                          <td width="226"></td>
                          <td width="17"></td>
                          <td width="6"></td>
                        </tr>
                        <tr>
                          <td height="33"></td>
                          <td colspan="7" align="center" valign="middle" bgcolor="#00CC00"><span class="style14">ONE - WAY (AVAILABILITY INFORMATION) <?php echo $_SESSION[INF];?></span></td>
                          <td>&nbsp;</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="73"></td>
                          <td colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <!--DWLayoutTable-->
                              <tr>
                                <td width="127" height="1"></td>
                                <td width="57"></td>
                                <td width="59"></td>
                                <td width="55"></td>
                                <td width="69"></td>
                                <td width="78"></td>
                                <td width="149"></td>
                                <td width="110"></td>
                                <td width="169"></td>
                                <td width="96"></td>
                              </tr>
                              <tr>
                                <td height="38" align="center" valign="top" bgcolor="#003366" class="bidex"><span class="style16">FLT</span></td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">ORG</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">DEST</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">STD</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">STA</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">BCLASS</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">No Of Seat Avail </td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">TKT CLASS </td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">Adult Fare </td>
                                <td align="center" valign="top" bgcolor="#FF0000" class="bidex">Select &gt;&gt; </td>
                              </tr>
                              <?php 
$resultq=mysql_query("select * from fares_pricing where origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and transaction_id='$_SESSION[fares_transaction_id]'"); 
while ($rowq=mysql_fetch_assoc($resultq)){$i++; ?>
                              <tr>
                                <td height="34" align="center" valign="top"><?php echo $_SESSION[flt_no];?></td>
                                <td valign="top"><?php echo $rowq[origin];?></td>
                                <td valign="top"><?php echo $rowq[destination];?></td>
                                <td valign="top"><?php echo $_SESSION[std];?></td>
                                <td valign="top"><?php echo $_SESSION[sta];?></td>
                                <td align="center" valign="top"><?php echo $book_class=trim($rowq[booking_class]);?></td>
                                <?php
		  $sqld="select count(*) as id from collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and booking_class='$book_class' and flt_no='$_SESSION[flt_no]'";
		  $resultd = mysql_query($sqld);
		  while ($rowd=mysql_fetch_assoc($resultd)){?>
                                <td align="center" valign="top"><?php 
	//for mars booking
$sqlms=mysql_query("select count(*) as id from mars_dumps where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and booking_class='$book_class' and flt_no='$_SESSION[flt_no]'");	$rowms = mysql_fetch_assoc($sqlms);
//for additional collection
$_SESSION[ticket_class]=$ticket_class;
$sqlac=mysql_query("select count(*) as id from additional_collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and booking_class='$book_class' and flt_no='$_SESSION[flt_no]'");	$rowac = mysql_fetch_assoc($sqlac);								
								
								echo $rowq[nseat]-$rowq[hseat]-$rowd[id]-$rowms[id]-$rowac[id];?></td>
                                <?php
		}
        ?>
                                <td align="center" valign="top"><?php echo $rowq[ticket_class];?></td>
                                <td align="center" valign="top"><?php echo $rowq[adult_fare];?></td>
                                <td align="center" valign="top"><label><span class="style18">SELECTED</span></label></td>
                              </tr>
                              <?php
		}
        ?>
                            </table></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="25" colspan="9" align="center" valign="middle"><hr /></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="18"></td>
                          <td width="157" rowspan="2" valign="top"><span class="style27">TOTAL AMOUNT </span></td>
                          <td colspan="2" rowspan="2" align="left" valign="middle"><?php echo number_format($rsad[amount],2);?></td>
                          <td width="267" rowspan="2" valign="top"><span class="style28">INFANT AMOUNT = <span class="style22"><?php echo (0.1 * ($rv[adult_fare]));?></span></span></td>
                          <td width="71"></td>
                          <td></td>
                          <td valign="top"><span class="style28">CHILD AMOUNT = <span class="style22"><?php echo (0.75 * ($rv[adult_fare]));?></span></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="3"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="186"></td>
                          <td colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bidex2">
                            <!--DWLayoutTable-->
                            <tr>
                              <td height="17" colspan="18" align="center" valign="middle" bgcolor="#FF0000"><span class="style25">CONTROL BOARD</span> </td>
                              </tr>
                            <tr>
                              <td height="25" colspan="3" align="right" valign="middle">Email : </td>
                                <td colspan="4" valign="top"><label>
                                  <input name="email" type="text" id="email" value="<?php echo $_SESSION[email];?>" size="35" />
                                </label></td>
                                <td colspan="3" align="center" valign="middle">Mobile : </td>
                                <td colspan="3" align="left" valign="top"><label>
                                  <input name="mobile" type="text" id="mobile" value="<?php echo $_SESSION[mobile];?>" onkeypress="return isNumberKey(event)"/>
                                </label></td>
                                <td width="28">&nbsp;</td>
                                <td width="95">&nbsp;</td>
                                <td width="19">&nbsp;</td>
                                <td width="115" valign="top"><label>
                                  <input type="submit" name="Submit2" value="Submit" onclick="return formValidator();" />
                                </label></td>
                                <td width="26">&nbsp;</td>
                              </tr>
                            <tr>
                              <td colspan="2" rowspan="2" align="left" valign="top">TITLE</td>
                                <td width="36" height="1"></td>
                                <td width="46"></td>
                                <td width="85"></td>
                                <td width="50"></td>
                                <td width="121"></td>
                                <td width="13"></td>
                                <td width="11"></td>
                                <td width="58"></td>
                                <td width="54"></td>
                                <td width="19"></td>
                                <td colspan="2" rowspan="2" align="left" valign="top">DOB</td>
                                <td colspan="2" rowspan="2" align="left" valign="top">FFP </td>
                                <td colspan="2" rowspan="2" align="left" valign="middle">CATEGORY</td>
                              </tr>
                            
                            
                            <tr>
                              <td height="24" colspan="3" valign="top">SURNAME</td>
                                <td colspan="3" align="left" valign="top">FIRSTNAME</td>
                                <td colspan="4" align="left" valign="top">PASSPORT</td>
                              </tr>
                            <tr>
                              <td height="23" colspan="2" align="left" valign="top"><label>
                                <select name="title" id="title">
                                  <option>Title</option>
                                  <option value="Mr.">Mr.</option>
                                  <option value="Mrs.">Mrs.</option>
                                  <option value="Miss">Miss</option>
                                </select>
                              </label></td>
                                <td colspan="3" valign="top"><label>
                                <input name="surname" type="text" id="surname" onKeyUp="ToUpper(this)"/>
                                </label></td>
                                <td colspan="3" align="left" valign="top"><label>
                                  <input name="firstname" type="text" id="firstname" onKeyUp="ToUpper(this)" />
                                </label></td>
                                <td colspan="4" align="left" valign="top"><label>
                                  <input name="passport" type="text" id="passport" size="15" onKeyUp="ToUpper(this)" />
                                </label></td>
                                <td colspan="2" align="left" valign="top"><label>
                                  <input name="dob" type="text" id="dob" size="15" maxlength="10" placeholder="YYYY-MM-DD"/>
                                </label></td>
                                <td colspan="2" align="left" valign="top"><label>
                                  <input name="ffp" type="text" id="ffp" size="15"onKeyUp="ToUpper(this)" />
                                </label></td>
                                <td colspan="2" align="left" valign="top"><label>
                                  <select name="category" id="category">
                                    <option value="0">Select</option>
                                    <option value="AD">ADULT</option>
                                    <option value="CD">CHILD</option>
                                    <option value="IT">INFANT</option>
                                  </select>
                                </label></td>
                              </tr>
                            <tr>
                              <td width="28" height="19">&nbsp;</td>
                                <td colspan="16" align="center" valign="middle"><P class="style8" id="aap"><?php echo stripslashes($_GET[msg]);?></P></td>
                                <td></td>
                              </tr>
                            <tr>
                              <td height="24" colspan="18" align="center" valign="middle" bgcolor="#322240"><span class="style25">RESULT OF YOUR SUBMISSION </span></td>
                            </tr>
							
                            <tr>
                              <td height="22" colspan="4" align="center" valign="top" bgcolor="#322240" class="bidex">SURNAME</td>
                              <td colspan="2" align="center" valign="top" bgcolor="#322240" class="bidex">FIRSTNAME</td>
                              <td colspan="3" align="center" valign="top" bgcolor="#322240" class="bidex">PASSPORT</td>
                              <td colspan="2" align="center" valign="top" bgcolor="#322240" class="bidex">DOB</td>
                              <td colspan="2" align="center" valign="top" bgcolor="#322240" class="bidex">AMOUNT</td>
                              <td colspan="2" align="center" valign="top" bgcolor="#322240" class="bidex">FFP NO </td>
                              <td colspan="3" align="center" valign="top" bgcolor="#322240" class="bidex">REMOVE </td>
                              </tr>
							  <?php 
while ($rad=mysql_fetch_assoc($ad)){ ?>	
                            <tr>
                              <td height="29" colspan="4" align="center" valign="middle"><?php echo $rad[surname];?></td>
                              <td colspan="2" align="center" valign="middle"><?php echo $rad[firstname];?></td>
                              <td colspan="3" align="center" valign="middle"><?php echo $rad[passport_no];?></td>
                              <td colspan="2" align="center" valign="middle"><?php echo $rad[dob];?></td>
                              <td colspan="2" align="center" valign="middle"><?php echo $rad[amount];?></td>
                              <td colspan="2" align="center" valign="middle"><?php echo $rad[ffp_no];?></td>
                              <td colspan="3" align="center" valign="top"><a href="nbooking_pro.php?action=Delete&amp;transaction_id=<?php echo $rad[transaction_id];?>">REMOVE</a></td>
                              </tr>
                            <tr>
                              <td height="1"></td>
                              <td width="49"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td width="114"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                             <?php
		}
        ?> 
                            
                            
                            
                            
                            
                            
                            
                            
                            
                          </table></td>
                          <td></td>
                          <td></td>
                        </tr>
                        
                        
                        <tr>
                          <td height="298"></td>
                          <td>&nbsp;</td>
                          <td width="115">&nbsp;</td>
                          <td width="120">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                        </tr>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        


                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                    </table></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30"></td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
              </form></td>
          </tr>
          <tr>
            <td height="61">&nbsp;</td>
          </tr>
          <tr>
            <td height="132" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#322240">
                <!--DWLayoutTable-->
                <tr>
                  <td width="1060" height="49">&nbsp;</td>
                </tr>
                <tr>
                  <td height="56" align="center" valign="middle"><span class="style5">All Rights Reserved.<br />
                    CopyRight 
                    &copy; Arik Air 2016.<br />
                    Administered by Arik Air IT Department </span></td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
