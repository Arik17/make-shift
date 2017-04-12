<?php
session_start();
ob_start();
include_once ('db.php'); 
$b=time();
$page="booking.php"; 
include "priviledgechecker.php";
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");
//counting the no of booking for today


if (isset($_POST[Submit])){
$_SESSION[uref]=$_POST['radiobutton'];
include "seat_available.php";
if ($_POST[radiobutton]==0){
header("location:nbooking2.php?msg=Select A Flight");
}elseif ($_SESSION[npeople]>$_SESSION[seat_available]){ // if request is greater than the seat available
//$_SESSION[uref]="";
header("location:nbooking2.php?msg=Your Seat Request is greater than Availability");
}elseif($_SESSION[npeople]<$_SESSION[seat_available]){
//create the slot for the people requested
$_SESSION[group_id]=md5(time().$_SESSION[user_transaction_id]);
include "includes/npeople_AD.php";
include "includes/npeople_CD.php";
include "includes/npeople_INF.php";
//computing the total amount payable
$e=mysql_query("select * from fares_pricing where uref='$_SESSION[uref]'"); $re=mysql_fetch_assoc($e);
//different amount per case
$_SESSION[childcost]=(0.1*$re[adult_fare]);
$_SESSION[infantcost]=(0.75*$re[adult_fare]);
$_SESSION[adultcost]=$re[adult_fare];
$_SESSION[sum_amount]=(($_SESSION[AD]*$re[adult_fare]) + ($_SESSION[CD]*$re[adult_fare]*0.75)+ ($_SESSION[INFT]*$re[adult_fare]*0.1));
session_write_close();
header("location:nbooking_pro.php");
}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: PSS -  Arik Air</title>
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
      <td height="139" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="155" height="16"></td>
          <td width="681"></td>
          <td width="224"></td>
        </tr>
        <tr>
          <td height="70" valign="top"><img src="images/LOGO-BASIC.png" width="155" height="70" /></td>
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
              <td width="999" rowspan="2" valign="top"><ul id="nav">
                <?php include("includes/menu.php"); ?>
              </ul></td>
                <td width="25" height="35"></td>
                <td width="35" align="right" valign="top"><a href="processor.php"><img src="images/logout.png" width="35" height="35" border="0" /></a></td>
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
              <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;Booking Engine ++<a href="index.php"></a></span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>
          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();" action="<?php echo $_SERVER['PHP_SELF'];?>"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="194"></td>
                  <td width="118"></td>
                  <td width="348"></td>
                  <td width="29"></td>
                  <td width="44"></td>
                  <td width="275"></td>
                  <td width="31"></td>
                  </tr>
            <tr>
              <td height="23"></td>
              <td valign="top"><span class="style7">Today :</span> <span class="style6"><?php echo $nd;?></span></td>
              <td>&nbsp;</td>
              <td align="center" valign="middle"><span class="style13"> </span><span class="style9"><span class="style19">No Of Seat For your Request :</span> <span class="style23"><?php echo $_SESSION[npeople];?></span></span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" valign="top"><span class="style17">SELECTED DATE </span>: <span class="style18">
                <?php echo $_SESSION[tdate];?></span></td>
              <td></td>
              </tr>
            <tr>
              <td height="198"></td>
              <td colspan="6" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                <!--DWLayoutTable-->
                <tr>
                  <td width="18" height="19">&nbsp;</td>
                          <td width="323">&nbsp;</td>
                          <td width="221">&nbsp;</td>
                          <td width="425">&nbsp;</td>
                          <td width="17">&nbsp;</td>
                        </tr>
                <tr>
                  <td height="33"></td>
                          <td colspan="3" align="center" valign="middle" bgcolor="#322240"><span class="style14">ONE - WAY (AVAILABILITY INFORMATION) <span class="style8">
                          </span></span><span class="style25"><span class="style16">
                          <P class="style5" id="aap"><?php echo stripslashes($_GET[msg]);?></P>
                          </span></span></td>
                          <td>&nbsp;</td>
                        </tr>
                <tr>
                  <td height="73"></td>
                          <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
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
                            <td width="74"></td>
                            <td width="95"></td>
                            <td width="96"></td>
                            </tr>
                            <tr>
                              <td height="38" align="center" valign="top" bgcolor="#003366" class="bidex"><span class="style16">FLT</span></td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">ORG</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">DEST</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">STA</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">STD</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">BCLASS</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">No Of Seat Avail </td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">TKT CLASS  </td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">Child Fare </td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">Adult Fare </td>
                            <td align="center" valign="top" bgcolor="#FF0000" class="bidex">Select &gt;&gt; </td>
                            </tr>
                            <?php 
$resultq=mysql_query("select * from fares_pricing where origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and status='ENABLED'"); 
while ($rowq=mysql_fetch_assoc($resultq)){$i++; ?>	
                            <tr>
                              <td height="34" align="center" valign="top"><?php echo $rowq[flt_no];?></td>
                          <td valign="top"><?php echo $rowq[origin];?></td>
                          <td valign="top"><?php echo $rowq[destination];?></td>
                          <td valign="top"><?php echo $rowq[sta];?></td>
                          <td valign="top"><?php echo $rowq[std];?></td>
                          <td align="center" valign="top"><a href="http://www.textual-intercourse.co.uk/productinfo.php?id=<?php echo $row_Recordset1['id']; ?>" target="order"
onclick="return PopWindow(this.href, this.target);"> <?php echo $ticket_class=$rowq[booking_class];?></a></td>
						  <?php
		  $sqld="select count(*) as id from collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]'";
		  $resultd = mysql_query($sqld);
		  while ($rowd=mysql_fetch_assoc($resultd)){?>


                          <td align="center" valign="top"><?php //for mars booking
$sqlms=mysql_query("select count(*) as id from mars_dumps where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]'");	$rowms = mysql_fetch_assoc($sqlms);
//for additional collection
$_SESSION[ticket_class]=$ticket_class;
$sqlac=mysql_query("select count(*) as id from additional_collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]' and category='REROUTE'");	$rowac = mysql_fetch_assoc($sqlac);					  
						  
						  echo $rowq[nseat]-$rowq[hseat]-$rowd[id]-$rowms[id]-$rowac[id];?></td>
						  <?php
		}
        ?>
                          <td align="center" valign="top"><?php echo $rowq[ticket_class];?></td>
                          <td valign="top"><?php echo $rowq[child_fare];?></td>
                          <td valign="top"><?php echo $rowq[adult_fare];?></td>
                          <td align="center" valign="top"><label>
                            <input name="radiobutton" id="radiobutton" type="radio" value="<?php echo $rowq[uref];?>" />
                            </label></td>
                          </tr>
                            <?php
		}
        ?> 
                            
                          </table>                    </td>
                          <td></td>
                        </tr>
                <tr>
                  <td height="25" colspan="5" align="center" valign="middle"><hr /></td>
                        </tr>
                <tr>
                  <td height="30"></td>
                      <td></td>
                      <td align="center" valign="middle"><label>
                    <input type="submit" name="Submit" value="Proceed &gt;&gt;" />
                      </label></td>
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
              <td>&nbsp;</td>
              <td colspan="2" valign="top"><span class="style19">PLEASE NOTE</span><br />
                CHILD FARE IS <span class="style22">75%</span> of Adult Fare <br />
                INFANT FARE IS <span class="style22">10%</span> of Adult Fare </td>
              <td></td>
            </tr>
            <tr>
              <td height="65"></td>
              <td>&nbsp;</td>
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
