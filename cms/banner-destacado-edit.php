<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
$cod_contenido  = $_REQUEST['cod_contenido'];
if (isset($_REQUEST['proceso'])) {
  $proceso  = $_POST['proceso'];
} else {
  $proceso  = "";
}
if($proceso==""){
  $consultaCon = "SELECT * FROM contenidos WHERE cod_contenido='$cod_contenido'";
  $ejecutarCon = mysqli_query($enlaces,$consultaCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
  $filaCon = mysqli_fetch_array($ejecutarCon);
  $cod_contenido    = $filaCon['cod_contenido'];
  $titulo_contenido = $filaCon['titulo_contenido'];
  $img_contenido    = $filaCon['img_contenido'];
  $contenido        = $filaCon['contenido'];
  $estado           = $filaCon['estado'];
  $enlace           = $filaCon['enlace'];
}

if($proceso == "Actualizar"){
  $cod_contenido    = $_POST['cod_contenido'];
  $titulo_contenido = mysqli_real_escape_string($enlaces, $_POST['titulo_contenido']);
  $img_contenido    = $_POST['img_contenido'];
  $contenido        = mysqli_real_escape_string($enlaces, $_POST['contenido']);
  $estado           = $_POST['estado'];
  $enlace           = $_POST['enlace'];

  $ActualizarCon = "UPDATE contenidos SET cod_contenido='$cod_contenido', titulo_contenido='$titulo_contenido', img_contenido='$img_contenido', contenido='$contenido', estado='$estado', enlace='$enlace' WHERE cod_contenido='$cod_contenido'";
  $resultadoActualizar = mysqli_query($enlaces,$ActualizarCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
  header("Location:banners.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <script type="text/javascript" src="assets/js/rutinas.js"></script>
    <script>
      function Validar(){
        if(document.fcms.img_contenido.value==""){
          alert("Debe subir una imagen");
          return; 
        }
        document.fcms.action = "banner-destacado-edit.php";
        document.fcms.proceso.value="Actualizar";
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
    <?php $menu="inicio"; include("module/menu.php"); ?>
    <?php include("module/header.php"); ?>
    <!-- Main container -->
    <main>
      <header class="header bg-ui-general">
        <div class="header-info">
          <h1 class="header-title">
            <strong>Banners</strong>
            <small></small>
          </h1>
        </div>
        <?php $page="banners"; include("module/menu-inicio.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="card">
          <h4 class="card-title"><strong>Editar Banners</strong></h4>
          <form class="fcms" name="fcms" method="post" action="" data-provide="validation" data-disable="false">
            <div class="card-body">

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label require" for="img_contenido">Imagen:</label><br>
                  <small>(734px x 435px)</small>
                </div>
                <div class="col-4 col-lg-8">
                  <?php if($xVisitante=="1"){ ?><p><?php echo $img_contenido; ?></p><?php } ?>
                  <input class="form-control" id="img_contenido" name="img_contenido" type="<?php if($xVisitante=="1"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $img_contenido; ?>" required>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="col-4 col-lg-2">
                  <?php if($xVisitante=="0"){ ?>
                  <button class="btn btn-info" type="button" name="boton2" onClick="javascript:Imagen('NOS');" /><i class="fa fa-save"></i> Examinar</button>
                  <?php } ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="titulo_contenido">Lugar:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="titulo_contenido" type="text" id="titulo_contenido" value="<?php echo $titulo_contenido; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="contenido">Lugar:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="contenido" type="text" id="contenido" value="<?php echo $contenido; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="enlace">Enlace:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="enlace" type="text" id="enlace" value="<?php echo $enlace; ?>" />
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
              <a href="banners.php" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
              <button class="btn btn-bold btn-primary" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Guardar Cambios</button>
              <input type="hidden" name="proceso">
              <input type="hidden" name="cod_contenido" value="<?php echo $cod_contenido; ?>">
            </footer>

          </form>
        </div>
      </div><!--/.main-content -->
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>