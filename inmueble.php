<?php include("cms/module/conexion.php"); ?>
<?php $cod_inmueble = $_REQUEST['cod_inmueble']; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("modulos/head.php"); ?>
    <?php 
      $consultaInm        = "SELECT * FROM inmuebles WHERE cod_inmueble='$cod_inmueble'";
      $resultadoInm       = mysqli_query($enlaces, $consultaInm);
      $filaInm            = mysqli_fetch_array($resultadoInm);
        $cod_inmueble     = $filaInm['cod_inmueble'];
        $tipo             = $filaInm['tipo'];
        $cod_categoria    = $filaInm['cod_categoria'];
        $cod_lugar        = $filaInm['cod_lugar'];
        $cod_distrito     = $filaInm['cod_distrito'];
        $titulo           = $filaInm['titulo'];
        $imagen           = $filaInm['imagen'];
        $precio           = substr(utf8_decode($filaInm['precio']),0,20);
        $banos            = $filaInm['banos'];
        $area             = $filaInm['area'];
        $cuartos          = $filaInm['cuartos'];
        $descripcion      = $filaInm['descripcion'];
        $comodidades      = $filaInm['comodidades'];
        $ubicacion        = $filaInm['ubicacion'];
        $fecha_ing        = $filaInm['fecha_ing'];
        $parking          = $filaInm['parking'];
        $orden            = $filaInm['orden'];
        $estado           = $filaInm['estado'];
    ?>
    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $titulo; ?>" /> <!-- maximum 140 char -->
    <meta name="twitter:description" content="<?php 
        $descripcionM = strip_tags($descripcion);
        $strCut = substr($descripcionM,0,140);
        $descripcionM = substr($strCut,0,strrpos($strCut, ' ')).'...';
        echo $descripcionM; ?>" /> <!-- maximum 140 char -->
    <meta name="twitter:image" content="cms/assets/img/inmuebles/<?php echo $imagen; ?>" /> <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="<?php echo $titulo; ?>" />
    <meta property="og:description" content="<?php 
        $descripcionM = strip_tags($descripcion);
        $strCut = substr($descripcionM,0,140);
        $descripcionM = substr($strCut,0,strrpos($strCut, ' ')).'...';
        echo $descripcionM; ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="cms/assets/img/inmuebles/<?php echo $imagen; ?>" /> <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends from here -->

  	<style type="text/css">
      /*   .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
      display: block !important;
      }*/
      .owl-theme .owl-nav.disabled+.owl-dots {
        margin-top: 10px !important;
        display: block !important;
      }
      .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
        background: #00519c;
      }
      .owl-theme .owl-dots .owl-dot span {
        width: 15px;
        height: 15px;
        margin: 5px 7px;
        background: #D6D6D6;
        display: block;
        -webkit-backface-visibility: visible;
        transition: opacity .2s ease;
        border-radius: 30px;
      }
    </style>
</head>
<body>
  <?php include('modulos/nav.php'); ?>
  <!--finder-->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
          $consultaCat = "SELECT * FROM inmuebles_categorias WHERE cod_categoria=$cod_categoria AND estado='1'";
          $resultaCat = mysqli_query($enlaces, $consultaCat);
          $filaCat = mysqli_fetch_array($resultaCat);
            $xnomCat = $filaCat['categoria'];
        
          $consultaLug = "SELECT * FROM inmuebles_lugares WHERE estado='1'";
          $resultaLug = mysqli_query($enlaces, $consultaLug);
          $filaLug = mysqli_fetch_array($resultaLug);
            $xnomLug = $filaLug['lugar'];

          $consultaDis = "SELECT * FROM inmuebles_distritos WHERE estado='1' AND cod_distrito='$cod_distrito'";
          $resulDis = mysqli_query($enlaces, $consultaDis);
          $dis=mysqli_fetch_array($resulDis);
            $xnomDis = $dis['distrito'];
        ?>
        <p class="branch">Inicio > <?php echo $xnomCat; ?> > <?php echo $xnomLug; ?> > <?php echo $xnomDis; ?> > <?php echo $titulo; ?></p>
      </div>
    </div>
  </div>
  <!-- end finder-->
  <!--inmueble-->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12">
        <div class="owl-for owl-carousel owl-theme">
          <div class="item"><img src="cms/assets/img/inmuebles/<?php echo $imagen; ?>" class="owl_img" /></div>
          <?php
            $galeria="SELECT * FROM inmuebles_fotos WHERE cod_inmueble='$cod_inmueble'";
            $ejecutag=mysqli_query($enlaces, $galeria);
            while($filagp=mysqli_fetch_array($ejecutag)){
              $xImgG = $filagp['imagen'];
          ?>
          <div class="item"><img src="cms/assets/img/inmuebles/fotos/<?php echo $xImgG; ?>" class="owl_img" /></div>
          <?php
            }
          ?>
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        <h4 class="title_inm mt-3"><?php echo $titulo; ?></h4>
        <p class="date_inm"> </p>
        <hr class="hr">
        <small class="serch">Caracter&iacute;sticas</small>
        <ul class="card_list2">
          <li>Precio:<span class="span">$<?php echo $precio; ?></span></li>
          <li>Tipo:<span class="span"><?php echo $xnomCat; ?></span></li>
          <li>Ubicaci&oacute;n:<span class="span"><?php echo $xnomDis; ?></span></li>
          <li>Area:<span class="span"><?php echo $area; ?></span></li>
          <li>Baños:<span class="span"><?php echo $banos; ?></span></li>
          <li>Cuartos:<span class="span"><?php echo $cuartos; ?></span></li>
        </ul>
        <a href="contacto.php" class="btn btn-default">Cotizar</a>
      </div>
    </div>
  </div>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title_inm">Descripci&oacute;n</h3>
        <hr class="hr">
        <?php echo $descripcion; ?>
        <br>
        <h3 class="title_inm">Comodidades</h3>
        <hr class="hr">
        <ul class="card_list3">
          <li><i class="fas fa-check"></i> Parque Infantil</li>
          <li><i class="fas fa-check"></i> Canchas Deportivas</li>
          <li><i class="fas fa-check"></i> Sala de cine</li>
          <li><i class="fas fa-check"></i> Sala de Reuniones</li>
          <li><i class="fas fa-check"></i> Mesa de Billar</li>
        </ul>
        <br><br>
        <h3 class="title_inm">Ubicaci&oacute;n</h3>
        <hr class="hr">
        <?php echo $ubicacion; ?>
      </div>
    </div>
  </div>
  <!--inmueble-->
  <!--footer-->
  <section style="background-color: #fff">
    <br><br><br><br><br><br><br><br>
  </section>
  <?php include("modulos/footer.php"); ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.owl-for').owlCarousel({
        loop:true,
        margin:0,
        autoplay:false,
        autoplayTimeout:2000,
        nav:false,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:1
          },
          1000:{
            items:1
          }
        }
      })
    });
  </script>
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