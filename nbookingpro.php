<?php
session_start();
ob_start();
include_once ('db.php'); 
$page="bookingtosales.php"; 
include "priviledgechecker.php";
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");



/*
if (!$_SESSION[salesgo]){
session_start();
session_destroy();
header("index.php?msg=You must re-login");
}*/
//TO find the sum of the ticket
$ad=mysql_query("select sum(amount) as amount from temp_name where pnr='$_SESSION[qpnr]' and status='booked'"); 
$sad=mysql_fetch_assoc($ad);

//counting the no of booking for today

if (isset($_POST[Submit])){
$_SESSION[tl]=$_POST[teller];
$_POST[teller]=trim($_POST[teller]);
$payment_id=time().rand();
$transaction_id=md5(rand().$_SESSION[user_transaction_id]);
include "uref.php";
//TO find the sum of the ticket
$ad=mysql_query("select sum(amount) as amount from temp_name where pnr='$_SESSION[qpnr]' and status='booked'"); 
$sad=mysql_fetch_assoc($ad);
//checking that the bank teller does not exist;
$bt=mysql_query("select * from ataps where var2='$_POST[teller]' and status='OPEN'"); 
$rbt=mysql_num_rows($bt);
$ct=mysql_query("select * from payments where teller='$_POST[teller]'"); //must not exist as used in payment
$rct=mysql_num_rows($ct);
//validating all form fields
if ($_POST[token]==$_SESSION[toks]){$a=1;} if (round($sad[amount],2)==$_POST[amount]){$b=1;} if ($rbt==1){$c=1;} if (!empty($_POST[bank])){$d=1;}//if ($_POST[fop]!=0){$e=1;}
$validate=$a+$b+$c+$d+0;
$validate2=$a+$b+$d;

//if (($validate==4)&&($_POST[teller]="CASH")&&($rbt==1)){ //all fields are already validated

if (($validate==4)&&($_POST[fop]="CASH")&&($rbt==1)&&($rct==0)){ //all fields are already validated
//convert to sales
$ad=mysql_query("select * from temp_name where pnr='$_SESSION[qpnr]' and status='booked'"); 
while ($rowad=mysql_fetch_assoc($ad)){
$pax=$rowad[surname]." ".$rowad[firstname];
include "ticketonly.php";
//TRIM to remove whitespaces
$rowad[sta]=trim($rowad[sta]);
$rowad[std]=trim($rowad[std]);
$rowad[flt]=trim($rowad[flt]);
$rowad[ticket_class]=trim($rowad[ticket_class]);
//UPdate ataps
$bt=mysql_query("update ataps set status='CLOSED',activated_by='$_SESSION[cn]',activated_date='$time' where var2='$_POST[teller]'"); 

//insert into collection table
$q=mysql_query("insert into collection (transaction_id,uref,sales_date,fop,pax,surname,firstname,category,origin,destination,dob,travel_date,flt_no,sta,std,booking_class,ticket_class,ticket_no,pnr,ffp_no,passport_no,pax_mobile,pax_email,amount,status,perc,payment_id,posted_by,posted_time,uti,fltsched_id,token,location,country,user_priviledge,shift,currency,title,issuing_city) values ('$transaction_id','$uref','$date','$_POST[fop]','$pax','$rowad[surname]','$rowad[firstname]','$rowad[category]','$rowad[origin]','$rowad[destination]','$rowad[dob]','$rowad[travel_date]','$rowad[flt]','$rowad[sta]','$rowad[std]','$rowad[booking_class]','$rowad[ticket_class]','$tkt','$rowad[pnr]','$rowad[ffp_no]','$rowad[passport_no]','$rowad[mobile]','$rowad[email]','$rowad[amount]','WEB SALES','$_SESSION[perc]','$payment_id','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]','$rowad[fltsched_id]','$_SESSION[toks]','$_SESSION[user_location]','$_SESSION[user_country]','$_SESSION[user_priviledge]','$_SESSION[shift]','$_SESSION[user_currency]','$rowad[title]','$_SESSION[issuing_city]')") or die(mysql_error()); // or die(mysql_error())
//change the status to sales
$q=mysql_query("update temp_name set status='SALES' where pnr='$_SESSION[qpnr]' and status='booked'");
}
//disable back button
$_SESSION[salesgo]=false;
//send sms

//update payment in payment table
$pay=mysql_query("insert into payments (payment_id,sales_date,bank,teller,amount,remark,category,posted_by,posted_time,uti) values ('$payment_id','$date','$_POST[bank]','$_SESSION[tl]','$sad[amount]','','WEB SALES','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]')") or die(mysql_error());
header("location:mysales.php?msg=Successful Sales");
}elseif (($validate2==3)&&($_POST[fop]=="POS")){ //all fields are already validated
//convert to sales
$ad=mysql_query("select * from temp_name where pnr='$_SESSION[qpnr]' and status='booked'"); 
while ($rowad=mysql_fetch_assoc($ad)){
$pax=$rowad[surname]." ".$rowad[firstname];
include "ticketonly.php";
//TRIM to remove whitespaces
$rowad[sta]=trim($rowad[sta]);
$rowad[std]=trim($rowad[std]);
$rowad[flt]=trim($rowad[flt]);
$rowad[ticket_class]=trim($rowad[ticket_class]);
//insert into collection table
$q=mysql_query("insert into collection (transaction_id,uref,sales_date,fop,pax,surname,firstname,category,origin,destination,dob,travel_date,flt_no,sta,std,booking_class,ticket_class,ticket_no,pnr,ffp_no,passport_no,pax_mobile,pax_email,amount,status,perc,payment_id,posted_by,posted_time,uti,fltsched_id,token,location,country,user_priviledge,shift,currency,title,issuing_city) values ('$transaction_id','$uref','$date','$_POST[fop]','$pax','$rowad[surname]','$rowad[firstname]','$rowad[category]','$rowad[origin]','$rowad[destination]','$rowad[dob]','$rowad[travel_date]','$rowad[flt]','$rowad[sta]','$rowad[std]','$rowad[booking_class]','$rowad[ticket_class]','$tkt','$rowad[pnr]','$rowad[ffp_no]','$rowad[passport_no]','$rowad[mobile]','$rowad[email]','$rowad[amount]','WEB SALES','$_SESSION[perc]','$payment_id','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]','$rowad[fltsched_id]','$_SESSION[toks]','$_SESSION[user_location]','$_SESSION[user_country]','$_SESSION[user_priviledge]','$_SESSION[shift]','$_SESSION[user_currency]','$rowad[title]','$_SESSION[issuing_city]')") or die(mysql_error()); // or die(mysql_error())
//change the status to sales
$q=mysql_query("update temp_name set status='SALES' where pnr='$_SESSION[qpnr]' and status='booked'");
}
//disable back button
$_SESSION[salesgo]=false;
//send sms

//update payment in payment table
$pay=mysql_query("insert into payments (payment_id,sales_date,bank,teller,amount,remark,category,posted_by,posted_time,uti) values ('$payment_id','$date','$_POST[bank]','$_SESSION[tl]','$sad[amount]','','WEB SALES','$_SESSION[cn]','$time','$_SESSION[user_transaction_id]')") or die(mysql_error());
header("location:mysales.php?msg=Successful Sales");
}else{
header("location:nbookingpro.php?msg=Not Successful due invalid Token /Invalid Teller /Incomplete Information");
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
 		
	    var teller = document.getElementById('teller');
	    var bank = document.getElementById('bank');
	    var amount = document.getElementById('amount');
	    var token = document.getElementById('token');
	    var fop = document.getElementById('fop');
	
if (bank.selectedIndex==0){
errors.push("Please select the BANK");
}

if (teller.value.length==0){
errors.push("Please enter the TELLER");
}
if (amount.value.length==0){
errors.push("Please enter the AMOUNT");
}
if (fop.selectedIndex==0){
errors.push("Please Select the Form Of Payment");
}
if (token.value.length==0){
errors.push("Please enter your TOKEN");
}
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
.bidex1 {BORDER-BOTTOM: #CCCCCC 1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC 1px solid; COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond; FONT-SIZE: 11px 
}
.style29 {color: #FFFFFF}
.style30 {
	color: #FF0000;
	font-weight: bold;
}
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
                  <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;Booked Ticket ..... To be converted to Sales! </span></td>
                </tr>
              </table></td>
          </tr>
		  <tr></tr>
          <tr>
            <td height="264" valign="top"><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
                  <!--DWLayoutTable-->
                  <tr>
                    <td width="21" height="14"></td>
                    <td width="103"></td>
                    <td width="23"></td>
                    <td width="525"></td>
                    <td width="363"></td>
                    <td width="25"></td>
                  </tr>
                  <tr>
                    <td height="23"></td>
                    <td valign="top"><span class="style7">Today :</span> <span class="style6"><?php echo $nd;?></span></td>
                    <td>&nbsp;</td>
                    <td align="center" valign="middle"><span class="style13"> </span><span class="style9">
                      <P class="style8" id="aap"><?php echo stripslashes($_GET[msg]);?></P>
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
                  </tr>
                  <tr>
                    <td height="655"></td>
                    <td colspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                        <!--DWLayoutTable-->
                        <tr>
                          <td width="18" height="18"></td>
                          <td width="40"></td>
                          <td width="155"></td>
                          <td width="38"></td>
                          <td width="66"></td>
                          <td width="409"></td>
                          <td width="62"></td>
                          <td width="199"></td>
                          <td width="17"></td>
                          <td width="6"></td>
                        </tr>
                        <tr>
                          <td height="33"></td>
                          <td colspan="7" align="center" valign="middle" bgcolor="#00CC00"><span class="style14">BOOKING DETAILS</span></td>
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
                                <td width="114"></td>
                                <td width="147"></td>
                                <td width="259"></td>
                                <td width="265"></td>
                              </tr>
                              <tr>
                                <td height="38" align="center" valign="top" bgcolor="#003366" class="bidex"><span class="style16">FLT</span></td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">ORG</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">DEST</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">TRAVEL DATE</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">AMOUNT </td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">PAX </td>
                              </tr>
                              <?php 
$vb=mysql_query("select * from temp_name where pnr='$_SESSION[qpnr]' and status='BOOKED'"); 
while ($rowvb=mysql_fetch_assoc($vb)){$i++; ?>
                              <tr>
                                <td height="34" align="center" valign="top"><?php echo $rowvb[flt];?></td>
                                <td valign="top"><?php echo $rowvb[origin];?></td>
                                <td valign="top"><?php echo $rowvb[destination];?></td>
                                <td align="center" valign="top"><?php echo $rowvb[travel_date];?></td>
                                <td valign="top"><?php echo $rowvb[amount];?></td>
                                <td valign="top"><?php echo $rowvb[pax];?></td>
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
                          <td height="53"></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td align="center" valign="middle"><span class="style30">TOTAL AMOUNT PAYABLE : <?php echo number_format($sad[amount],2);?></span></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="50"></td>
                          <td>&nbsp;</td>
                          <td valign="top"><?php //echo $_SESSION[toks];?></td>
                          <td>&nbsp;</td>
                          <td colspan="3" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                              <!--DWLayoutTable-->
                              <tr>
                                <td height="26" colspan="9" align="center" valign="middle" bgcolor="#003366"><span class="style20 style29">BANK INFORMATION </span></td>
                              </tr>
                              <tr>
                                <td width="25" height="6"></td>
                                <td width="111"></td>
                                <td width="28"></td>
                                <td width="20"></td>
                                <td width="157"></td>
                                <td width="110"></td>
                                <td width="34"></td>
                                <td width="25"></td>
                                <td width="23"></td>
                              </tr>
                              <tr>
                                <td height="3"></td>
                                <td rowspan="2" valign="top">BANK</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="22"></td>
                                <td></td>
                                <td></td>
                                <td colspan="4" valign="top"><label><span class="bidex1">
                                  <select name="bank" id="bank">
                                    <option value="0">Select Bank</option>
                                    <?php  $query = mysql_query("SELECT * FROM bank_tb order by bank");
   while($result = mysql_fetch_array($query)){
	   extract($result);
    ?>
                                    <option value="<?php echo $bank;?>"><?php echo $bank;?></option>
                                    <?php } ?>
                                  </select>
                                  </span></label></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="18"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="22"></td>
                                <td colspan="2" valign="top">TELLER / REF </td>
                                <td>&nbsp;</td>
                                <td colspan="4" valign="top"><label>
                                  <input name="teller" type="text" id="teller" onKeyUp="ToUpper(this)" maxlength="20"/>
                                  </label></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="23"></td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="22"></td>
                                <td valign="top">AMOUNT</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="3" valign="top"><label>
                                  <input name="amount" type="text" id="amount" value="<?php echo round($sad[amount],2);?>" readonly="readonly"/>
                                  </label></td>
                                <td>&nbsp;</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="20"></td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="22"></td>
                                <td align="left" valign="top">FOP</td>
                                <td></td>
                                <td></td>
                                <td colspan="2" align="left" valign="top"><label>
                                  <select name="fop" id="fop">
                                    <option value="0">Select</option>
                                    <option value="CASH">CASH</option>
                                    <option value="POS">POS</option>
                                  </select>
                                </label></td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="19"></td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              
                              <tr>
                                <td height="22"></td>
                                <td valign="top">TOKEN</td>
                                <td></td>
                                <td></td>
                                <td colspan="4" valign="top"><label>
                                  <input name="token" type="password" id="token" maxlength="4" />
                                </label></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="26"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="28"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="left" valign="top"><label>
                                  <input name="Submit" type="submit" id="Submit" value="Submit" />
                                </label></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="21"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                              </tr>
                              
                          </table></td>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="252"></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td height="147"></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
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
