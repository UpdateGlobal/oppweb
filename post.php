<?php include("cms/module/conexion.php"); ?>
<?php $cod_noticia = $_REQUEST['cod_noticia']; ?>
<!--  < ?php $slug = $_REQUEST['slug']; ?>
< ?php
    $consultaNoticias = "SELECT * FROM noticias WHERE slug='$slug'";
    $ejecutarNoticias = mysqli_query($enlaces,$consultaNoticias) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaNot = mysqli_fetch_array($ejecutarNoticias);
      $cod_noticia = $filaNot['cod_noticia'];
?> -->
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("modulos/head.php"); ?>
  <?php
    $consultarMet = 'SELECT * FROM metatags';
    $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaMet = mysqli_fetch_array($resultadoMet);
      $xTitulo_w  = $filaMet['titulo'];
  ?>
  <?php
    $consultaNoticias = "SELECT * FROM noticias WHERE cod_noticia='$cod_noticia'";
    $ejecutarNoticias = mysqli_query($enlaces,$consultaNoticias) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaNot = mysqli_fetch_array($ejecutarNoticias);
      $slug           = $filaNot['slug'];
      $titulo         = $filaNot['titulo'];
      $noticia        = $filaNot['noticia'];
      $imagen         = $filaNot['imagen'];
      $fecha          = $filaNot['fecha'];
      $autor          = $filaNot['autor'];
  ?>
  <!-- twitter card starts from here, if you don't need remove this section -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:url" content="<?php echo $xUrl; ?>/noticia/<?php echo $slug; ?>" />
  <meta name="twitter:title" content="<?php echo $titulo; ?>" /><!-- maximum 140 char -->
  <meta name="twitter:description" content="<?php 
        $noticiaM = strip_tags($noticia);
        $strCut = substr($noticiaM,0,140);
        $noticiaM = substr($strCut,0,strrpos($strCut, ' ')).'...';
        echo $noticiaM; ?>" /> <!-- maximum 140 char -->
  <meta name="twitter:image" content="cms/assets/img/noticias/<?php echo $imagen; ?>" /><!-- when you post this page url in twitter , this image will be shown -->

  <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
  <meta property="og:title" content="<?php echo $titulo; ?>" />
  <meta property="og:url" content="<?php echo $xUrl; ?>/noticia/<?php echo $slug; ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:site_name" content="<?php echo $titulo; ?>" />
  <meta property="og:description" content="<?php 
        $noticiaM = strip_tags($noticia);
        $strCut = substr($noticiaM,0,140);
        $noticiaM = substr($strCut,0,strrpos($strCut, ' ')).'...';
        echo $noticiaM; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="cms/assets/img/noticias/<?php echo $imagen; ?>" />
  <!-- facebook open graph ends from here -->
  <?php
    mysqli_free_result($ejecutarNoticias);
    mysqli_free_result($resultadoMet);
  ?>
</head>
<body>
  <?php include("modulos/nav.php"); ?>
  <div class="container-fluid" style="background: url(cms/assets/img/noticias/<?php echo $imagen; ?>); background-size: cover; margin-bottom: 50px;">
    <div class="row">
      <div class="col-md-12">
        <p class="branch_blog">Inicio > Blog > <?php echo $titulo; ?> </p>
      </div>
    </div>
  </div>
  <!--posted-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <?php include("modulos/categorias.php"); ?>
      </div>
      <div class="col-md-10">
        <!--conten_posted-->
        <!-- <img src="images/bitmap.png" class="img_post"> -->
        <p class="card-title"><?php echo $titulo; ?></p>
        <p class="mcard_p2">
          <?php
            $mydate = strtotime($fecha);
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
          ?>
          <?php echo $meses[date('n', $mydate)-1]; ?> <?php echo date('d', $mydate); ?> / 2018 - por <?php echo $autor; ?>
        </p>
        <div class="mcard_p">
          <?php echo $noticia; ?>
        </div>
        <hr>
        <a class="btn btnfin" href="blog.php">&lt; Volver</a>
        <!--conten_posted-->
      </div>
    </div>
  </div>
  <!--posted-->
  <!--footer-->
  <section style="background-color: #fff">
    <br><br><br><br><br><br><br><br>
  </section>
  <?php include("modulos/footer.php"); ?>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
</body>
</html>