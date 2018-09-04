<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
  if (isset($_REQUEST['eliminar'])) {
    $eliminar = $_POST['eliminar'];
  } else {
    $eliminar = "";
  }
  if ($eliminar == "true") {
    $sqlEliminar = "SELECT cod_inmueble FROM inmuebles ORDER BY cod_inmueble";
    $sqlResultado = mysqli_query($enlaces, $sqlEliminar);
    $x = 0;
    while($filaElim = mysqli_fetch_array($sqlResultado)){
      $id_inmuebles = $filaElim["cod_inmueble"];
      if ($_REQUEST["chk" . $id_inmuebles] == "on"){
        $x++;
        if ($x == 1) {
            $sql = "DELETE FROM inmuebles WHERE cod_inmueble=$id_inmuebles";
          } else {
            $sql = $sql . " OR cod_inmueble=$id_inmuebles";
          }
      }
    }
    mysqli_free_result($sqlResultado);
    if ($x > 0) { 
      $rs = mysqli_query($enlaces, $sql);
    }
    header ("Location: inmuebles.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <style>
      @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {
        td:nth-of-type(1):before { content: "Categoria"; }
        td:nth-of-type(2):before { content: "Lugares"; }
        td:nth-of-type(3):before { content: "Distritos"; }
        td:nth-of-type(4):before { content: "Imagen"; }
        td:nth-of-type(5):before { content: "Secciones"; }
        td:nth-of-type(6):before { content: "Orden"; }
        td:nth-of-type(7):before { content: "Estado"; }
        td:nth-of-type(8):before { content: ""; }
        td:nth-of-type(9):before { content: ""; }
        td:nth-of-type(10):before { content: ""; }
      }
    </style>
    <script>
      function Procedimiento(proceso,seccion){
        document.fcms.proceso.value = "";
        estado = 0;
        for (i = 0; i < document.fcms.length; i++)
            
        if(document.fcms.elements[i].name.substring(0,3) == "chk"){
          if(document.fcms.elements[i].checked == true){
            estado = 1
          }
        }
        if (estado == 0) {
          if (seccion == "N"){
            alert("Debes de seleccionar un categoria.")
          }
          return
        }
        procedimiento = "document.fcms." + proceso + ".value = true"
        eval(procedimiento)
        document.fcms.submit()  
      }
    </script>
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
        <?php $page="inmuebles"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-bordered">
              <h4 class="card-title"><strong>Lista de inmuebles</strong></h4>
              <div class="card-body">
                <a class="btn btn-info" href="<?php if($xVisitante=="0"){ ?>inmuebles-nuevo.php<?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-plus"></i> A&ntilde;adir nuevo</a>
                <hr>
                <form name="fcms" method="post" action="">
                  <table class="table" data-provide="datatables">
                    <thead>
                      <tr>
                        <th width="10%" scope="col">Categor&iacute;a</th>
                        <th width="10%" scope="col">Lugares</th>
                        <th width="10%" scope="col">Inmuebles</th>
                        <th width="25%" scope="col">Imagen</th>
                        <th width="15%" scope="col">Secciones</th>
                        <th width="10%" scope="col">Orden
                          <input type="hidden" name="proceso">
                          <input type="hidden" name="eliminar" value="false">
                        </th>
                        <th width="5%" scope="col">Estado</th>
                        <th width="5%" scope="col">&nbsp;</th>
                        <th width="5%" scope="col">&nbsp;</th>
                        <th width="5%" scope="col"><a href="javascript:Procedimiento('eliminar','N');"><img src="assets/img/borrar.png" width="18" height="25" alt="Borrar"></a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito ORDER BY orden ASC";
                        $resultadoInm = mysqli_query($enlaces, $consultarInm);
                        while($filaInm = mysqli_fetch_array($resultadoInm)){
                          $xCodigo      = $filaInm['cod_inmueble'];
                          $xCategoria   = $filaInm['categoria'];
                          $xLugar       = $filaInm['lugar'];
                          $xInmuebles   = $filaInm['titulo'];
                          $xImagen      = $filaInm['imagen'];
                          $xAlquiler    = $filaInm['alquiler'];
                          $xTipo        = $filaInm['tipo'];
                          $xVenta       = $filaInm['venta'];
                          $xOrden       = $filaInm['orden'];
                          $xEstado      = $filaInm['estado'];
                      ?>
                      <tr>
                        <td><?php echo $xCategoria; ?></td>
                        <td><?php echo $xLugar; ?></td>
                        <td><?php echo $xInmuebles; ?></td>
                        <td><img class="d-block b-1 border-light hover-shadow-2 p-1 img-admin" src="assets/img/inmuebles/<?php echo $xImagen; ?>" /></td>
                        <td>
                          <?php if($xAlquiler=='1'){echo "[Alquiler]<br>";}else{} ?>
                          <?php if($xTipo=='1'){echo "[Proyecto]<br>";}else{} ?>
                          <?php if($xVenta=='1'){echo "[Venta]";}else{} ?>
                        </td>
                        <td><?php echo $xOrden; ?></td>
                        <td><strong>
                          <?php if($xEstado=="1"){ echo "[Activo]"; }else{ echo "[Inactivo]"; } ?>
                          </strong></td>
                        <td><a class="boton-eliminar <?php if($xVisitante=="1"){ ?>boton-eliminar-bloqueado<?php } ?>" href="<?php if($xVisitante=="0"){ ?>inmuebles-delete.php?cod_inmueble=<?php echo $xCodigo; ?><?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-trash"></i></a></td>
                        <td><a class="boton-editar" href="inmuebles-edit.php?cod_inmueble=<?php echo $xCodigo; ?>"><i class="fa fa-pencil-square"></i></a></td>
                        <td>
                          <?php if($xVisitante=="0"){ ?>
                          <div class="hidden">
                            <label class="custom-control custom-control-lg custom-checkbox" for="chkbx-<?php echo $xCodigo; ?>">
                              <input type="checkbox" class="custom-control-input" id="chkbx-<?php echo $xCodigo; ?>" name="chk<?php echo $xCodigo; ?>" />
                              <span class="custom-control-indicator"></span>
                            </label>
                          </div>
                          <?php } ?>
                        </td>
                      </tr>
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