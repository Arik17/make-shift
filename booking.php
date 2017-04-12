<?php
session_start();
ob_start();
include_once ('db.php');
$page="booking.php"; 
include "priviledgechecker.php";
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");

/*
if(!$_SESSION[login]){
session_destroy();
header("Location:login.php?msg=You must be authenticated");
}
if ($_SESSION[priviledge]>2){
session_destroy();
header("Location:login.php?msg=You must be authenticatedhahaha");
}
*/
//counting the no of booking for today

if (isset($_POST[Submit])){
$_POST[tdate]=mysql_real_escape_string($_POST[tdate]);
$_POST[origin]=mysql_real_escape_string($_POST[origin]);
$_POST[destination]=mysql_real_escape_string($_POST[destination]);
$_SESSION[tdate]=$_POST[tdate];
$_SESSION[origin]=$_POST[origin];
$_SESSION[destination]=$_POST[destination];
$_SESSION[flt_no]=$_POST[flt_no];

/*
$_POST[date]="2017-03-09";  //$_POST[date];
$_POST[origin]="LOS";  //$_POST[origin];
$_POST[destination]="ACC";  //$_POST[destination];
*/
//checking schedule availability
$a=mysql_query("select * from fares_pricing where '$_POST[tdate]' between valid_startdate and valid_enddate and origin='$_POST[origin]' and destination='$_POST[destination]'");
$na=mysql_num_rows($a);

//checking seat booked
$b=mysql_query("select count(*) as id from collection where '$_POST[tdate]' between valid_startdate and valid_enddate and origin='$_POST[origin]' and destination='$_POST[destination]'");
$rb=mysql_fetch_assoc($b);

//checking ACTIVE seat available
$c=mysql_query("select sum(nseat) as id from fares_pricing where '$_POST[tdate]' between valid_startdate and valid_enddate and origin='$_POST[origin]' and destination='$_POST[destination]'");
$rc=mysql_fetch_assoc($c);
$seat=$rc[id];

if (($na!=0)&&($rb[id]<$seat)){
session_write_close();
header("location:booking_update.php");
}else{
header("location:booking.php?msg=No Availability");
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
}, 3000);
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
 		
	    var date = document.getElementById('datepicker');
	    var flt = document.getElementById('flt');
	    var destination = document.getElementById('destination');
	    var pcs = document.getElementById('pcs');
	    var gwt = document.getElementById('gwt');
	    var cwt = document.getElementById('cwt');
	    var cbm = document.getElementById('cbm');
	    var commodity = document.getElementById('commodity');

if (date.value.length==0){
errors.push("Flight Date required");
}	
if (flt.value.length==0){
errors.push("Please enter the FLIGHT NUMBER");
}	
if (destination.selectedIndex==0){
errors.push("Please select the DESIGNATION");
}
if (pcs.value.length==0){
errors.push("Please enter the No of PIECES");
}
if (gwt.value.length==0){
errors.push("Please enter the GROSS WEIGHT");
}
if (cwt.value.length==0){
errors.push("Please enter the CHARGEABLE WEIGHT");
}
if (cbm.value.length==0){
errors.push("Please enter the CBM DIMENSION");
}
if (commodity.value.length==0){
errors.push("Please enter the DESCRIPTION OF THE COMMODITY");
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
.bidex {	BORDER-BOTTOM: #CCCCCC 1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC 1px solid; COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond; FONT-SIZE: 11px 
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
          <td width="677"></td>
          <td width="228"></td>
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
              <td width="1025" rowspan="2" valign="top"><ul id="nav">
                <?php include("includes/menu.php"); ?>
              </ul></td>
                <td width="35" height="35" align="right" valign="middle"><a href="processor.php"><img src="images/logout.png" width="35" height="35" border="0" /></a></td>
            </tr>
            <tr>
              <td height="5"></td>
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
              <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;Ticket Sales</span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>
          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();"action="<?php echo $_SERVER['PHP_SELF'];?>"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="103"></td>
                  <td width="23"></td>
                  <td width="373"></td>
                  <td width="509"></td>
                  <td width="31"></td>
                  </tr>
            <tr>
              <td height="23"></td>
              <td valign="top"><span class="style7">Today :</span> <span class="style6"><?php echo $nd;?></span></td>
              <td></td>
              <td colspan="2" align="center" valign="middle"><span class="style13"> </span><span class="style9">
              </span></td>
              <td></td>
              </tr>
            <tr>
              <td height="200"></td>
              <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                <!--DWLayoutTable-->
                <tr>
                  <td width="19" height="19">&nbsp;</td>
                  <td colspan="6" align="center" valign="middle"><span class="style8"><P class="style8" id="aap"><?php echo stripslashes($_GET[msg]);?></P></span></td>
                  <td width="24">&nbsp;</td>
                </tr>
                <tr>
                  <td height="33">&nbsp;</td>
                  <td colspan="6" align="center" valign="middle" bgcolor="#003366"><span class="style14">ONE - WAY </span></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="18"></td>
                  <td width="118"></td>
                  <td width="37"></td>
                  <td width="125"></td>
                  <td width="36"></td>
                  <td width="80"></td>
                  <td width="53"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td align="right" valign="top"><span class="style16">Travel Date </span></td>
                  <td>&nbsp;</td>
                  <td valign="top"><label>
                    <input name="tdate" type="text" id="datepicker" size="12" />
                  </label></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td></td>
                </tr>
                <tr>
                  <td height="14"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="25"></td>
                  <td align="right" valign="top"><span class="style16">Origin</span></td>
                  <td></td>
                  <td valign="top"><label><span class="bidex">
                  <select name="origin" id="origin">
                    <option value="0">Select</option>
                    <?php  $query = mysql_query("SELECT distinct(origin) FROM flt_sched order by origin");
   while($result = mysql_fetch_array($query)){
	   extract($result);
    ?>
                    <option value="<?php echo $origin;?>"><?php echo $origin;?></option>
                    <?php } ?>
                  </select>
                  </span></label></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td></td>
                </tr>
                <tr>
                  <td height="17"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td align="right" valign="top"><span class="style16">Destination</span></td>
                  <td></td>
                  <td valign="top"><label><span class="bidex">
                    <select name="destination" id="destination">
                      <option value="0">Select</option>
                      <?php  $query = mysql_query("SELECT distinct(destination) FROM flt_sched order by destination");
   while($result = mysql_fetch_array($query)){
	   extract($result);
    ?>
                      <option value="<?php echo $destination;?>"><?php echo $destination;?></option>
                      <?php } ?>
                    </select>
                  </span></label></td>
                  <td>&nbsp;</td>
                  <td valign="top"><label>
                    <input type="submit" name="Submit" value=" Go &gt;&gt;" />
                  </label></td>
                  <td>&nbsp;</td>
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
                </tr>
              </table></td>
              <td>&nbsp;</td>
              <td></td>
              </tr>
            <tr>
              <td height="122"></td>
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
