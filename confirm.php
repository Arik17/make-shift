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
         <span style="font-weight:bold; font-size:18px; float:right; padding:10px 10px 10px 10px;">CONFIRM YOUR BOOKING</span>
            
         
    </div>   
        <form action="savedbookings.php" class="register" method="POST">
         
			<fieldset class="row1">
                <legend>Travel Information</legend>
				<p>
                    <label>Boarding From:
                    </label>
                    <input name="bus" type="text" class="datas" value="<?php echo $_SESSION['origin'];?>" readonly="readonly" disabled="disabled"/>
                    
                    
                  <label>To: 
                  </label>
                    <input name="bus" type="text" class="datas" value="<?php echo $_SESSION['destination'];?>" readonly="readonly" disabled="disabled"/>
                    
                    				
				 <label>No. of Passengers:
                  </label>
                    <input name="bus" type="text" class="datas" value="<?php echo $_SESSION['AD'] + $_SESSION['INFT'] + $_SESSION['CD']; ?>" readonly="readonly" disabled="disabled"/>
		
                </p>
                
                <p>
					<label>Departure Date:
                    </label>
                    <input name="from" value="<?php
					 //date("D M j G:i:s T Y");
					  echo  $_SESSION['tdate'];  ?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
					<label>Flight:
                    </label>
					<input name="to" value="<?php echo $_SESSION['flt_no']; ?>" class="datas" readonly="readonly" type="text" disabled="disabled"/>
								 <label>Amount:
                    </label>
					<?php $_SESSION['sum_amount'] = ($_SESSION['AD']*$_SESSION['adult_fare']) + ($_SESSION['CD']*$_SESSION['adult_fare']*0.75)+ ($_SESSION[INFT]*$_SESSION[adult_fare]*0.1);?>
                  <input name="std"  class="datas" style="color:#F00;" value="<?php echo '&#8358;' . number_format($_SESSION['sum_amount'], 2);?>" readonly="readonly" type="text" disabled="disabled"/>
                                
                                
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
				
              
               <table id="dataTable" class="form" border="1">
                  <tbody>
                    	<?php if(isset($_POST)==true){
				
				$names=$_POST['names'];
				$surname=$_POST['surname'];
				$pax_type=$_POST['pax_type'];			
				$salute=$_POST['salute'];
				$day=$_POST['day'];
				$month=$_POST['month'];
				$year=$_POST['year'];
				$email=$_POST['email'];
				$mobile=$_POST['mobile'];
									
			?>
                <?php foreach($salute as $a => $b){ ?>
                   <p>
                    <tr>
                     
					<td>	<?php echo $a+1; ?></td>
                        
					
                        
                        	<td>
							<label>Title:</label>
							<input type="text" name="salute[$a]" value="<?php echo $salute[$a]; ?>" disabled="disabled">
						 </td>
                         <input type="hidden" name="transaction_id[]" value="<?php echo $_SESSION['fares_transaction_id']; ?>" disabled="disabled">
                        
                        	<td>
							<label>Surname:</label>
							<input type="text" name="surname[]" value="<?php echo $surname[$a]; ?>" disabled="disabled">
						 </td>
                         
                         <td>
							<label>Other Names:</label>
							<input type="text" name="names[]" value="<?php echo $names[$a]; ?>" disabled="disabled">
						 </td>
                                
                                <td>
							<label>Passenger Type:</label>
							<input type="text" name="pax_type[]" value="<?php echo $pax_type[$a]; ?>" disabled="disabled">
						 </td>
                                
                                <td>
                                <?php $dob = $year[$a] .'-'.$month[$a].'-'. $day[$a]; ?>
							<label>DoB:</label>
							<input type="text" name="dob[]" value="<?php  echo $dob; ?>" disabled="disabled">
						 </td>
                                
                                
                                
                         
                         
					
					
                         
                 
						
							
                    </tr>
                    </p>
                    <?php } } ?>
                    
                  
                  
					
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
							<input type="text" style="width:150px;" required="required" name="email" value="<?php echo $email; ?>" disabled="disabled">
                            
                            <label>Mobile:</label>
							<input type="text" style="width:130px;" required="required" value="<?php echo $mobile; ?>" name="mobile" disabled="disabled">
						 
       
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
          
            <fieldset class="row4">
               
                
               
				
				<div class="clear"></div>
            </fieldset>
			<input class="submit" type="submit" value="Complete Booking &raquo;" />
            
			<a class="submit" onclick="goBack()" href=""/>Back to previous</a>
	
			
			<div class="clear"></div>
            
      </form> 

		
    </body>
	<!-- Start of StatCounter Code for Default Guide -->

<div class="modal"><!-- Place at bottom of page --></div>
<!-- End of StatCounter Code for Default Guide -->
</html>
<!-- <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> -->