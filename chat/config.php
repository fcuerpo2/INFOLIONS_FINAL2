<?php

if (session_id() === '') { session_start(); }

if(!isset($dbh)){
 date_default_timezone_set("UTC");
 $musername = "qzw186";
 $mpassword = "Qwerty1";
 $hostname  = "qzw186.formadin.com";
 $dbname    = "qzw186";
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
 /*Change The Credentials to connect to database.*/
 
 include("../chat/user_online.php");
}
?>

