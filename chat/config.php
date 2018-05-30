<?php
if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC");
 $musername = "remoto10";
 $mpassword = "!RotBacosoft!4";
 $hostname  = "localhost";
 $dbname    = "chatting";
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
 /*Change The Credentials to connect to database.*/
 include("../chat/user_online.php");
}
?>

