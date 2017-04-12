<?php
session_start();
ob_start();
include_once ('db.php'); 
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");
//counting the no of booking for today

if (isset($_POST[Submit])){
$_SESSION[fares_transaction_id]=$_POST['radiobutton'];

include "seat_available.php";
//echo $rhq[nseat];

//fetching the flight schedule
$a=mysql_query("select * from fares_pricing where transaction_id='$_SESSION[fares_transaction_id]'");
$ra=mysql_fetch_assoc($a);

if (!isset($_POST[radiobutton])){
//if ($_POST[radiobutton]==0){
header("location:nbooking2.php?msg=Select A Fare");
}
elseif ($_SESSION[npeople]>$_SESSION[seat_available]){ // if request is greater than the seat available
//$_SESSION[uref]="";
echo $_SESSION['npeople'];
echo '<br>';
//echo 'No Seat';
header("location: nbooking2.php?msg=There are no more seats available for the selected Cabin");
}else{


$_SESSION[origin]=$ra['origin'];
$_SESSION[destination]=$ra['destination'];
$_SESSION['booking_class']=$ra['booking_class'];
$_SESSION['ticket_class']=$ra['ticket_class'];
$_SESSION[flt_no]=$_SESSION['flt_no'];
$_SESSION[sta]=$_SESSION[sta];
$_SESSION[std]=$_SESSION[std];
$_SESSION[adult_fare]=$ra[adult_fare];
$_SESSION[child_fare]=0.75*($ra[adult_fare]);
$_SESSION[infant_fare]=0.1*($ra[adult_fare]);
$_SESSION[total_fare]=($_SESSION[AD]*$ra[adult_fare])+($_SESSION[CD]*$ra[child_fare])+($_SESSION[INFT]*$ra[infant_fare]);

//echo $_SESSION['booking_class'];
//echo $_SESSION['ticket_class'];

//create the slot for the people requested
$_SESSION[group_id]=md5(time().$_SESSION[user_transaction_id]);
include "pnronly.php";
$_SESSION[sum_amount]=(($_SESSION[AD]*$_SESSION[adult_fare]) + ($_SESSION[CD]*$_SESSION[adult_fare])+ ($_SESSION[INFT]*$_SESSION[adult_fare]*0.1));

//echo $_SESSION[sum_amount];
//echo '<br>';
//echo $_SESSION[adult_fare];
//header("location:pax_info.php?adult_fare=$_SESSION[adult_fare]");
//$_SESSION[mobile]="";
//$_SESSION[email]="";

//echo $_SESSION[adult_fare];
/*
echo '<br>';
echo $_SESSION['pnr'];
echo '<br>';
echo $_SESSION['CD'];
echo '<br>';
echo $_SESSION['sta'];
echo '<br>';
echo $_SESSION['std'];
echo '<br>';
echo $_SESSION['AD'];
echo '<br>';
echo $_SESSION['INFT'];
echo '<br>';
echo $_SESSION['adult_fare'];
echo '<br>';
echo $_SESSION['fares_transaction_id'];
*/
//echo $_SESSION[total_fare];

//session_write_close();
header("location:pax_info.php");
//session_write_close();
}


}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Flights to and from Nigeria &amp; West Africa | Arik Air</title>
<script language="JavaScript" type="text/javascript">
<!--
function PopWindow()
{
window.open('http://www.textual-intercourse.co.uk/order.php','order','width=450,height=350,menubar=no,scrollbars=no,toolbar=no,location=no,directories =no,resizable=no,top=0,left=0');
}
//-->
</script>
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
}, 8000);
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
 		
	    var radiobutton = document.getElementById('radiobutton');

if (radiobutton.value.length==""){
errors.push("Select a FLIGHT");
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
.style17 {
	font-size: 14px;
	color: #FF0000;
	font-weight: bold;
}
.style18 {color: #000033}
.style19 {
	color: #FF0000;
	font-weight: bold;
}
.style22 {color: #990000; font-weight: bold; }
.style23 {
	font-size: 16px;
	font-weight: bold;
}
.style25 {font-weight: bold}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<div align="center">
  <table width="1060" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="139" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="451" height="23">&nbsp;</td>
          <td width="155">&nbsp;</td>
          <td width="454">&nbsp;</td>
        </tr>
        <tr>
          <td height="70">&nbsp;</td>
          <td valign="top"><img src="images/LOGO-BASIC.png" width="155" height="70" /></td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="40" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="Example_H">
            <!--DWLayoutTable-->
            <tr>
              <td width="999" rowspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td width="25" height="35"></td>
                <td width="35" align="right" valign="top"><a href="processor.php"></a></td>
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
      <td width="1060" height="23">&nbsp;</td>
    </tr>
    <tr>
      <td height="632" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="1060" height="56" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="opc">
            <!--DWLayoutTable-->
            <tr>
              <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;<a href="index.php"></a></span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>
          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();" action="<?php echo $_SERVER['PHP_SELF'];?>"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="312"></td>
                  <td width="348"></td>
                  <td width="29"></td>
                  <td width="44"></td>
                  <td width="275"></td>
                  <td width="31"></td>
                  </tr>
            <tr>


              <td height="23"></td>
              <td>&nbsp;</td>
              <td align="center" valign="middle"><span class="style13"> </span><span class="style9"><span class="style19"><!--No Of Seat For your Request : --></span> <span class="style23"><?php //echo $_SESSION[npeople];?></span></span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" valign="top"><span class="style17">SELECTED DATE </span>: <span class="style18">
                <?php echo $_SESSION[tdate];?><?php //echo $_SESSION[origin]." "."-"." ".$_SESSION[destination];?></span></td>
              <td></td>
              </tr>
            <tr>
              <td height="207"></td>
              <td colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                <!--DWLayoutTable-->
                <tr>
                  <td width="18" height="19">&nbsp;</td>
                          <td width="230">&nbsp;</td>
                          <td colspan="2" valign="top"></td>
                          <td width="119">&nbsp;</td>
                          <td width="425">&nbsp;</td>
                          <td width="17">&nbsp;</td>
                        </tr>
                <tr>
                  <td height="33"></td>
                          <td colspan="5" align="center" valign="middle" bgcolor="#322240"><span class="style14">AVAILABILITY BOOKING CLASSES <span class="style8">
                          </span></span><span class="style25"><span class="style16">
                          <P class="style5" id="aap" style="color:red;"><?php if(isset($_GET['msg'])){ echo stripslashes($_GET['msg']); }?></P>
                          </span></span></td>
                          <td>&nbsp;</td>
                        </tr>
                <tr>
                  <td height="73"></td>
                          <td colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr>
                              <td width="127" height="1"></td>
                            <td width="211"></td>
                            <td width="196"></td>
                            <td width="200"></td>
                            <td width="139"></td>
                            <td width="96"></td>
                            </tr>
                            <tr>
                              <td height="38" align="center" valign="top" bgcolor="#003366" class="bidex"><span class="style16">FLIGHT </span></td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">ROUTE</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">DEPARTURE</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">ARRIVAL</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">CABIN </td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex"> FARE  </td>
                            <td align="center" valign="top" bgcolor="#FF0000" class="bidex">Select &gt;&gt; </td>
                            </tr>
                            <?php 

$z=mysql_query("select * from fares_pricing where flt_no='$_SESSION[flt_no]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and status='ENABLED' and adult_fare >1000 and '$_SESSION[tdate]' between valid_startdate and valid_enddate and identifier='4000'");$nz=mysql_num_rows($z); if ($nz>0){$resultq=mysql_query("select * from fares_pricing where flt_no='$_SESSION[flt_no]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and status='ENABLED' and adult_fare >1000 and '$_SESSION[tdate]' between valid_startdate and valid_enddate and identifier='4000'");}else{$resultq=mysql_query("select * from fares_pricing where flt_no='$_SESSION[flt_no]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and status='ENABLED' and adult_fare >1000 and '$_SESSION[tdate]' between valid_startdate and valid_enddate and identifier<>'4000'"); 
}
 
while ($rowq=mysql_fetch_assoc($resultq)){ ?>	
                            <tr>
                              <td height="34" align="center" valign="top"><?php echo 'W3 '. $_SESSION['flt_no'];?></td>
                             <td align="center" valign="top"> <?php echo $_SESSION['origin']."-".$_SESSION['destination'];?></td>
                          <td align="center" valign="top"><?php echo $_SESSION['std'];?></td>
                          <td align="center" valign="top"><?php echo $_SESSION['sta'];?></td>

                          <td align="center" valign="top"><?php  $class = trim($rowq['ticket_class']); if ($class == 'Y' ){echo 'ECONOMY';} else {echo 'BUSINESS';} ?></td>

                          <td align="center" valign="top"><?php echo '<s>N</s>'.number_format($rowq['adult_fare'], 2);?></td>
                          <?php //if($_SESSION[seat_available] < 0){ ?><td align="center" valign="top"><label>
                            <input name="radiobutton" id="radiobutton" type="radio" value="<?php echo $rowq['transaction_id'];?>" />
                            </label></td><?php //} ?>
                          </tr>
                            <?php
		}
        ?> 
                            
                          </table>                    </td>
                          <td></td>
                        </tr>
                <tr>
                  <td height="25" colspan="7" align="center" valign="middle"><hr /></td>
                        </tr>
                <tr>
                  <td height="30"></td>
                      <td></td>
                      <td width="93"></td>
                      <td colspan="2" align="center" valign="middle"><label>
                    <input type="submit" name="Submit" value="Proceed &gt;&gt;" />
                      </label></td>
                  <td></td>
                      <td></td>
                    </tr>
                <tr>
                  <td height="1"></td>
                  <td></td>
                  <td></td>
                  <td width="102"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                  
                
              </table></td>
              <td></td>
              </tr>
            <tr>
              <td height="74"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" valign="top"><span class="style19">PLEASE NOTE</span><br />
             
                INFANT FARE IS <span class="style22">10%</span> of Fare </td>
              <td>PROMO FARES ARE NON REFUNDABLE </td>
            </tr>
            <tr>
              <td height="65"> </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
               </span></td>
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
