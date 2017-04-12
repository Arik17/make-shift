<?php
session_start();
ob_start();
include_once ('db.php'); 
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");
//counting the no of booking for today

$now = date("H:i:s", time());
$newTime = strtotime("$now -1 hours -30 minutes");

$systime = date("H:i", $newTime);
$sys = strtotime($systime);

if (isset($_POST['Submit'])){
$_SESSION['schedule_transaction_id']=$_POST['radiobutton'];
if (!isset($_POST['radiobutton'])){
header("location:nbooking1.php?msg=Select A Schedule");
}else{ 
$v=mysql_query("select * from flt_sched where transaction_id='$_SESSION[schedule_transaction_id]'"); 
$rv=mysql_fetch_assoc($v);$_SESSION[flt_no]=$rv[flt_no];$_SESSION[sta]=$rv[sta];$_SESSION[std]=$rv[std];

//echo $_SESSION[sta];
//echo $_SESSION[std];
//echo $_SESSION[flt_no];
//session_write_close();
header("location:nbooking2.php");
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
          <td width="155" height="16"></td>
          <td width="681"></td>
          <td width="224"></td>
        </tr>
        <tr>
          <td height="70" valign="top"><img src="images/LOGO-BASIC.png" width="155" height="70" /></td>
          <td>&nbsp;</td>
          
        </tr>
        
        <tr>
          <td height="7"></td>
          <td></td>
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
      <td height="631" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="1060" height="56" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="opc">
            <!--DWLayoutTable-->
            <tr>
              <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;</span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>
          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();" action="<?php echo $_SERVER['PHP_SELF'];?>"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="312"></td>
                  <td width="377"></td>
                  <td width="319"></td>
                  <td width="31"></td>
                  </tr>
            <tr>
              <td height="23"></td>
              <td valign="top"><span class="style7">ROUTE : </span><span class="style6"><?php echo $_SESSION[origin]." "."-"." ".$_SESSION[destination];?></span></td>
              <td>&nbsp;</td>
              <td align="right" valign="top"><span class="style17">SELECTED DATE </span>: <span class="style18">
                <?php echo $_SESSION[tdate];?></span></td>
              <td></td>
              </tr>
            <tr>
              <td height="206"></td>
              <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                <!--DWLayoutTable-->
                <tr>
                  <td width="18" height="19">&nbsp;</td>
                          <td width="350">&nbsp;</td>
                          <td width="221">&nbsp;</td>
                          <td width="398">&nbsp;</td>
                          <td width="17">&nbsp;</td>
                        </tr>
                <tr>
                  <td height="55"></td>
                          <td colspan="3" align="center" valign="middle" bgcolor="#322240"><span class="style14">FLIGHT  INFORMATION <span class="style8">
                          </span></span><span class="style25"><span class="style16">
                          <P class="style5" style="color:red;" id="aap"><?php if(isset($_GET['msg'])){echo stripslashes($_GET['msg']); }?></P>
                          </span></span></td>
                          <td>&nbsp;</td>
                        </tr>
                <tr>
                  <td height="73"></td>
                          <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr>
                              <td width="127" height="1"></td>
                            <td width="301"></td>
                            <td width="309"></td>
                            <td width="232"></td>
                            </tr>
                            <tr>
                              <td height="38" align="center" valign="top" bgcolor="#003366" class="bidex"><span class="style16">FLT</span></td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">DEPARTURE TIME</td>
                            <td align="center" valign="top" bgcolor="#003366" class="bidex">ARRIVAL TIME</td>
                            <td align="center" valign="top" bgcolor="#FF0000" class="bidex">Select Your Schedule &gt;&gt; </td>
                            </tr>
                            <?php 
$resultq=mysql_query("select * from flt_sched where '$_SESSION[tdate]' between valid_startdate and valid_enddate and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and status='ENABLED' order by std desc"); 

//echo $resultq;

while ($rowq=mysql_fetch_assoc($resultq)){$i++; ?>

<?php

$deptime = strtotime($rowq[std]);

 if($sys < $deptime) { ?>	
                            <tr>
                              <td height="34" align="center" valign="top"><?php echo 'W3 '. $rowq[flt_no];?></td>
                          <td align="center" valign="top"><?php echo $rowq[std];?></td>
                          <td align="center" valign="top"><?php echo $rowq[sta];?></td>
                          <td align="center" valign="top"><label>
                            <input name="radiobutton" id="radiobutton" type="radio" value="<?php echo $rowq[transaction_id];?>" />
                            </label></td>
  
                          </tr>
						    <?php  } ?>
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
                      <td>&nbsp;</td>
                      <td align="center" valign="middle"><label>
                    <input type="submit" name="Submit" value="Proceed &gt;&gt;" />
                      </label></td>
                  <td>&nbsp;</td>
                      <td></td>
                    </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                  
                
              </table></td>
              <td></td>
              </tr>
            <tr>
              <td height="74"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td valign="top"><span class="style19">PLEASE NOTE</span><br />
                INFANT FARE IS <span class="style22">10%</span> of Fare </td>
              <td></td>
            </tr>
            <tr>
              <td height="65"></td>
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
