<?php
$db = mysql_connect("172.16.12.8:3306", "root", "*123#password@10") or die(mysql_error());
mysql_select_db("arikair_vehicle",$db) or die(mysql_error());

session_start();
$date=date("Y-m-d");

$b=time();
$dates=date("g:i:s A D, F jS Y",$b);
//system info
$k1=$_SERVER['REMOTE_ADDR'];
$k2=gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$ip=$k1."/".$k2;

date_default_timezone_set('Africa/Lagos');
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$_SESSION[sys_ip]=$_SERVER['REMOTE_ADDR']; 
$_SESSION[sys_name]=gethostbyaddr($_SERVER['REMOTE_ADDR']);

$_SESSION[sys_ip] = $_SESSION[sys_ip].'/'. $_SESSION[sys_name];

if(isset($_POST['submit'])){

if (!empty($_POST['username'])&&(!empty($_POST['password']))){
    $ldap_host = "172.16.12.16:389";
    $user = $_POST[username];
	$user="arikair"."\\".$user;
    $password = $_POST[password];
	$_SESSION['username']=$_POST['username'];
   $SearchFor=$_POST[username];               //What string do you want to find?
   $SearchField="samaccountname";   //In what Active Directory field do you want to search for the string?

   $LDAPHost = "172.16.12.16:389";       //Your LDAP server DNS Name or IP Address
   $dn = "DC=arikair,DC=local"; //Put your Base DN here
   $LDAPUserDomain = "@arikair.com";  //Needs the @, but not always the same as the LDAP server domain
   //$LDAPUser = "arikair\portalnoreply";        //A valid Active Directory login
   $LDAPUserPassword = $_POST[password]; //"password@3";
   $LDAPFieldsToFind = array("cn", "givenname", "samaccountname", "homedirectory", "telephonenumber", "mail");
     
   $cnx = ldap_connect($LDAPHost) or die("Could not connect to LDAP");
   ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);  //Set the LDAP Protocol used by your AD service
   ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);         //This was necessary for my AD to do anything
   $ldap_bind=ldap_bind($cnx,$user,$LDAPUserPassword);
  
$sqla="select * from user where username='$_POST[username]'";
$resulta=mysql_query($sqla);
$rowa=mysql_fetch_assoc($resulta);
$aa=mysql_num_rows($resulta);
$_SESSION[priviledge]=$rowa[priviledge];
$_SESSION[sales_group]=$rowa[sales_group];
$_SESSION[country]=$rowa[country];
$_SESSION[region]=$rowa[region];




   if ((($ldap_bind)&&($aa==1))||($ss==1)){ 
	
	$_SESSION[login]=true;
	
   error_reporting (E_ALL ^ E_NOTICE);   //Suppress some unnecessary messages
  // $filter="($SearchField=$SearchFor*)"; //Wildcard is * Remove it if you want an exact match
   $filter="($SearchField=$SearchFor)"; //Wildcard is * Remove it if you want an exact match
   $sr=ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
   $info = ldap_get_entries($cnx, $sr);
  
  $_SESSION['username']=$_POST[username];
  
   for ($x=0; $x<$info["count"]; $x++) {
     $sam=$info[$x]['samaccountname'][0];
     $giv=$info[$x]['givenname'][0];
     $tel=$info[$x]['telephonenumber'][0];
     $email=$info[$x]['mail'][0];
	 $eid=$info[$x]['employeeId'][0];
	 $en=$info[$x]['serialNumber'][0];
     $nam=$info[$x]['cn'][0];
     $dir=$info[$x]['homedirectory'][0];
     $dir=strtolower($dir);
     $pos=strpos($dir,"home");
     $pos=$pos+5;
	 $_SESSION[email]=$email;
	 $_SESSION[eid]=$eid;
	 $_SESSION[en]=$en;
	 $_SESSION[cn]=$nam; //fullname
	 $_SESSION[cn]=strtoupper($_SESSION[cn]);
	 $_SESSION[telephone]=$tel;
	 $_SESSION[givenname]=$giv;
	 
	 
	 $sql=mysql_query("insert into userlog (ip_address, fullname, login_date, email, username) values('$_SESSION[sys_ip]','$_SESSION[cn]','$dates','$_SESSION[email]','$_SESSION[username]')") or die(mysql_error());

	 } 	 header("location: authenticate.php");
	 
	 
	 
 }
	 else{
	 header("location:index.php?msg=Access Denied !!!");
	  }

}

}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicle Management System | Arik Air Limited </title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<link type="text/css" rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.powertip.css" />
<script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  
</head>

<body onload="goforit();">

<!-- Container -->
<div id="container">


<!-- Header -->
<div id="upper">
<img src="images/logo3.jpg" id="logo"/>

<span id="soft"><h2>Vehicle Management System</h2><h6>More Control, More Possibilities</h6></span>


</div><!-- end of header -->

<!-- Menu -->
<div id="back">
</div><!-- end of menu -->

<!-- Menu -->
<div id="menu">
<span id="date"><?php include("includes/date.php"); ?></span>
</div><!-- end of menu -->


<!-- Content -->
<div id="content">


<!-- Left Content -->
<div id="leftcont">
<!--/top-->

<img src="images/veh.jpg" /> 

  
</div><!-- end of leftcontent -->

<!-- Right Content -->
<div id="rightcont">
 
 
<div id="loge">
<img src="images/lecturer_icon.png" />
</div>

<form action"<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<fieldset>
<h5><?php if(isset($_GET['msg'])){
	$err = htmlspecialchars(mysql_real_escape_string($_GET['msg']));
	echo $err;
	} ?></h5>
<label class="conte"><span>Username:</span><input type="text" name="username"/></label>
<label class="conte"><span>Password:</span><input type="password" name="password" /></label>
<input name="submit" type="submit" value="Submit" id="subub"/>
</fieldset>
</form>

<!--
<div id="news">
	
    
    <div id="newsa">
    
    	<div id="mouseon-examples">
		
		<div>
			<a href="" style="text-decoration:underline;">-Vehicle Management</a>
		</div>
        
        	<span>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Driver Management</a>
		</span>
        <br />
        <br />	
    
        <font>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Fuel Monitoring</a>
		</font>
           <br />
        <br />
        	    
             <details>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Mainteinance Control</a>
		</details>
        
	</div><!-- end of mouseon-->
    
<!--
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="js/jquery.powertip.js"></script>
	<script type="text/javascript">
		$(function() {
			

			// mouse follow examples
			$('#mousefollow-examples div').powerTip({followMouse: true});

			// mouse-on examples
			$('#mouseon-examples div').data('powertipjq', $([
				'<p><b>Vehicle Management</b></p>',
				
				'<p><code>We want to keep track of the day-to-day, \<br>\ activities of the running of our official \<br>\ in other to measure performance </code></p>'
			].join('\n')));
			
			// mouse-on examples
			$('#mouseon-examples span').data('powertipjq', $([
				'<p><b>Driver Management</b></p>',
				
				'<p><code>Managing driver by getting an upclose on, \<br>\ daily duty and availability, we believe \<br>\ with more controls, we get more possibilities </code></p>'
			].join('\n')));
			
			
			// mouse-on examples
			$('#mouseon-examples font').data('powertipjq', $([
				'<p><b>Fuel Monitoring</b></p>',
				
				'<p><code>How many litres consumed by each vehicle per day, \<br>\ how many litres consumed in total per day.  \<br>\ daily, weekly and monthly reporting is valuable </code></p>'
			].join('\n')));
			
			
					// mouse-on examples
			$('#mouseon-examples details').data('powertipjq', $([
				'<p><b>Maintenance control</b></p>',
				
				'<p><code>Fault reporting and analysis, parts replacement, \<br>\ these will help us keep track of the fault history \<br>\ fault history of the vehicle </code></p>'
			].join('\n')));
			
			
			$('#mouseon-examples div').powerTip({
				placement: 'e',
				mouseOnToPopup: true
			});

			$('#mouseon-examples span').powerTip({
				placement: 'e',
				mouseOnToPopup: true
			});
			
				$('#mouseon-examples font').powerTip({
				placement: 'e',
				mouseOnToPopup: true
			});
			
				$('#mouseon-examples details').powerTip({
				placement: 'e',
				mouseOnToPopup: true
			});


			// api examples
			$('#api-open').on('click', function() {
				$.powerTip.showTip($('#mouseon-examples div'));
			});
			$('#api-close').on('click', function() {
				$.powerTip.closeTip();
			});
		});
	</script>
</div><!-- end of newsa -->

<!--
 <div id="newsb">

        <br />
        
        	<span>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Speed and Meter Monitoring</a>
		</span>
        <br />
        <br />
        	
    
        <font>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Insurance Package</a>
		</font>
           <br />
        <br />

        <font>
			<a href="map.php" style="padding:1.6em; text-decoration:underline;">-Part Replacement</a>
		</font>
           <br />
        <br />
        
                <font>
			<a href="" style="padding:1.6em; text-decoration:underline;">-Rostering</a>
		</font>
           <br />
        <br />
      
</div>
<!-- end of newsb -->


<!--</div><!-- end of news -->

</div><!-- end of rightcontent -->


</div><!-- end of content -->


<!-- Footer-->
<div id="footer">

<span id="links"><a href="">Vehicle Management System - Arik Air Limited &copy; 2015</a></span>
</div><!-- end of footer	 -->



</div><!-- end of container -->

</body>
</html>