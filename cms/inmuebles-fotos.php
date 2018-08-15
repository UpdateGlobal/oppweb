<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <style>
      @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {
        td:nth-of-type(1):before { content: "Lugar"; }
        td:nth-of-type(2):before { content: "Distrito"; }
        td:nth-of-type(3):before { content: "Inmueble"; }
        td:nth-of-type(4):before { content: "Imagen"; }
        td:nth-of-type(5):before { content: ""; }
      }
    </style>
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
    <?php $menu="inmuebles"; include("module/menu.php"); ?>
    <?php include("module/header.php"); ?>
    <!-- Main container -->
    <main>
      <header class="header bg-ui-general">
        <div class="header-info">
          <h1 class="header-title">
            <strong>Inmuebles</strong>
            <small></small>
          </h1>
        </div>
        <?php $page="inmueblesfotos"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-bordered">
              <h4 class="card-title"><strong>Lista de Inmuebles con Fotos</strong></h4>
              <div class="card-body">
                <form name="fcms" method="post" action="">
                  <table class="table">
                    <thead>
                      <tr>
                        <th width="20%" scope="col">Categoria</th>
                        <th width="20%" scope="col">Lugar</th>
                        <th width="20%" scope="col">Inmueble</th>
                        <th width="35%" scope="col">Imagen
                          <input type="hidden" name="proceso">
                          <input type="hidden" name="eliminar" value="false">
                        </th>
                        <th width="5%" scope="col">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar ORDER BY orden ASC";
                        $resultadoInm = mysqli_query($enlaces, $consultarInm);
                        while($filaInm = mysqli_fetch_array($resultadoInm)){
                          $xCodigo      = $filaInm['cod_inmueble'];
                          $xCategoria   = $filaInm['categoria'];
                          $xLugar       = $filaInm['lugar'];
                          $xTitulo      = $filaInm['titulo'];
                          $xImagen      = $filaInm['imagen'];
                          //Número de fotos
                          $consultaFoto = "SELECT * FROM inmuebles_fotos WHERE cod_inmueble=$xCodigo";
                          $resultadoFoto = mysqli_query($enlaces,$consultaFoto);
                          $numfotos = mysqli_num_rows($resultadoFoto);
                      ?>
                      <?php if($xImagen!=""){ ?>
                      <tr>
                        <td><?php echo $xCategoria; ?></td>
                        <td><?php echo $xLugar; ?></td>
                        <td><?php echo $xTitulo; ?><br><i><?php echo $numfotos; ?> Fotos</i></td>
                        <td><img class="d-block b-1 border-light hover-shadow-2 p-1 img-admin" src="assets/img/inmuebles/<?php echo $xImagen; ?>" /></td>
                        <td><a class="boton-nuevo" href="<?php if($xVisitante=="0"){ ?>inmuebles-fotos-nuevo.php?cod_inmueble=<?php echo $xCodigo; ?>&titulo=<?php echo $xTitulo; ?><?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-search"></i></a></td>
                      </tr>
                      <?php }else{ ?><?php } ?>
                      <?php
                        }
                        mysqli_free_result($resultadoInm);
                      ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>