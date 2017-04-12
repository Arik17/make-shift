<?php

//$seat_available=collection-held-mars_sales-additional_collection

//fetching the nseat and held seat value from the fares_pricing table
$hq=mysql_query("select * from fares_pricing where origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and transaction_id='$_SESSION[fares_transaction_id]'"); 
$rhq = mysql_fetch_assoc($hq);
//sales or collection booking
$sqld=mysql_query("select count(*) as id from collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]'");
$rd = mysql_fetch_assoc($sqld);
//for mars booking
$sqlms=mysql_query("select count(*) as id from mars_dumps where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]'");	
$rms = mysql_fetch_assoc($sqlms);
//for additional collection
$sqlac=mysql_query("select count(*) as id from additional_collection where travel_date='$_SESSION[tdate]' and origin='$_SESSION[origin]' and destination='$_SESSION[destination]' and ticket_class='$ticket_class' and flt_no='$_SESSION[flt_no]' and category='REROUTE'");	
$rac = mysql_fetch_assoc($sqlac);

$_SESSION[seat_available]=$rhq[nseat]-$rhq[hseat]-$rd[id]-$rms[id]-$rac[id]; //nseat is capacity,hseat is held,rd is sales,rms is mars , rac is reroute
//echo $_SESSION[seat_available];
//session_write_close();
?>