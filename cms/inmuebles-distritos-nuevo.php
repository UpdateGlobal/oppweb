<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
$mensaje = "";
if (isset($_REQUEST['proceso'])){
  $proceso = $_POST['proceso'];
} else {
  $proceso = "";
}
if($proceso == "Registrar"){
  $cod_lugar      = $_POST['cod_lugar'];
  $distrito       = $_POST['distrito'];
  $slug           = $distrito;
  $slug           = preg_replace('~[^\pL\d]+~u', '-', $slug);
  $slug           = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  $slug           = preg_replace('~[^-\w]+~', '', $slug);
  $slug           = trim($slug, '-');
  $slug           = preg_replace('~-+~', '-', $slug);
  $slug           = strtolower($slug);
  if (empty($slug)){
      return 'n-a';
  }
  if(isset($_POST['orden'])){$orden = $_POST['orden'];}else{$orden = 0;}
  if(isset($_POST['estado'])){$estado = $_POST['estado'];}else{$estado = 0;}
  
  $insertarLugar = "INSERT INTO inmuebles_distritos(cod_lugar, slug, distrito, orden, estado)VALUE('$cod_lugar', '$slug', '$distrito', '$orden', '$estado')";
  $resultadoInsertar = mysqli_query($enlaces,$insertarLugar);
  $mensaje = "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          <strong>Nota:</strong> El distrito se registr&oacute; exitosamente. <a href='inmuebles-distritos.php'>Ir a Distritos</a>
        </div>";
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
          alert("Debes ingresar un distrito");
          document.fcms.distrito.focus();
          return;
        }
        document.fcms.action = "inmuebles-distritos-nuevo.php";
        document.fcms.proceso.value="Registrar";
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
        <?php $page="inmueblesdistritos"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="card">
          <h4 class="card-title"><strong>Nuevo Distritos</strong></h4>
          <form class="fcms" name="fcms" method="post" action="" data-provide="validation" data-disable="false">
            <div class="card-body">
              <?php if(isset($mensaje)){ echo $mensaje; } else {}; ?>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="lugar">Lugar:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <select class="form-control" id="lugar" name="cod_lugar">
                    <?php
                      $consultaLug = "SELECT * FROM inmuebles_lugares ORDER BY orden ASC";
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
                  <label class="col-form-label required" for="distrito">Distritos:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="distrito" type="text" id="distrito" required />
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="orden">Orden:</label>
                </div>
                <div class="col-2 col-lg-1">
                  <input class="form-control" name="orden" type="text" id="orden" onKeyPress="return soloNumeros(event)" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="estado">Estado:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input type="checkbox" name="estado" data-size="small" data-provide="switchery" value="1" checked>
                </div>
              </div>
            </div>

            <footer class="card-footer">
              <a href="inmuebles-distritos.php" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
              <button class="btn btn-bold btn-primary" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-chevron-circle-right"></i> Publicar Distrito</button>
              <input type="hidden" name="proceso">
            </footer>

          </form>
        </div>
      </div><!--/.main-content -->
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>