<?php
//session_start();
//FOR TICKET NUMBER
$length = 1;
$randomString1 = strtoupper(substr(str_shuffle("abcdefghijkmnopqrstuvwxyz1234567890"), 0, $length));
$randomString2 = strtoupper(substr(str_shuffle("1234567890abcdefghijkmnopqrstuvwxyz"), 0, $length));
$randomString3 = strtoupper(substr(str_shuffle("abcdefghijkmnopqrstuvwxyz1234567890"), 0, $length));
$randomString4 = strtoupper(substr(str_shuffle("1234567890abcdefghijkmnopqrstuvwxyz"), 0, $length));
$randomString5 = strtoupper(substr(str_shuffle("abcdefghijkmnopqrstuvwxyz1234567890"), 0, $length));
$randomString6 = strtoupper(substr(str_shuffle("1234567890abcdefghijkmnopqrstuvwxyz"), 0, $length));


//$_SESSION[pnr] = $randomString1.createRandomPassword().$randomString2;
$pnr = strtoupper($randomString1.$randomString2.$randomString3.$randomString4.$randomString5.$randomString6);
//echo $_SESSION[pnr];




?>