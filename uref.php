<?php
session_start();
//FOR unique row identifier
$length = 10;
$randomString = strtoupper(substr(str_shuffle("01234567901234890345679123456345679789"), 0, $length));
$uref = time().$_SESSION[user_transaction_id].$randomString;
$_SESSION[uref]=$uref;


?>