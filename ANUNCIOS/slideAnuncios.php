<?php
if (session_id() === "") { session_start(); }
$_SESSION['TodosAnuncios'] = array();
$_SESSION['TodosAnuncios'] = "";

    $consulta="SELECT * FROM publicidad INNER JOIN usuarios ON publicidad.idUsuario=usuarios.idUsuario order by publicidad.idAnuncio DESC LIMIT 5";

    conectarBD();

    if ($resultado= $conexion->query($consulta)) {
        $_SESSION['TodosAnuncios'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
    }
    desconectarBD();
//    echo "Muestro el Array";
//    echo "<pre>";
//    print_r($_SESSION['TodosAnuncios']);
//    echo "</pre>";
      
?>   
<script>
  $(document).ready(function(){
    $('#myCarousel').carousel({
      interval: 10000
    });
  });
</script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
<!--  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>    
  </ol>
-->
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/<?php echo $_SESSION['TodosAnuncios'][0]['imagen']; ?>" alt="<?php echo $_SESSION['TodosAnuncios'][0]['titulo']; ?>" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important; position:relative; padding: 10px; left:0px; right: 0px; color: #000;">
            <h3><?php echo $_SESSION['TodosAnuncios'][0]['titulo']; ?></h3>
            <p><?php echo $_SESSION['TodosAnuncios'][0]['descripcion']; ?></p>
        </div>        
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/<?php echo $_SESSION['TodosAnuncios'][1]['imagen']; ?>" alt="<?php echo $_SESSION['TodosAnuncios'][1]['titulo']; ?>" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important; position:relative; padding: 10px; left:0px; right: 0px; color: #000;">
            <h3><?php echo $_SESSION['TodosAnuncios'][1]['titulo']; ?></h3>
            <p><?php echo $_SESSION['TodosAnuncios'][1]['descripcion']; ?></p>
        </div>                
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/<?php echo $_SESSION['TodosAnuncios'][2]['imagen']; ?>" alt="<?php echo $_SESSION['TodosAnuncios'][2]['titulo']; ?>" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important; position:relative; padding: 10px; left:0px; right: 0px; color: #000;">
            <h3><?php echo $_SESSION['TodosAnuncios'][2]['titulo']; ?></h3>
            <p><?php echo $_SESSION['TodosAnuncios'][2]['descripcion']; ?></p>
        </div>                
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/<?php echo $_SESSION['TodosAnuncios'][3]['imagen']; ?>" alt="<?php echo $_SESSION['TodosAnuncios'][3]['titulo']; ?>" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important; position:relative; padding: 10px; left:0px; right: 0px; color: #000;">
            <h3><?php echo $_SESSION['TodosAnuncios'][3]['titulo']; ?></h3>
            <p><?php echo $_SESSION['TodosAnuncios'][3]['descripcion']; ?></p>
        </div>                
    </div>      
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/<?php echo $_SESSION['TodosAnuncios'][4]['imagen']; ?>" alt="<?php echo $_SESSION['TodosAnuncios'][4]['titulo']; ?>" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important; position:relative; padding: 10px; left:0px; right: 0px; color: #000;">
            <h3><?php echo $_SESSION['TodosAnuncios'][4]['titulo']; ?></h3>
            <p><?php echo $_SESSION['TodosAnuncios'][4]['descripcion']; ?></p>
        </div>                
    </div>            
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>