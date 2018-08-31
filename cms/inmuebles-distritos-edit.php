<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
$cod_distrito  = $_REQUEST['cod_distrito'];
if (isset($_REQUEST['proceso'])) {
  $proceso = $_POST['proceso'];
} else {
  $proceso = "";
}
if($proceso == ""){
  $consultaDistrito = "SELECT * FROM inmuebles_distritos WHERE cod_distrito='$cod_distrito'";
  $ejecutarDistrito = mysqli_query($enlaces,$consultaDistrito) or die('Consulta fallida: ' . mysqli_error($enlaces));
  $filaDis = mysqli_fetch_array($ejecutarDistrito);
  $cod_distrito  = $filaDis['cod_distrito'];
  $cod_lugar  = $filaDis['cod_lugar'];
  $distrito   = $filaDis['distrito'];
  $orden      = $filaDis['orden'];
  $estado     = $filaDis['estado'];
}

if($proceso=="Actualizar"){
  $cod_distrito  = $_POST['cod_distrito'];
  $cod_lugar = $_POST['cod_lugar'];
  $distrito  = $_POST['distrito'];
  $slug      = $distrito;
  $slug      = preg_replace('~[^\pL\d]+~u', '-', $slug);
  $slug      = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  $slug      = preg_replace('~[^-\w]+~', '', $slug);
  $slug      = trim($slug, '-');
  $slug      = preg_replace('~-+~', '-', $slug);
  $slug      = strtolower($slug);
  if (empty($slug)){
      return 'n-a';
  }
  $orden     = $_POST['orden'];
  $estado    = $_POST['estado'];
  $actualizarDistrito  = "UPDATE inmuebles_distritos SET cod_distrito='$cod_distrito', cod_lugar='$cod_lugar', slug='$slug', distrito='$distrito', orden='$orden', estado='$estado' WHERE cod_distrito='$cod_distrito'";
  $resultadoActualizar = mysqli_query($enlaces,$actualizarDistrito) or die('Consulta fallida: ' . mysqli_error($enlaces));

  header("Location:inmuebles-distritos.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <script type="text/javascript" src="assets/js/rutinas.js"></script>
    <script>
      function Validar(){
        if(document.fcms.distrito.value==""){
          alert("Debe escribir un distrito");
          document.fcms.distrito.focus();
          return;
        }
        document.fcms.action = "inmuebles-distritos-edit.php";
        document.fcms.proceso.value = "Actualizar";
        document.fcms.submit();
      } 
      function Imagen(codigo){
        url = "agregar-foto.php?id=" + codigo;
        AbrirCentro(url,'Agregar', 475, 180, 'no', 'no');
      }
      function soloNumeros(e){ 
        var key = window.Event ? e.which : e.keyCode 
        return ((key >= 48 && key <= 57) || (key==8)) 
      }
    </script>
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
        <?php $page="inmueblesdistrito"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="card">
          <h4 class="card-title"><strong>Editar Distrito</strong></h4>
          <form class="fcms" name="fcms" method="post" action="" data-provide="validation" data-disable="false">
            <div class="card-body">
              <?php if(isset($mensaje)){ echo $mensaje; } else {}; ?>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="lugar">Lugar:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <select class="form-control" id="lugar" name="cod_lugar">
                    <?php
                      $consultaLug = "SELECT * FROM inmuebles_lugares WHERE cod_lugar='$cod_lugar'";
                      $resultadoLug = mysqli_query($enlaces, $consultaLug);
                      while($filaLug = mysqli_fetch_array($resultadoLug)){
                        $xCodluga = $filaLug['cod_lugar'];
                        $xLugar = utf8_encode($filaLug['lugar']);
                      ?>
                      <option value="<?php echo $xCodluga; ?>"><?php echo $xLugar; ?> (Actual)</option>
                      <?php } ?>
                      <?php
                        $consultaLug = "SELECT * FROM inmuebles_lugares WHERE cod_lugar!='$cod_lugar'";
                        $resultadoLug = mysqli_query($enlaces, $consultaLug);
                        while($filaLug = mysqli_fetch_array($resultadoLug)){
                          $xCodluga = $filaLug['cod_lugar'];
                          $xLugar = utf8_encode($filaLug['lugar']);
                      ?>
                      <option value="<?php echo $xCodluga; ?>"><?php echo $xLugar; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="distrito">Distrito:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="distrito" type="text" id="distrito" value="<?php echo $distrito; ?>" required />
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="orden">Orden:</label>
                </div>
                <div class="col-2 col-lg-1">
                  <input class="form-control" name="orden" type="text" id="orden" value="<?php echo $orden; ?>" onKeyPress="return soloNumeros(event)" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="estado">Estado:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input type="checkbox" name="estado" data-size="small" data-provide="switchery" value="1" <?php if($estado=="1"){echo "checked";} ?> />
                </div>
              </div>
            </div>

            <footer class="card-footer">
              <a href="inmuebles-distrito.php" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
              <button class="btn btn-bold btn-primary" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Distrito</button>
              <input type="hidden" name="proceso" />
              <input type="hidden" name="cod_distrito" value="<?php echo $cod_distrito; ?>" />
            </footer>

          </form>
        </div>
      </div><!--/.main-content -->
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>