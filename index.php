<?php
session_start();
ob_start();
include_once ('db.php');
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");

//counting the no of booking for today
     
						
if (isset($_GET['action'])){
	
	$traveldate=mysql_real_escape_string($_POST['tdate']);
$origina=mysql_real_escape_string($_POST['origin']);
$destin=mysql_real_escape_string($_POST['destination']);
	
$_SESSION['tdate']=mysql_real_escape_string($_POST['tdate']);
$_SESSION['origin']=mysql_real_escape_string($_POST['origin']);
$_SESSION['destination']=mysql_real_escape_string($_POST['destination']);
$_SESSION['AD']=$_POST['AD']; //no of adult
$_SESSION['CD']=$_POST['CD']; //no of child
$_SESSION['INFT']=$_POST['INFT']; //no of INFANT
$_SESSION['npeople']=$_SESSION['AD']+$_SESSION['CD']; //total no of seat your request will require. infant is not invlved bcos adult will carry them.

$dator =$_POST['tdate'];
$weekday = date('l', strtotime($dator)); // note: first arg to date() is lower-case L
//echo $weekday; // SHOULD display Wednesday
$q=strtoupper($weekday);
if ($q=="MONDAY"){$q1=1;}elseif ($q=="TUESDAY"){$q1=2;}elseif ($q=="WEDNESDAY"){$q1=3;}elseif ($q=="THURSDAY"){$q1=4;}elseif ($q=="FRIDAY"){$q1=5;}elseif ($q=="SATURDAY"){$q1=6;}elseif ($q=="SUNDAY"){$q1=7;}

/*
$_POST[date]="2017-03-09";  //$_POST[date];
$_POST[origin]="LOS";  //$_POST[origin];
$_POST[destination]="ACC";  //$_POST[destination];
*/

$q1="%".$q1."%";
$_SESSION[q1]=$q1;
//checking schedule availability
$a=mysql_query("select * from flt_sched where '$traveldate' between valid_startdate and valid_enddate and origin='$origina' and destination='$destin' and status='ENABLED' and days like '$q1'");
$na=mysql_num_rows($a);

echo $_SESSION['tdate'];
echo '<br>';
echo $_SESSION['origin'];
echo '<br>';
echo $_SESSION['AD'];
echo '<br>';
echo $_SESSION['CD'];
echo '<br>';
echo $_SESSION['INFT'];
echo '<br>';
echo $_SESSION['destination'];
echo '<br>';
echo $_SESSION['npeople'];


// PLEASE NOTE THAT WE CANNOT DETERMINE SEAT AVAILABILITY YET BECAUSE THERE ARE DIFFERENT FLIGHTS SAME DATE WITH DIFFERENT TIME ON THE REQUESTED ROUTE. SO THE CUSTOMER HAS TO SELECT THE ONE THAT SUITS HIM AND THEN WE CAN DETERMINE IF THE SEAT AVAILABLE CAN CATER FOR THEIR REQUEST.
/*
//checking seat booked from sales
$b=mysql_query("select count(*) as id from collection where '$_POST[tdate]' between valid_startdate and valid_enddate and origin='$_POST[origin]' and destination='$_POST[destination]'");
$rb=mysql_fetch_assoc($b);

//checking seat booked from MARS sales
$h=mysql_query("select count(*) as id from mars_dumps where travel_date='$_POST[tdate]' and origin='$_POST[origin]' and destination='$_POST[destination]'");
$rh=mysql_fetch_assoc($h);

//checking ACTIVE seat available
$c=mysql_query("select sum(nseat) as id from fares_pricing where '$_POST[tdate]' between valid_startdate and valid_enddate and origin='$_POST[origin]' and destination='$_POST[destination]'");
$rc=mysql_fetch_assoc($c);
$seat=$rc[id];

*/
if ($na!=0){
echo $na;
session_write_close();
header("location:nbooking1.php"); //show the schedule for the chosen date
}else{
	
	echo 'No flight';
header("location: index.php?msg=There are no flights available for your travel date");
}


}

						?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Flights to and from Nigeria &amp; West Africa | Arik Air</title>
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

<style type="text/css">
<!--
body {
	background-image: url(images/standard_background_1.jpg);
	margin-top: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif, Garamond;
}
.centerTable { margin: 0px auto; }
.Example_H {
-moz-box-shadow: inset -5px px 5px #888;
-webkit-box-shadow: inset -5px -5px 5px #888;
box-shadow: inset 0px -5px 5px #333333;
border-radius: 7px;
}
.border{ border-style: solid;    border: 1px solid #CCCCCC; border-radius: 5px; }
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


<script type="text/JavaScript">
setTimeout(function(){
    document.getElementById('aap').className = 'waa';
}, 10000);
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
 		
	    var date = document.getElementById('popupDatepicker');
	    var origin = document.getElementById('origin');
	    var destination = document.getElementById('destination');


if (date.value.length==0){
errors.push("Travel Date required");
}	
if (origin.selectedIndex==0){
errors.push("Please select the ORIGIN");
}	
if (destination.selectedIndex==0){
errors.push("Please select the DESIGNATION");
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

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
   <a href="index.php"><img src="images/LOGO-BASIC.png" width="155" height="70" border="0" /></a>
         
    <tr>
      <td width="60%" height="23">&nbsp;</td>
    </tr>
    <tr>
      <td height="608" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="60%" height="56" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="opc">
            <!--DWLayoutTable-->
            <tr>
              <td width="60%" height="56" align="left" valign="middle" bgcolor="#322240" class="opc"><span class="style1">&nbsp;&nbsp; </span></td>
              </tr>
            </table>          </td>
          </tr>
        <tr>

          <td height="264" valign="top"><form method="post" onsubmit="return formValidator();"action="index.php?action=true"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FAF8F9">
            <!--DWLayoutTable-->
            <tr>
              <td width="21" height="14"></td>
                  <td width="126"></td>
                  <td width="373"></td>
                  <td width="509"></td>
                  <td width="31"></td>
                  </tr>
            <tr>
              <td height="23"></td>
              <td>&nbsp;</td>
              <td colspan="2" align="center" valign="middle"><span class="style13"> </span><span class="style9">
              </span></td>
              <td></td>
              </tr>
            <tr>
              <td height="294"></td>
              <td colspan="2" valign="top">


                <table align="center" class="centerTable" width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="19" height="19">&nbsp;</td>
                        <td colspan="12" align="center" valign="middle"><span class="style8"><P class="style8" style="color:red;" id="aap">
						
						
						<?php if(isset($_GET['msg'])){echo stripslashes($_GET['msg']); }?>
                        
                        </P></span></td>
                        <td width="27">&nbsp;</td>
                      </tr>
                <tr>
                  <td height="33">&nbsp;</td>
                        <td colspan="12" align="center" valign="middle" bgcolor="#003366"><span class="style14">Search A Flight </span></td>
                        <td>&nbsp;</td>
                      </tr>
                <tr>
                  <td height="18"></td>
                        <td width="55"></td>
                        <td width="48"></td>
                        <td width="15"></td>
                        <td width="37"></td>
                        <td width="26"></td>
                        <td width="66"></td>
                        <td width="12"></td>
                        <td width="18"></td>
                        <td width="47"></td>
                        <td width="32"></td>
                        <td width="48"></td>
                        <td width="38"></td>
                        <td></td>
                      </tr>
                <tr>
                  <td height="26"></td>
                        <td colspan="3" align="right" valign="top"><span class="style16">Travel Date </span></td>
                        <td>&nbsp;</td>
                        <td colspan="4" valign="top"><label>
                          <input name="tdate" type="text" id="datepicker" required="required" value="<?php print_r($_POST['tdate']) ?>" size="12" placeholder="YYYY-MM-DD" />
                          </label></td>
                        <td>&nbsp;</td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                <tr>
                  <td height="25"></td>
                        <td colspan="3" align="right" valign="top"><span class="style16">Origin</span></td>
                        <td></td>
                        <td colspan="4" valign="top"><label><span class="bidex">
                          <select name="origin" id="origin">
                       <?php if(!empty($_POST['origin'])) { ?>
                            <option value="<?php print_r($_POST['origin']); ?>"> <?php print_r($_POST['origin']); ?></option>
                     <?php } else {?>
         <option value="LOS">Lagos</option>
         <?php } ?>
                      <!--<option value="ABJ">Abidjan</option>--><option value="ABV">Abuja</option><!--<option value="ACC">Accra</option>--><option value="ABB">Asaba</option><!--<option value="BJL">Banjul</option>--><option value="BNI">Benin City</option><option value="CBQ">Calabar</option><!--<option value="COO">Cotonou</option><option value="DKR">Dakar</option><option value="DLA">Douala</option>--><option value="ENU">Enugu</option><!--<option value="FNA">Freetown</option>--><option value="GMO">Gombe</option><option value="IBA">Ibadan</option><option value="ILR">Ilorin</option><option value="JOS">Jos</option><option value="KAD">Kaduna</option><option value="KAN">Kano</option><!--<option value="FIN">Kinshasa</option>--><option value="LOS">Lagos</option><!--<option value="LBV">Libreville</option><option value="LAD">Luanda</option><option value="ROB">Monrovia</option>--><option value="QOW">Owerri</option><option value="PHC">Port Harcourt International</option><option value="SKO">Sokoto</option><option value="QUO">Uyo</option><option value="QRW">Warri</option><option value="YOL">Yola</option>
                            </select>
                          </span></label></td>
                        <td>&nbsp;</td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                <tr>
                  <td height="26"></td>
                        <td colspan="3" align="right" valign="top"><span class="style16">Destination</span></td>
                        <td></td>
                        <td colspan="4" valign="top"><label><span class="bidex">
                          <select name="destination" id="destination">
                                   <?php if(!empty($_POST['destination'])) { ?>
                            <option value="<?php print_r($_POST['destination']); ?>"> <?php print_r($_POST['destination']); ?></option>
                     <?php } else {?>
         <option value="ABV">Abuja</option>
         <?php } ?>
                   
                      <!--<option value="ABJ">Abidjan</option>--><option value="ABV">Abuja</option><!--<option value="ACC">Accra</option>--><option value="ABB">Asaba</option><!--<option value="BJL">Banjul</option>--><option value="BNI">Benin City</option><option value="CBQ">Calabar</option><!--<option value="COO">Cotonou</option><option value="DKR">Dakar</option><option value="DLA">Douala</option>--><option value="ENU">Enugu</option><!--<option value="FNA">Freetown</option>--><option value="GMO">Gombe</option><option value="IBA">Ibadan</option><option value="ILR">Ilorin</option><option value="JOS">Jos</option><option value="KAD">Kaduna</option><option value="KAN">Kano</option><!--<option value="FIN">Kinshasa</option>--><option value="LOS">Lagos</option><!--<option value="LBV">Libreville</option><option value="LAD">Luanda</option><option value="ROB">Monrovia</option>--><option value="QOW">Owerri</option><option value="PHC">Port Harcourt International</option><option value="SKO">Sokoto</option><option value="QUO">Uyo</option><option value="QRW">Warri</option><option value="YOL">Yola</option>
                            </select>
                            </select>
                          </span></label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                <tr>
                  <td height="22"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                      </tr>
                <tr>
                  <td height="25"></td>
                      <td align="left" valign="top"><span class="style16">Adult : </span></td>
                      <td valign="top"><label>
                        <select name="AD" id="AD">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                            <option value="0">0</option>
                        </select>
                      </label></td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="left" valign="top"><span class="style16">Child</span> : </td>
                      <td valign="top"><select name="CD" id="CD">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                                            </select></td>
                      <td>&nbsp;</td>
                      <td colspan="2" valign="top"><span class="style16">Infant : </span></td>
                      <td colspan="2" valign="top"><select name="INFT" id="INFT">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select></td>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
                <tr>
                  <td height="20"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                <tr>
                  <td height="26"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td colspan="2" valign="top"><label>
                          <input type="submit" name="Submit" value=" Search Flight &gt;&gt;" />
                          </label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                </tr>
                <tr>
                  <td height="19"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>&nbsp;</td>
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
              <td height="28"></td>
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
                &copy; Arik Air 2017.<br /> 
             
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
