<?php
session_start();
$length = 4;

$randomString = strtoupper(substr(str_shuffle("01234567901234890345679123456345679789"), 0, $length));
$_SESSION[coder]=$randomString;


?>