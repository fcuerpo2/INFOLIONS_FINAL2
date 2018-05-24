<?php

      include "../lib/lib1.php";
     $texto="<div class='row'>";
   $texto.="<div class='col-md-12'>";
      $texto.="<form class='form-signin' id='datos' action='./php/registrar.php' method='POST'>
      <img class='mb-4' src='./img/reservoir.png' alt='' width='72' height='72'>
      <h1 class='h3 mb-3 font-weight-normal'>Registro de usuario</h1>";
    $texto.="<table><tr><td>Nombre:</td><td><input type='text' name='nombre' class='form-control' value=''/></td></tr>";
    $texto.="<tr><td>Email:</td><td><input type='text' class='form-control' name='email' value=''/></td></tr>";
    $texto.="<tr><td>Password:</td><td><input type='password' class='form-control' name='password' value='*****'/></td></tr>";
    $texto.="<tr><td><input type='reset' class='btn btn-lg btn-secondary btn-block' value='Borrar'/></td><td><input type='button' onclick='registrar()' class='btn btn-lg btn-primary btn-block' value='Registrar'/></td></tr></table></form></div></div>";
    echo $texto;

?>
