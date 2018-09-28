<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <script src="assets/js/visitante-alert.js"></script>
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div>
    <?php $menu="inicio"; include("module/menu.php"); ?>
    <?php include("module/header.php"); ?>
    <!-- Main container -->
    <main>
      <header class="header bg-ui-general">
        <div class="header-info">
          <h1 class="header-title">
            <strong>Inicio</strong>
            <small></small>
          </h1>
        </div>
        <?php $page="contenidos"; include("module/menu-inicio.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        

        <div class="row">
          <div class="col-md-12">
            <div class="card card-bordered">
              <h4 class="card-title"><strong>Secci&oacute;n Contacto</strong></h4>
              <div class="card-body">
                <div class="row">
                  <?php
                    $consultarCon = "SELECT * FROM contenidos WHERE cod_contenido='4'";
                    $resultadoCon = mysqli_query($enlaces,$consultarCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    $filaCon = mysqli_fetch_array($resultadoCon);
                      $xCodigo      = $filaCon['cod_contenido'];
                      $xTitulo      = $filaCon['titulo_contenido'];
                      $xContenido   = $filaCon['contenido'];
                      $xEstado      = $filaCon['estado'];
                  ?>
                  <div class="col-12 col-lg-12">
                    <h4><?php echo $xTitulo; ?></h4>
                    <p><?php 
                        echo $xContenido;
                    ?></p>
                    <hr>
                    <p><strong>Estado: <?php if($xEstado=="1"){echo "[Activo]";}else{ echo "[Inactivo]"; } ?> </strong></p>
                  </div>
                </div>
                <?php
                  mysqli_free_result($resultadoCon);
                ?>
              </div>
              <div class="publisher bt-1 border-light">
                <a href="contenidos-edit.php?cod_contenido=<?php echo $xCodigo; ?>" class="btn btn-bold btn-primary"><i class="fa fa-refresh"></i> Editar Secci&oacute;n Contacto</a>
              </div>
            </div>
          </div>
        </div>

      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>