<?php
  if (session_id() == "") session_start(); 
  session_destroy();
  echo "Hasta Luego";
?>