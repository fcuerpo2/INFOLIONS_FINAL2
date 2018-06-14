<?php 
if (session_id() === '') { session_start(); }
if(isset($_SESSION['user'])){
 $sqlm=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sqlm->execute(array($_SESSION['user']));
 if($sqlm->rowCount()!=0){
  $sql=$dbh->prepare("UPDATE chatters SET seen=NOW() WHERE name=?");
  $sql->execute(array($_SESSION['user']));
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($_SESSION['user']));
 }
}
/* Make sure the timezone on Database server and PHP server is same */
$sql=$dbh->prepare("SELECT * FROM chatters");
$sql->execute();
//$numusu=0;
while($r=$sql->fetch()){
// $curtime2=date("Y-m-d H:i:s",time());   
 $curtime=strtotime(date("Y-m-d H:i:s",strtotime('-25 seconds', time())));
 $curtime = $curtime + 7200;
// $_SESSION['UsuarioAborrar2'][$numusu]=$r['name']." ".strtotime($r['seen'])." ".$curtime." Diferencia: ".(strtotime($r['seen'])-$curtime)." | Hora Actual: ".$curtime2;
// $numusu++;
 if(strtotime($r['seen']) < $curtime){
  $kql=$dbh->prepare("DELETE FROM chatters WHERE name=?");
  $kql->execute(array($r['name']));
 }
}
?>
