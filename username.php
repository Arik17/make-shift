<?php
session_start();
$length = 6;
$username=substr($data[1],0,4).substr($data[2],0,4);
$_SESSION[usern]=$username;

?>