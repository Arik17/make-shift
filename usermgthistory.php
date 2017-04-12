<?php
session_start();
ob_start();
include_once ('db.php'); 
$page="usermgthistory.php"; 
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
//echo $_SESSION[uref];




if (isset($_POST[Submit])){
$_SESSION[startdate]=$_POST[startdate];
session_write_close();
header("location:usermgthistory.php");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
		$("#datepicker").datepicker();
	});
    </script>
    
    <script type="text/javascript">
    // show jquery calendar
	$(function() {
		$("#datepickers").datepicker();
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
 		
	    var startdate = document.getElementById('datepicker');
	    var enddate = document.getElementById('datepickers');

if (startdate.value.length==0){
errors.push("Start Date Required");
}
if (enddate.value.length==0){
errors.push("End Date Required");
}	

if (errors.length >0){
alert(errors.join("\n"));
return false;
}
Submit.disabled=true;
return true;
}
	

</script>	
<script type="text/javascript">

function checkAll(){
for (var i=0; i<document.forms[0].elements.length; i++)
{
var e = document.forms[0].elements[i];
if ((e.name != 'allbox') && (e.type=='checkbox'))
{
	e.checked=document.forms[0].allbox.checked;
	}
}
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
.style20 {color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif, Garamond; }
.style21 {
	color: #FF0000;
	font-style: italic;
}
input[type=checkbox] {
  transform: scale(1.5);
}


  input[type=checkbox] {
  width: 30px;
  height: 30px;
  margin-right: 8px;
  cursor: pointer;
  font-size: 17px;
     visibility: hidden;
}


input[type=checkbox]:after {
    content: " ";
    background-color: #fff;
    display: inline-block;
    margin-left:10px;
    padding-bottom:5px;
    color:#00BFF0;
    width:22px;
    height:25px;
    visibility: visible;
    border:1px solid #00BFF0;
    padding-left:3px;
    border-radius:5px;
}
input[type=checkbox]:checked:after {
    content: "\2714";
      padding:-5px;
      font-weight:bold;
}


a:link {
	color: #990000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #990000;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
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
              <td width="998" rowspan="2" valign="top"><ul id="nav">
                <?php include("includes/menu.php"); ?>
              </ul></td>
                <td width="27" height="35"></td>
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
              <td width="1060" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp;User Management History</span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>
          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();"action="<?php echo $_SERVER['PHP_SELF'];?>"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="126"></td>
                  <td width="882"></td>
                  <td width="31"></td>
                  </tr>
            <tr>
              <td height="23"></td>
              <td>&nbsp;</td>
              <td align="center" valign="middle"><span class="style13"> </span><span class="style9">
                <?php echo stripslashes($_GET[msg]);?>
              </span></td>
              <td></td>
              </tr>
            <tr>
              <td height="435"></td>
              <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                <!--DWLayoutTable-->
                <tr>
                  <td width="10" height="14"></td>
                        <td width="985"></td>
                        <td width="9"></td>
                </tr>
                <tr>
                  <td height="149"></td>
                  <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr>
                      <td width="18" height="38">&nbsp;</td>
                          <td colspan="2" align="right" valign="middle"> Date : </td>
                          <td width="12">&nbsp;</td>
                          <td colspan="2" align="left" valign="middle"><label>
                            <input name="startdate" type="text" id="datepicker" size="12" />
                          </label></td>
                          <td width="39">&nbsp;</td>
                          <td width="123" align="left" valign="middle"><label>
                            <input type="submit" name="Submit" value="Query &gt;&gt;" />
                          </label></td>
                          <td width="26">&nbsp;</td>
                          <td width="106">&nbsp;</td>
                          <td width="194">&nbsp;</td>
                          <td width="238">&nbsp;</td>
                          </tr>
                    <!--DWLayoutTable-->
                    <tr>
                      <td height="18"></td>
                                <td width="38"></td>
                                <td width="56"></td>
                                <td></td>
                                <td width="67"></td>
                                <td width="68"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                    <tr>
                      <td height="38" colspan="2" align="center" valign="top" bgcolor="#003366" class="bidex">S/N</td>
                                <td colspan="3" align="center" valign="top" bgcolor="#003366" class="bidex">DATE</td>
                                <td colspan="4" align="center" valign="top" bgcolor="#003366" class="bidex">FULLNAME</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex"> STATUS</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex">ACTIONED TIME</td>
                                <td align="center" valign="top" bgcolor="#003366" class="bidex"><label>ACTIONED BY</label></td>
                              </tr>
							  <?php 
 $resultqq=mysql_query("select * from user_mgt where date='$_SESSION[startdate]'"); 
while ($rowqq=mysql_fetch_assoc($resultqq)){$i++; 
//extract($rowqq); ?>	
                    <tr>
                      <td height="34" colspan="2" valign="top"><?php echo $i;?></td>
                                <td colspan="3" align="center" valign="top"><?php echo $rowqq[date];?></td>
                                <td colspan="4" align="center" valign="top"><?php echo $rowqq[fullname];?></td>
					            <td align="center" valign="top"><?php echo $rowqq[status];?></td>
                                <td align="left" valign="top"><?php echo $rowqq[posted_time];?></td>
                                <td align="center" valign="top"><label><?php echo $rowqq[posted_by];?></label></td>
                              </tr>
							   <?php
		}
        ?> 
                    <tr>
                      <td height="38"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        </tr>
                    
                  </table></td>
                          <td></td>
                </tr>
                <tr>
                  <td height="268"></td>
                  <td>&nbsp;</td>
                  <td></td>
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              </table></td>
              <td></td>
              </tr>
            <tr>
              <td height="50"></td>
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
