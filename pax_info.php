<?php
session_start();
ob_start();
include_once ('db.php');
$b=time();
$time=date("g:i:s A D, F jS Y",$b);
$date=date("Y-m-d");




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
    ajaxStart: function() { $body.addClass("loading");    },
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
         <span style="font-weight:bold; font-size:18px; float:right; padding:10px 10px 10px 10px;">COMPLETE YOUR BOOKING</span>
            
         
    </div>   
        <form action="savedbookings.php" class="register" method="POST">
           
			<fieldset class="row1">
                <legend>Travel Information</legend>
				<p>
                    <label>Boarding From:
                    </label>
                    <input name="" type="text" class="datas" value="<?php echo $_SESSION['origin'];?>" readonly="readonly" disabled="disabled"/>
                    
                    
                  <label>To: 
                  </label>
                    <input name="" type="text" class="datas" value="<?php echo $_SESSION['destination'];?>" readonly="readonly" disabled="disabled"/>
                    
                    				
				 <label>No. of Passengers:
                  </label>
                    <input name="" type="text" class="datas" value="<?php echo $_SESSION['AD'] + $_SESSION['INFT'] + $_SESSION['CD']; ?>" readonly="readonly" disabled="disabled"/>
		
                </p>
                
                <p>
					<label>Departure Date:
                    </label>
                    <input name="" value="<?php
					 //date("D M j G:i:s T Y");
					  echo  $_SESSION['tdate'];  ?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
					<label>Flight:
                    </label>
					<input name="" value="<?php echo $_SESSION['flt_no']; ?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
								 <label>Amount:
                    </label>
					<?php $sum_amount = ($_SESSION['AD']*$_SESSION['adult_fare']) + ($_SESSION['CD']*$_SESSION['adult_fare'])+ ($_SESSION['INFT']*($_SESSION['adult_fare']*0.1));?>
                  <input name="std"  class="datas" style="color:#F00;" value="<?php echo '&#8358;' . number_format($sum_amount, 2);?>" readonly="readonly" type="text" disabled="disabled"/>
                                
                                
                </p>
                <p>	
                    <label>Departure Time:
                    </label>
                    <input name="std" value="<?php echo $_SESSION['std'];?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
                   <label>Arrival Time:
                    </label>
                    <input name="sta" value="<?php echo $_SESSION['sta'];?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
                      <!--<label>Arrival Date:
                    </label>
					<input name="to" value="<?php //echo $_SESSION['destination'];?>" class="datas" readonly="readonly" type="text" disabled="disabled"/> -->
                </p>
				<div class="clear"></div>
            </fieldset>
        
            <fieldset class="row1">
				<legend>Passenger Details</legend>
				<!--<p> 
					<input type="button" value="Add Passenger" onClick="addRow('dataTable')" /> 
					<input type="button" value="Remove Passenger" onClick="deleteRow('dataTable')"  /> 
					<p>(All acions apply only to entries with check marked check boxes only.)</p>
				</p>
                -->
                
               <table id="dataTable" class="form" border="1">
                  <tbody>
                  
                  <?php 
				  
				  //Adult
				  $noad =  $_SESSION['AD'];
				  
				  //+ $_SESSION['INFT'] + $_SESSION['CD'];
				// $nopax = $nopax-1;
				 for($i=0; $i<= $noad-1; $i++) { ?>
                  
                    <tr>
                      <p>
					
                        
						 <td>
							<label for="salute">Title:</label>
							<select name="salute[]" required="required">
								<option>....</option>
                                <option>Mr</option>
								<option>Mrs</option>
								<option>Dr.</option>
                                <option>Miss</option>
                                <option>Chief.</option>
							</select>
						 </td>
                        
                        
                        	<td>
							<label>Surname:</label>
							<input type="text" style="width:120px;" required="required" name="surname[]">
						 </td>
                         
                         <td>
							<label>Other Names:</label>
							<input type="text" style="width:200px;" required="required" name="names[]">
						 </td>
                          <td>
							<label>Passenger Type:</label>
							<input type="text" value="Adult" name="pax_type[]" readonly="readonly">
						 </td>
                         <input type="hidden" required="required" value="<?php echo $_SESSION['adult_fare']; ?>" name="amount[]">
                        
						   <input type="hidden" required="required" value="" name="day[]">
                         <input type="hidden" required="required" value="" name="month[]">
                         <input type="hidden" required="required" value="" name="year[]">
                         
					
					
                         
                 
	
                         
                 
							</p>
                    </tr>
                     <?php }?>
                     
                    
                
            <?php 
				  $nocd =  $_SESSION['CD'];
				  
				  //+ $_SESSION['INFT'] + $_SESSION['CD'];
				// $nopax = $nopax-1;
				 for($i=0; $i<= $nocd-1; $i++) { ?>
                  
                    <tr>
                      <p>
					
                        
						 <td>
							<label for="salute">Title:</label>
							<select name="salute[]" required="required">
								<option>....</option>
                                <option>Mr</option>
								<option>Mrs</option>
								<option>Dr.</option>
                                <option>Miss</option>
                                <option>Chief.</option>
							</select>
						 </td>
                        
                        
                        	<td>
							<label>Surname:</label>
							<input type="text" style="width:120px;" required="required" name="surname[]">
						 </td>
                         
                         <td>
							<label>Other Names:</label>
							<input type="text" style="width:200px;" required="required" name="names[]">
						 </td>
                          <td>
							<label>Passenger Type:</label>
							<input type="text" value="Child" name="pax_type[]" readonly="readonly">
						 </td>
                    <input type="hidden" required="required" value="<?php echo $_SESSION['adult_fare']; ?>" name="amount[]">
                         
                            <input type="hidden" required="required" value="" name="day[]">
                         <input type="hidden" required="required" value="" name="month[]">
                         <input type="hidden" required="required" value="" name="year[]">
					
					

                         
                 
							</p>
                    </tr>
                     <?php }?>           
                 
                 
                 
                 <?php 
				  $noinft =  $_SESSION['INFT'];
				  
				  //+ $_SESSION['INFT'] + $_SESSION['CD'];
				// $nopax = $nopax-1;
				 for($i=0; $i<= $noinft-1; $i++) { ?>
                  
                    <tr>
                      <p>
					
                        
						 <td>
							<label for="salute">Title:</label>
							<select name="salute[]" required="required">
								<option>....</option>
                                <option>Mr</option>
								<option>Mrs</option>
								<option>Dr.</option>
                                <option>Miss</option>
                                <option>Chief.</option>
							</select>
						 </td>
                        
                        
                        	<td>
							<label>Surname:</label>
							<input type="text" style="width:120px;" required="required" name="surname[]">
						 </td>
                         
                         <td>
							<label>Other Names:</label>
							<input type="text" style="width:200px;" required="required" name="names[]">
						 </td>
                           <td>
							<label>Passenger Type:</label>
							<input type="text" value="Infant" name="pax_type[]" readonly="readonly">
						 </td>
                        <input type="hidden" required="required" value="<?php echo $_SESSION['adult_fare'] *0.1; ?>" name="amount[]">
                      
                         
                         
					
					
                         
                 
						 <td>
				      <label>Date of Birth*<br />
                  
                    <select class="date" name="day[]">
                        <option value="01">01
                        </option>
                        <option value="02">02
                        </option>
                        <option value="03">03
                        </option>
                        <option value="04">04
                        </option>
                        <option value="05">05
                        </option>
                        <option value="06">06
                        </option>
                        <option value="07">07
                        </option>
                        <option value="08">08
                        </option>
                        <option value="09">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>

                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select name="month[]">
                        <option value="01">January
                        </option>
                        <option value="02">February
                        </option>
                        <option value="03">March
                        </option>
                        <option value="04">April
                        </option>
                        <option value="05">May
                        </option>
                        <option value="06">June
                        </option>
                        <option value="07">July
                        </option>
                        <option value="08">August
                        </option>
                        <option value="09">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>	
                      <select name="year[]">
                       <option  value="2017">2017</option>
            <option  value="2016">2016</option>
            <option  value="2015">2015</option>
            <option  value="2014">2014</option>
            <option  value="2013">2013</option>
            <option  value="2012">2012</option>
            <option  value="2011">2011</option>
            <option  value="2010">2010</option>
            <option  value="2009">2009</option>
            <option  value="2008">2008</option>
            <option  value="2007">2007</option>
            <option  value="2006">2006</option>
            <option  value="2005">2005</option>
            <option  value="2004">2004</option>
            <option  value="2003">2003</option>
            <option  value="2002">2002</option>
            <option  value="2001">2001</option>
            <option  value="2000">2000</option>
            <option  value="1999">1999</option>
            <option  value="1998">1998</option>
            <option  value="1997">1997</option>
            <option  value="1996">1996</option>
            <option  value="1995">1995</option>
            <option  value="1994">1994</option>
            <option  value="1993">1993</option>
            <option  value="1992">1992</option>
            <option  value="1991">1991</option>
            <option  value="1990">1990</option>
            <option  value="1989">1989</option>
            <option  value="1988">1988</option>
            <option  value="1987">1987</option>
            <option  value="1986">1986</option>
            <option  value="1985">1985</option>
            <option  value="1984">1984</option>
            <option  value="1983">1983</option>
            <option  value="1982">1982</option>
            <option  value="1981">1981</option>
            <option  value="1980">1980</option>
            <option  value="1979">1979</option>
            <option  value="1978">1978</option>
            <option  value="1977">1977</option>
            <option  value="1976">1976</option>
            <option  value="1975">1975</option>
            <option  value="1974">1974</option>
            <option  value="1973">1973</option>
            <option  value="1972">1972</option>
            <option  value="1971">1971</option>
            <option  value="1970">1970</option>
            <option  value="1969">1969</option>
            <option  value="1968">1968</option>
            <option  value="1967">1967</option>
            <option  value="1966">1966</option>
            <option  value="1965">1965</option>
            <option  value="1964">1964</option>
            <option  value="1963">1963</option>
            <option  value="1962">1962</option>
            <option  value="1961">1961</option>
            <option  value="1960">1960</option>
            <option  value="1959">1959</option>
            <option  value="1958">1958</option>
            <option  value="1957">1957</option>
            <option  value="1956">1956</option>
            <option  value="1955">1955</option>
            <option  value="1954">1954</option>
            <option  value="1953">1953</option>
            <option  value="1952">1952</option>
            <option  value="1951">1951</option>
            <option  value="1950">1950</option>
            <option  value="1949">1949</option>
            <option  value="1948">1948</option>
            <option  value="1947">1947</option>
            <option  value="1946">1946</option>
            <option  value="1945">1945</option>
            <option  value="1944">1944</option>
            <option  value="1943">1943</option>
            <option  value="1942">1942</option>
            <option  value="1941">1941</option>
            <option  value="1940">1940</option>
            <option  value="1939">1939</option>
            <option  value="1938">1938</option>
            <option  value="1937">1937</option>
            <option  value="1936">1936</option>
            <option  value="1935">1935</option>
            <option  value="1934">1934</option>
            <option  value="1933">1933</option>
            <option  value="1932">1932</option>
            <option  value="1931">1931</option>
            <option  value="1930">1930</option>
            <option  value="1929">1929</option>
            <option  value="1928">1928</option>
            <option  value="1927">1927</option>
            <option  value="1926">1926</option>
            <option  value="1925">1925</option>
            <option  value="1924">1924</option>
            <option  value="1923">1923</option>
            <option  value="1922">1922</option>
            <option  value="1921">1921</option>
            <option  value="1920">1920</option>
            <option  value="1919">1919</option>
            <option  value="1918">1918</option>
            <option  value="1917">1917</option>

					</select>				
				  </label>
                  
                  
						 </td>
                         
                 
							</p>
                    </tr>
                     <?php }?>           
                  
                  
					
                    </tbody>
                </table>
				<div class="clear"></div>
            </fieldset>
            
    
            <!--  <div style="float:right; padding-left:20em;">
                 <a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-bff3bed521f8297a37ce950d6362f8ce-X" data-txref="rave-checkout-1490100472" data-amount="100" data-customer_email="user@example.com" data-currency = "NGN" data-pay_button_text = "Pay Now" data-country="NG" data-custom_title = "Arik Pay" data-custom_description = "" data-redirect_url = "" data-custom_logo = "//ravepay.co/files/paybutton-images/23726982e423e0bb663b0273afab8a7e.png"></a>
             </div> -->



            <fieldset class="row1">
            <legend>Contact Details</legend>
            		<label>Email Address:</label>
							<input type="text" style="width:150px;" required="required" name="email">
                            
                            <label>Mobile:</label>
							<input type="text" style="width:130px;" required="required" name="mobile">
						 
       
            </fieldset>
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
          
         
			<input class="submit" type="submit" value="Complete Booking &raquo;" />

			<a class="submit" onclick="goBack()" href=""/>Back to previous</a>
			
			<div class="clear"></div>
      </form> 
<form>
    
  </form>
		
    </body>
	<!-- Start of StatCounter Code for Default Guide -->

<div class="modal"><!-- Place at bottom of page --></div>
<!-- End of StatCounter Code for Default Guide -->
</html>
<!-- <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> -->