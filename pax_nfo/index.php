<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Dynamic Form Processing with PHP | Tech Stream</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
		<script type="text/javascript" src="js/script.js"></script> 


  <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
  <script>
  $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});
   </script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<link rel="stylesheet" href="js/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="js/ui.theme.css" type="text/css">
    </head>
    <body>    
        <form action="process.php" class="register" method="POST">
           
			<fieldset class="row1">
                <legend>Travel Information</legend>
				<p>
                    <label>Boarding From:
                    </label>
                    <input name="bus" type="text" value="LOS" readonly="readonly" disabled="disabled"/>
                    
                    
                  <label>To: 
                    </label>
                    <input name="bus" type="text" value="ABV" readonly="readonly" disabled="disabled"/>
                    
                    				
				 <label>No. of Passengers*
                    </label>
                    <input name="bus" type="text" value="5" readonly="readonly" disabled="disabled"/>
		
                </p>
                
                <p>
					<label>Departure Date:
                    </label>
                    <input name="from" value="2017-03-01" readonly="readonly" type="text" disabled="disabled"/>
					<label>Arrival Date*
                    </label>
					<input name="to" value="2017-03-01" readonly="readonly" type="text" disabled="disabled"/>
								<label>*Arrival Date:
                    </label>
					<input name="to" value="N253,000" readonly="readonly" type="text" disabled="disabled"/>
                </p>
                <p>
                    <label>Departure Time *
                    </label>
                    <input name="mob" value="1300" readonly="readonly" type="text" disabled="disabled"/>
                    <label>Arrival Time*
                    </label>
                    <input name="mob" value="1445" readonly="readonly" type="text" disabled="disabled"/>
                       <label>Repeat Mobile*
                    </label>
                    <input name="mob" value="1540" readonly="readonly" value="" type="text" disabled="disabled"/>
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
				 // $nopax = 4;
				  //$nopax = $nopax-1;
				  //for($i=0; $i<= $nopax; $i++) { ?>
                  
                    <tr>
                      <p>
						<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                        
                        
						 <td>
							<label for="BX_birth">Salutation:</label>
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
							<input type="text" style="width:120px;" required="required" name="BX_NAME[]">
						 </td>
                         
                         <td>
							<label>Other Names:</label>
							<input type="text" style="width:120px;" required="required" name="BX_NAME[]">
						 </td>
                                 <?php 
						 $infant =1;
						 $child =0;
						 if($infant > 0 || $child > 0){ ?>
						 <td>
							<label for="BX_birth">Passenger Type</label>
							<select id="BX_birth" name="BX_birth[]" required="required">
								<option>....</option>
                                <option>Adult</option>
								<option>Infant</option>
								<option>Child</option>
							</select>
						 </td>
                         
                         
					
					
                         
                 
						 <td>
				      <label>Date of Birth*<br />
                  
                    <select class="date" name="day">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
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
                    <select name="month">
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>	
                      <select name="type">
                        <option value="2017">2017
                        </option>
                        <option value="2016">2016
                        </option>
					</select>				
				  </label>
                  
                  
						 </td>
                         
                         	
                         <?php }?>
							</p>
                    </tr>
                     <?php //}?>
                    
                    <tr>
                 
                  
					
                    </tbody>
                </table>
				<div class="clear"></div>
            </fieldset>
            
            <br />
            <br />
              <br />
              
            <fieldset class="row1">
            <legend>Contact Details</legend>
            		<label>Email Address:</label>
							<input type="text" style="width:150px;" required="required" name="email">
                            
                            <label>Mobile:</label>
							<input type="text" style="width:130px;" required="required" name="mobile">
						 
       
            </fieldset>
        <br />
              <br />
           
               <fieldset class="row1">
                <legend>Further Information</legend>
				<p>For All International Flights out of Lagos Airport, Check-in opens <strong>4½ hours</strong> and closes 90 minutes before your scheduled take off			
		Avoid the queues, check-in online to selected destinations. Online check-in opens <strong>24 hours before the scheduled departure</strong> of the flight and <strong>closes 3 hours before</strong>. Visit <a href="http://www.arikair.com/" target="_blank">www.arikair.com</a> for details. </p>
				<div class="clear"></div>
            </fieldset>
          
            <fieldset class="row4">
                <legend>Terms and Mailing</legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your Service</label>
                </p>
				
				<div class="clear"></div>
            </fieldset>
			<input class="submit" type="submit" value="Confirm &raquo;" />
			<a class="submit" href=""/>Back to previous</a>
			
			<div class="clear"></div>
        </form>
		
    </body>
	<!-- Start of StatCounter Code for Default Guide -->

<div class="modal"><!-- Place at bottom of page --></div>
<!-- End of StatCounter Code for Default Guide -->
</html>


