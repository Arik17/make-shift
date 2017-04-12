<?php
//session_start();
//FOR TICKET NUMBER
$length = 9;
$randomString1 = substr(str_shuffle("4561290345678090"),0,1);
$randomString2 = substr(str_shuffle("1567929034029034"), 0, $length);
$randomString3 = substr(str_shuffle("4561790290345634"), 0, $length);
$randomString4 = substr(str_shuffle("2903129034567929030"), 0, $length);
$randomString5 = substr(str_shuffle("67459129034512456790"), 0, $length);
$randomString6 = substr(str_shuffle("87354129034567901632"), 0, $length);
$randomString7 = substr(str_shuffle("47596129034567907163"), 0, $length);
$randomString8 = substr(str_shuffle("846571201290345679047"), 0, $length);
$randomString9 = substr(str_shuffle("274856912903456790932"), 0, $length);

$tkt="7256".$randomString1.$randomString2.$randomString3.$randomString4.$randomString5.$randomString6.$randomString7.$randomString8.$randomString9;
//$tkt="7255".$randomString1;
//echo $tkt;	
/*

*/
?>

