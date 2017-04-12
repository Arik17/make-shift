<?php include("db.php");

$ticket_no = $_GET[transaction_id];

$query = mysql_query("SELECT * FROM collection WHERE ticket_no ='".$ticket_no."'") or die(mysql_error());

$select = mysql_fetch_array($query);

extract($select);

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0196)http://fly.arikair.com/MAB/MYB/ETView.aspx?e=%27MjA9PVFURUZrTVBSVVYzMWtlQlZUVEVWVWVPUlZTekFUTQ==%27&p=%27MzA9PVFUVUZVT09aa1ZXMWtlQ0pYVndRMlFTVkVNOUFqTQ==%27&qsecid=67648a59147cf7696043fc986de33148 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
	Arik Air | Booking Manager | View Ticket
</title></head>
<body style="font-family: ArialMT, Arial, &#39;Arial Black&#39;;">
   <!-- <form name="form1" method="post" action="http://fly.arikair.com/MAB/MYB/ETView.aspx?e=%27MjA9PVFURUZrTVBSVVYzMWtlQlZUVEVWVWVPUlZTekFUTQ%3d%3d%27&amp;p=%27MzA9PVFUVUZVT09aa1ZXMWtlQ0pYVndRMlFTVkVNOUFqTQ%3d%3d%27&amp;qsecid=67648a59147cf7696043fc986de33148" id="form1"> -->
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTU5MDAyMzI1MmRk">
</div>

        
<style type="text/css">.BodyFont{font-size:8pt;}.HeadFont{font-size:28pt;}h1 {color: black;font-size: 28px;line-height: 28px;font-weight: normal;margin: 0px;padding: 12px 0px 10px 10px;}</style>

    <table cellpadding="0" cellspacing="0" border="0" align="center" width="670px">    
        <tbody><tr>
            <td class="BodyFont" valign="bottom" colspan="2" style="height:auto; width:auto; border-bottom:solid thin black;" align="left">
                <table style="width:100%">
                <tbody><tr>
                    <td align="left" valign="bottom" style="width:50px;">
                        <a href="booking.php"><img src="logo.png" alt="arikair.com" border="0" style="border-right: white thin solid; border-top: white thin solid; border-left: white thin solid; border-bottom: white thin solid;"></a> </td>
                    <td class="HeadFont" align="center" valign="bottom" style="width:600px;text-align:center;"><h1><span id="CtrlETKT_ET_HeaderKey">e-Ticket Receipt &amp; Itinerary</span></h1></td>
                    <td align="right" valign="bottom" style="height:auto;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr><td id="CtrlETKT_BarcodeCell" style="height:auto; width:100%; background-color:transparent;" align="right" valign="bottom">
                                <span id="CtrlETKT_lblBarTextKey" style="display:inline-block;font-size:XX-Small;width:100%;">
			
		</span><br>
                                <img src="GetEtktBarcode.aspx">
                            </td>
</tr>
                        </tbody></table>
                    </td>
                </tr>
                <tr><td colspan="2"></td><td><span id="CtrlETKT_lblBarDisplayNo" style="font-size:15pt;"><?php echo $ticket_no; ?></span></td></tr>
                </tbody></table>
            </td>
        </tr>
        <tr class="BodyFont"><td>&nbsp;</td><td align="left" valign="top">
			<p>Your electronic ticket is stored in our computer reservations system. This e-ticket receipt/itinerary is your record of your electronic ticket
			<br>
			and forms part of your contract of carriage.
			<br><br>
			Your attention is drawn to the Notices and Conditions of Contract set out via the link below.
			<br><a href="http://www.arikair.com/ng/Terms---Conditions.aspx" target="_blank"><u>http://www.arikair.com/ng/Terms---Conditions.aspx</u></a><a href="http://www.arikair.com/ng/Terms---Conditions.aspx"></a><br><br><strong>You may need to show this receipt to enter the airport and/or to prove return or onward travel to customs and immigration officials.</strong></p>
			<p>Arik Air check-in counters open <strong>2 hours</strong> before departure for <strong>Domestic flight</strong>. Check in desk closes <strong>30 minutes</strong> before your scheduled take off.</p>
			<p>Arik Air check-in counters open <strong>3 hours</strong> before departure for <strong>Regional flight</strong>. Check in desk closes <strong>60 minutes</strong> before your scheduled take off.</p>
			<p>Arik Air check-in counters open <strong>4 hours</strong> before departure for <strong>International flight</strong>. Check in desk closes <strong>90 minutes</strong> before your scheduled take off.</p>
			<p>
			For All International Flights out of Lagos Airport, Check-in opens <strong>4½ hours</strong> and closes 90 minutes before your scheduled take off			
			</p><p>Avoid the queues, check-in online to selected destinations. Online check-in opens <strong>24 hours before the scheduled departure</strong> of the flight and <strong>closes 3 hours before</strong>. Visit <a href="http://www.arikair.com/" target="_blank">www.arikair.com</a> for details.</p>
			<p>Following are the details of your electronic ticket.
			<br>
			Notice: All timings are local and for more information please visit us on <a href="http://www.arikair.com/" target="_blank">www.arikair.com</a> or call  +234 (0) 1279 9999 </p><p><strong>Please check with departure airport for restrictions on the carriage of liquids, aerosols and gels in hand baggage.</strong></p><br>
		</td></tr>        
        
        <tr class="BodyFont">
            <td colspan="2" valign="middle" align="left" style="height:25px; width:auto; background-color:#7E0644;">
            <strong>&nbsp;&nbsp;&nbsp;<span id="CtrlETKT_ET_PassengerHeaderKey" style="display:inline-block;color:White;width:228px;">PASSENGER AND TICKET DETAILS</span></strong>
            </td>
        </tr>
        <tr class="BodyFont">
            <td colspan="2">
                <table cellpadding="0" cellspacing="0" width="100%" style=" background-color:#ffffff;">
                    <tbody><tr>
                        <td valign="middle" align="left" style="height:21px; width:23%">&nbsp;&nbsp;PASSENGER NAME</td>
                        <td valign="middle" align="left" style="height:21px; width:44%;"><strong><?php echo $pax; ?></strong></td>
                        <td valign="middle" align="left" style="height:21px; width:10%;"></td>
                        <td valign="middle" align="right" style="height:21px; width:23%;">&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;&nbsp;BOOKING REFERENCE</td>
                        <td valign="middle" align="left" style="height:21px;"><strong><?php echo $pnr; ?></strong></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                        <td valign="middle" align="left" style="height:21px;"></td></tr>
                    
                    <tr>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;&nbsp;E-TICKET NUMBER</td>
                        <td valign="middle" align="left" style="height:21px;"><strong><?php echo $ticket_no; ?></strong></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;&nbsp;ISSUED BY/DATE</td>
                        <td valign="middle" align="left" style="height:21px;"><strong><?php echo $sales_date; ?></strong></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="left" style="height:21px;"></td>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;</td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                        <td valign="middle" align="left" style="height:21px;"></td>
                    </tr>
                </tbody></table>
            </td>        
        </tr> 
        <tr class="BodyFont">
            <td colspan="2" valign="middle" style="background-color:#7E0644;height: 25px; width:100%" align="left">&nbsp;&nbsp;&nbsp;<strong>
                <span id="lblTravelHeaderKey" style="color:White; width:227px">TRAVEL INFORMATION</span></strong></td>
        </tr>

        <tr class="BodyFont">
            <td colspan="2">
                <table id="tblFlight" cellpadding="0" cellspacing="0" width="100%" style="background-color: #ffffff;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle">
                                <table id="tblFlight" 0="" width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:8pt;">
                                    <tbody>
                                        <tr style="font-weight:bold;; height:25px"><td align="left" style="width:13%;background-color:#b1b0b0;color:#FFFFFF;">&nbsp;&nbsp;&nbsp;FLIGHT</td><td align="left" style="width:16%;background-color:#b1b0b0;color:#FFFFFF;">DEPART/ARRIVE</td>
                                            <td align="left" style="width:22%;background-color:#b1b0b0;color:#FFFFFF;">AIRPORT/TERMINAL</td>
                                            <td align="left" style="width:16%;background-color:#b1b0b0;color:#FFFFFF;">CHECK-IN OPENS</td>
                                            <td align="left" style="width:12%;background-color:#b1b0b0;color:#FFFFFF;">CLASS</td>
                                            <td colspan="2" align="left" style="width:21%;background-color:#b1b0b0;color:#FFFFFF;">COUPON VALIDITY</td>
                                        </tr>
                                    <tr style="background-color:#e7ebf7; height:35px">
                                        <td align="left">&nbsp;&nbsp;&nbsp;<strong>W3 <?php echo $flt_no; ?></strong><br>&nbsp;&nbsp;&nbsp;CONFIRMED</td>
                                        <td align="left"><?php $date = date_create($travel_date);
echo date_format($date, 'j M y');
 ?><br><?php echo $sta; ?></td>
                                        <td align="left"><?php echo $origin; ?></td>
                                        <td align="left"><?php $date = date_create($travel_date);
echo date_format($date, 'j M y');
 ?><br>2Hrs before flight</td> <td align="left">ECONOMY<br>SEAT</td>
                                        <td align="left">NOT BEFORE<br>NOT AFTER</td><td align="left"><?php $date = date_create($travel_date);
echo date_format($date, 'j M y');
 ?><br><?php $date = date_create($travel_date);
echo date_format($date, 'j M y');
 ?></td>
                                    </tr>
                                        <tr style="height:35px">
                                            <td align="left" style="border-bottom: black 0.14mm solid;"><br></td>
                                                <td align="left"><?php $date = date_create($travel_date);
echo date_format($date, 'j M y');
 ?><br><?php echo $std; ?></td>
                                           <td align="left"><?php echo $destination; ?></td>
                                            <td align="left" style="border-bottom: black 0.14mm solid;" colspan="3">BAGGAGE<br><br>ALLOWANCE&nbsp;20KGS</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br></td>
                </tr>
        <tr class="BodyFont">
            <td colspan="2" valign="middle" align="left" style="background-color:#7E0644;height:25px; width:100%">&nbsp;&nbsp;&nbsp;&nbsp;            
                <strong><span id="CtrlETKT_ET_FareHeaderKey" style="display:inline-block;color:White;width:232px;">FARE AND PAYMENT DETAILS</span></strong>                        
            </td>
        </tr>                
        <tr class="BodyFont">
            <td colspan="2" style="height:203px; width:100%;" valign="top">
                <table cellpadding="0" cellspacing="0" width="100%" style=" background-color:#ffffff;">                                        
                    <tbody><tr>
                        <td valign="middle" align="left" style="height:10px; width:20%;"></td>
                        <td valign="middle" align="left" style="height:10px; width:27%;"></td>
                        <td valign="middle" align="left" style="height:10px; width:20%;">&nbsp;</td>
                        <td valign="middle" align="left" style="height:10px; width:33%"></td>
                    </tr>                
                    
                    <tr>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="left" rowspan="4" valign="top"></td>
                    </tr>                    
                  
                    <tr>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;&nbsp;&nbsp;&nbsp;<strong><span id="CtrlETKT_lblTotalKey">TOTAL</span></strong></td>
                        <td valign="middle" align="right" style="height:21px;">&nbsp;&nbsp;<strong><span id="CtrlETKT_lblTotalValue">NGN<?php echo $amount; ?></span></strong></td>
                        <td></td>
                    </tr>                    
                    <tr>
                        <td valign="middle" align="left" style="height:21px;">&nbsp;&nbsp;&nbsp;&nbsp;<span id="CtrlETKT_lblPayModeKey">PASSENGER</span></td>
                        <td valign="middle" align="right" style="height:21px;"><?php if ($category=="AD"){echo "ADULT";}elseif ($category=="CD"){echo "CHILD";}elseif ($category=="IT"){echo "INFANT";} ?></td>
                        <td></td>
                    </tr> 
                    <!--USDOT ABR begin-->
                    
                    <!--USDOT ABR end-->
                    <tr>                   
                    </tr><tr>
                        <td align="center" style="width:100%" colspan="4">   
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <!--DWLayoutTable-->
                                <tbody>
                                    <tr class="BodyFont">
                                        <td width="14" height="20">&nbsp;</td>
                                        <td width="356" valign="top" style="height: 20px"> FORM OF PAYMENT </td>
                                    <td width="243" align="right" valign="top"><span style="height:21px;">
                                      <?php echo $fop;?>
                                    </span></td>
                                    <td width="362">&nbsp;</td>
                                    </tr>
                                    <tr class="BodyFont">
                                        <td height="20" colspan="4" style="height: 20px"><br>                                        </td>
                                    </tr>
                                    <tr class="BodyFont">
                                        <td height="44" colspan="4" valign="top" style="height: 20px">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="background-color: #ffffff; height: 20px;">
                                              <!--DWLayoutTable-->
                                                <tbody>
                                                    <tr>
                                                        <td width="971" height="42" align="left" valign="middle" style="font-size:larger; height:20px; background-color:#dee7f7; color:#7E0644; padding-left:10px; padding-right:10px;">Copyright <img src="Copyright.JPG"> Arik Air 2017. All rights reserved.</td>
                                                    </tr>
                                                </tbody>
                                        </table></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>                    
                </tbody></table>
            </td>        
        </tr>        
    </tbody></table> 
    </form>
    

</body></html>