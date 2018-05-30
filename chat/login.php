<br/><br/>
<?php 
if (session_id() === '') { session_start(); }
include("../chat/config.php");
 $name=$_SESSION['usu']['Nombre']." ".$_SESSION['usu']['Apellidos'];
 $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sql->execute(array($name));
 if($sql->rowCount()!=0){
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($name));
  $_SESSION['user']=$name;
 }
//  echo $ermsg;
?>