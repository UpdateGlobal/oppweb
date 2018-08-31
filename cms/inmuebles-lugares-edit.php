<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
$cod_lugar  = $_REQUEST['cod_lugar'];
if (isset($_REQUEST['proceso'])) {
  $proceso = $_POST['proceso'];
} else {
  $proceso = "";
}
if($proceso == ""){
  $consultaLugares = "SELECT * FROM inmuebles_lugares WHERE cod_lugar='$cod_lugar'";
  $ejecutarLugares = mysqli_query($enlaces,$consultaLugares) or die('Consulta fallida: ' . mysqli_error($enlaces));
  $filaLug = mysqli_fetch_array($ejecutarLugares);
  $cod_lugar  = $filaLug['cod_lugar'];
  $lugar      = $filaLug['lugar'];
  $orden      = $filaLug['orden'];
  $estado     = $filaLug['estado'];
}

if($proceso=="Actualizar"){
  $cod_lugar  = $_POST['cod_lugar'];
  $lugar      = $_POST['lugar'];
  $slug       = $lugar;
  $slug           = preg_replace('~[^\pL\d]+~u', '-', $slug);
  $slug           = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  $slug           = preg_replace('~[^-\w]+~', '', $slug);
  $slug           = trim($slug, '-');
  $slug           = preg_replace('~-+~', '-', $slug);
  $slug           = strtolower($slug);
  if (empty($slug)){
      return 'n-a';
  }
  $orden          = $_POST['orden'];
  $estado         = $_POST['estado'];
  $actualizarLugares  = "UPDATE inmuebles_lugares SET cod_lugar='$cod_lugar', slug='$slug', lugar='$lugar', orden='$orden', estado='$estado' WHERE cod_lugar='$cod_lugar'";
  $resultadoActualizar = mysqli_query($enlaces,$actualizarLugares) or die('Consulta fallida: ' . mysqli_error($enlaces));
  
  header("Location:inmuebles-lugares.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <script type="text/javascript" src="assets/js/rutinas.js"></script>
    <script>
      function Validar(){
        if(document.fcms.lugar.value==""){
          alert("Debe escribir un nombre para el lugar");
          document.fcms.lugar.focus();
          return;
        }
        document.fcms.action = "inmuebles-lugares-edit.php";
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
        <?php $page="inmuebleslugares"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="card">
          <h4 class="card-title"><strong>Editar Lugar</strong></h4>
          <form class="fcms" name="fcms" method="post" action="" data-provide="validation" data-disable="false">
            <div class="card-body">
              <?php if(isset($mensaje)){ echo $mensaje; } else {}; ?>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="lugar">Lugar:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="lugar" type="text" id="lugar" value="<?php echo $lugar; ?>" required />
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
              <a href="inmuebles-lugares.php" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
              <button class="btn btn-bold btn-primary" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Lugar</button>
              <input type="hidden" name="proceso" />
              <input type="hidden" name="cod_lugar" value="<?php echo $cod_lugar; ?>" />
            </footer>

          </form>
        </div>
      </div><!--/.main-content -->
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>