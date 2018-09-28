<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php
$mensaje = "";
$cod_categoria = "";
$cod_lugar = "";
$cod_distrito = "";
$cod_inmueble = $_REQUEST['cod_inmueble'];

if (isset($_REQUEST['proceso'])){
  $proceso = $_POST['proceso'];
} else {
  $proceso = "";
}

if($proceso == ""){
  $consultaInm = "SELECT * FROM inmuebles WHERE cod_inmueble='$cod_inmueble'";
  $resultadoInm = mysqli_query($enlaces, $consultaInm);
  $filaInm = mysqli_fetch_array($resultadoInm);
    $cod_inmueble       = $filaInm['cod_inmueble'];
    $tipo               = $filaInm['tipo'];
    $cod_categoria      = $filaInm['cod_categoria'];
    $cod_lugar          = $filaInm['cod_lugar'];
    $cod_distrito       = $filaInm['cod_distrito'];
    $alquiler           = $filaInm['alquiler'];
    $ventas             = $filaInm['venta'];
    $titulo             = $filaInm['titulo'];
    $imagen             = $filaInm['imagen'];
    $slugitem           = $imagen;
    $slugitem           = preg_replace('~[^\pL\d]+~u', '-', $slugitem);
    $slugitem           = iconv('utf-8', 'us-ascii//TRANSLIT', $slugitem);
    $slugitem           = preg_replace('~[^-\w]+~', '', $slugitem);
    $slugitem           = trim($slugitem, '-');
    $slugitem           = preg_replace('~-+~', '.', $slugitem);
    $imagen             = strtolower($slugitem);
    if (empty($imagen)){
        return 'n-a';
    }
    $precio             = $filaInm['precio'];
    $hasta_precio       = $filaInm['hasta_precio'];
    $banos              = $filaInm['banos'];
    $banos_medios       = $filaInm['banos_medios'];
    $area               = $filaInm['area'];
    $area_hasta         = $filaInm['area_hasta'];
    $area_techada       = $filaInm['area_techada'];
    $cuartos            = $filaInm['cuartos'];
    $descripcion        = $filaInm['descripcion'];
    $comodidades        = $filaInm['comodidades'];
    $ubicacion          = htmlspecialchars($filaInm['ubicacion']);
    $fecha_ing          = $filaInm['fecha_ing'];
    $parking            = $filaInm['parking'];
    $orden              = $filaInm['orden'];
    $estado             = $filaInm['estado'];
}

if($proceso == "Filtrar"){
  $cod_inmueble       = $_POST['cod_inmueble'];
  if(isset($_POST['tipo'])){$tipo = $_POST['tipo'];}else{$tipo = 0;}
  $cod_categoria      = $_POST['cod_categoria'];
  $cod_lugar          = $_POST['cod_lugar'];
  $cod_distrito       = $_POST['cod_distrito'];
  if(isset($_POST['alquiler'])){$alquiler = $_POST['alquiler'];}else{$alquiler = 0;}
  if(isset($_POST['venta'])){$ventas = $_POST['venta'];}else{$ventas = 0;}
  $titulo             = $_POST['titulo'];
  $slug           = $titulo;
  $slug           = preg_replace('~[^\pL\d]+~u', '-', $slug);
  $slug           = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  $slug           = preg_replace('~[^-\w]+~', '', $slug);
  $slug           = trim($slug, '-');
  $slug           = preg_replace('~-+~', '-', $slug);
  $slug           = strtolower($slug);
  if (empty($slug)){
      return 'n-a';
  }
  $imagen             = $_POST['imagen'];
  $precio             = $_POST['precio'];
  $hasta_precio       = $_POST['hasta_precio'];
  $banos              = $_POST['banos'];
  $banos_medios       = $_POST['banos_medios'];
  $area               = $_POST['area'];
  $area_hasta         = $_POST['area_hasta'];
  $area_techada       = $_POST['area_techada'];
  $cuartos            = $_POST['cuartos'];
  $descripcion        = $_POST['descripcion'];
  $comodidades        = $_POST['comodidades'];
  $ubicacion          = $_POST['ubicacion'];
  $fecha_ing          = $_POST['fecha_ing'];
  if(isset($_POST['parking'])){$parking = $_POST['parking'];}else{$parking = 0;}
  if(isset($_POST['orden'])){$orden = $_POST['orden'];}else{$orden = 0;}
  if(isset($_POST['estado'])){$estado = $_POST['estado'];}else{$estado = 0;}
}

if($proceso == "Actualizar"){
  $cod_inmueble       = $_POST['cod_inmueble'];
  if(isset($_POST['tipo'])){$tipo = $_POST['tipo'];}else{$tipo = 0;}
  $cod_categoria      = $_POST['cod_categoria'];
  $cod_lugar          = $_POST['cod_lugar'];
  $cod_distrito       = $_POST['cod_distrito'];
  if(isset($_POST['alquiler'])){$alquiler = $_POST['alquiler'];}else{$alquiler = 0;}
  if(isset($_POST['venta'])){$ventas = $_POST['venta'];}else{$ventas = 0;}
  $titulo             = $_POST['titulo'];
  $slug           = $titulo;
  $slug           = preg_replace('~[^\pL\d]+~u', '-', $slug);
  $slug           = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  $slug           = preg_replace('~[^-\w]+~', '', $slug);
  $slug           = trim($slug, '-');
  $slug           = preg_replace('~-+~', '-', $slug);
  $slug           = strtolower($slug);
  if (empty($slug)){
      return 'n-a';
  }
  $imagen             = $_POST['imagen'];
  $precio             = $_POST['precio'];
  $hasta_precio       = $_POST['hasta_precio'];
  $banos              = $_POST['banos'];
  $banos_medios       = $_POST['banos_medios'];
  $area               = $_POST['area'];
  $area_hasta         = $_POST['area_hasta'];
  $area_techada       = $_POST['area_techada'];
  $cuartos            = $_POST['cuartos'];
  $descripcion        = $_POST['descripcion'];
  $comodidades        = $_POST['comodidades'];
  $ubicacion          = $_POST['ubicacion'];
  $fecha_ing          = $_POST['fecha_ing'];
  if(isset($_POST['parking'])){$parking = $_POST['parking'];}else{$parking = 0;}
  if(isset($_POST['orden'])){$orden = $_POST['orden'];}else{$orden = 0;}
  if(isset($_POST['estado'])){$estado = $_POST['estado'];}else{$estado = 0;}
  
  $actualizarInmuebles = "UPDATE inmuebles SET cod_inmueble='$cod_inmueble', tipo='$tipo', cod_categoria='$cod_categoria', cod_distrito='$cod_distrito', cod_lugar='$cod_lugar', alquiler='$alquiler', venta='$ventas', slug='$slug', titulo='$titulo', imagen='$imagen', precio='$precio', hasta_precio='$hasta_precio', banos='$banos', banos_medios='$banos_medios', area='$area', area_hasta='$area_hasta', area_techada='$area_techada', cuartos='$cuartos', descripcion='$descripcion', comodidades='$comodidades', ubicacion='$ubicacion', parking='$parking', fecha_ing='$fecha_ing', orden='$orden', estado='$estado' WHERE cod_inmueble='$cod_inmueble'";
  $resultadoActualizar = mysqli_query($enlaces, $actualizarInmuebles);
  header("Location:inmuebles.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("module/head.php"); ?>
    <script type="text/javascript" src="assets/js/rutinas.js"></script>
    <script>
      function Validar(){
        if(document.fcms.cod_categoria.value=="default"){
          alert("Elegir una categoría");
          return;
        }
        if(document.fcms.cod_lugar.value=="default"){
          alert("Debe especificar un lugar");
          return;
        }
        if(document.fcms.cod_distrito.value=="default"){
          alert("Debe especificar un distrito");
          return;
        }
        if(document.fcms.titulo.value==""){
          alert("Debe escribir un título");
          document.fcms.titulo.focus();
          return;
        }
        if(document.fcms.imagen.value==""){
          alert("Debe subir una imagen");
          document.fcms.imagen.focus();
          return;
        }
        if(document.fcms.area.value==""){
          alert("Debe especificar el tamaño del área (desde).");
          document.fcms.area.focus();
          return;
        }
        if(document.fcms.hasta_area.value==""){
          alert("Debe especificar el tamaño del área (hasta).");
          document.fcms.hasta_area.focus();
          return;
        }
        document.fcms.action = "inmuebles-edit.php";
        document.fcms.proceso.value = "Actualizar";
        document.fcms.submit();
      }
      function Filtrar(){
        document.fcms.action = "inmuebles-edit.php";
        document.fcms.proceso.value = "Filtrar";
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
        <?php $page="inmuebles"; include("module/menu-inmuebles.php"); ?>
      </header><!--/.header -->
      <div class="main-content">
        <div class="card">
          <h4 class="card-title"><strong>Nuevo Inmueble</strong></h4>
          <form class="fcms" name="fcms" method="post" action="" data-provide="validation" data-disable="false">
            <div class="card-body">
              <?php if(isset($mensaje)){ echo $mensaje; } else {}; ?>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="cod_categoria">Categor&iacute;as:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <select class="form-control" name="cod_categoria" id="cod_categoria">
                    <?php 
                      if($cod_categoria == ""){
                        $consultaCat = "SELECT * FROM inmuebles_categorias WHERE estado='1'";
                        $resultaCat = mysqli_query($enlaces, $consultaCat);
                        while($filaCat = mysqli_fetch_array($resultaCat)){
                          $xcodCat = $filaCat['cod_categoria'];
                          $xnomCat = $filaCat['categoria'];
                          echo '<option value='.$xcodCat.'>'.$xnomCat.'</option>';
                        }
                      }else{
                        $consultaCat = "SELECT * FROM inmuebles_categorias WHERE cod_categoria='$cod_categoria'";
                        $resultaCat = mysqli_query($enlaces, $consultaCat);
                        while($filaCat = mysqli_fetch_array($resultaCat)){
                          $xcodCat = $filaCat['cod_categoria'];
                          $xnomCat = $filaCat['categoria'];
                          echo '<option value='.$xcodCat.' selected="selected">'.$xnomCat.'</option>';
                        }
                        $consultaCat = "SELECT * FROM inmuebles_categorias WHERE cod_categoria!='$cod_categoria'";
                        $resultaCat = mysqli_query($enlaces, $consultaCat);
                        while($filaCat = mysqli_fetch_array($resultaCat)){
                          $xcodCat = $filaCat['cod_categoria'];
                          $xnomCat = $filaCat['categoria'];
                          echo '<option value='.$xcodCat.'>'.$xnomCat.'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="cod_lugar">Lugares:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <select class="form-control" name="cod_lugar" id="cod_lugar" onChange="Filtrar();">
                    <option value="default">- Seleccione un Lugar -</option>
                    <?php 
                      if($cod_lugar == ""){
                        $consultaLug = "SELECT * FROM inmuebles_lugares WHERE estado='1'";
                        $resultaLug = mysqli_query($enlaces, $consultaLug);
                        while($filaLug = mysqli_fetch_array($resultaLug)){
                          $xcodLug = $filaLug['cod_lugar'];
                          $xnomLug = $filaLug['lugar'];
                          echo '<option value='.$xcodLug.'>'.$xnomLug.'</option>';
                        }
                      }else{
                        $consultaLug = "SELECT * FROM inmuebles_lugares WHERE cod_lugar='$cod_lugar'";
                        $resultaLug = mysqli_query($enlaces, $consultaLug);
                        while($filaLug = mysqli_fetch_array($resultaLug)){
                          $xcodLug = $filaLug['cod_lugar'];
                          $xnomLug = $filaLug['lugar'];
                          echo '<option value='.$xcodLug.' selected="selected">'.$xnomLug.'</option>';
                        }
                        $consultaLug = "SELECT * FROM inmuebles_lugares WHERE cod_lugar!='$cod_lugar'";
                        $resultaLug = mysqli_query($enlaces, $consultaLug);
                        while($filaLug = mysqli_fetch_array($resultaLug)){
                          $xcodLug = $filaLug['cod_lugar'];
                          $xnomLug = $filaLug['lugar'];
                          echo '<option value='.$xcodLug.'>'.$xnomLug.'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="cod_distrito">Distrito:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <select class="form-control" name="cod_distrito" id="cod_distrito" required>
                    <option value="default">- Sin Distrito -</option>
                    <?php 
                      if($cod_lugar==""){
                        echo '<option value="default">- Especifique un Lugar para ver distritos -</option>';
                      }else{
                        if(($cod_lugar=="")or($cod_lugar=="0")){
                          $consultaDis = "SELECT * FROM inmuebles_distritos WHERE estado='1' AND cod_distrito='$cod_distrito'";
                          $resulDis = mysqli_query($enlaces, $consultaDis);
                          while($dis=mysqli_fetch_array($resulDis)){
                            $xcodDis = $dis['cod_distrito'];
                            $xnomDis = $dis['distrito'];
                            echo '<option value='.$xcodDis.'>'.$xnomDis.'</option>';
                          }
                        }else{
                          $consultaDis = "SELECT * FROM inmuebles_distritos WHERE estado='1' AND cod_lugar='$cod_lugar' AND cod_distrito='$cod_distrito'";
                          $resulDis = mysqli_query($enlaces, $consultaDis);
                          while($dis=mysqli_fetch_array($resulDis)){
                            $xcodDis = $dis['cod_distrito'];
                            $xnomDis = $dis['distrito'];
                            echo '<option value='.$xcodDis.' selected="selected">'.$xnomDis.'</option>';
                          }

                          $consultaDis = "SELECT * FROM inmuebles_distritos WHERE estado='1' AND cod_lugar='$cod_lugar' AND cod_distrito!='$cod_distrito'";
                          $resulDis = mysqli_query($enlaces, $consultaDis);
                          while($dis=mysqli_fetch_array($resulDis)){
                            $xcodDis = $dis['cod_distrito'];
                            $xnomDis = $dis['distrito'];
                            echo '<option value='.$xcodDis.'>'.$xnomDis.'</option>';
                          }
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="titulo">Nombre de Inmueble:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" id="titulo" name="titulo" type="text" value="<?php echo $titulo; ?>" required />
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="descripcion">Descripci&oacute;n:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <textarea class="form-control" name="descripcion" id="descripcion" data-provide="summernote" data-min-height="150"><?php echo $descripcion; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="imagen">Imagen:</label><br>
                  <small>(1240px x 940px)</small>
                </div>
                <div class="col-4 col-lg-8">
                  <input class="form-control" id="imagen" name="imagen" type="text" value="<?php echo $imagen; ?>" required />
                  <div class="invalid-feedback"></div>
                </div>
                <div class="col-4 col-lg-2">
                  <button class="btn btn-bold btn-info" type="button" name="boton2" onClick="javascript:Imagen('IM');" /><i class="fa fa-save"></i> Examinar</button>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="tipo">Secci&oacute;n (?):</label>
                </div>
                <div class="col-8 col-lg-10">
                  <label class="custom-control no-border custom-control-lg custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="tipo" value="1" <?php if($tipo=="1"){echo "checked";} ?>>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Proyecto</span>
                  </label>
                  <label class="custom-control no-border custom-control-lg custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="alquiler" value="1" <?php if($alquiler=="1"){echo "checked";} ?>>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Alquiler</span>
                  </label>
                  <label class="custom-control no-border custom-control-lg custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="venta" value="1" <?php if($ventas=="1"){echo "checked";} ?>>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Ventas</span>
                  </label>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="precio">Precio Desde:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="precio" type="text" id="precio" value="<?php echo $precio; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="hasta_precio">Precio Hasta:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="hasta_precio" type="text" id="hasta_precio" value="<?php echo $hasta_precio; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="banos">Ba&ntilde;os:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="banos" type="text" id="banos" value="<?php echo $banos; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="banos_medios">Ba&ntilde;os medios:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="banos_medios" type="text" id="banos_medios" value="<?php echo $banos_medios; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="area">&Aacute;rea Desde:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="area" type="text" id="area" value="<?php echo $area; ?>" required />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label required" for="area_hasta">&Aacute;rea Hasta:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="area_hasta" type="text" id="area_hasta" value="<?php echo $area_hasta; ?>" required />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="area_techada">&Aacute;rea Techada:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="area_techada" type="text" id="area_techada" value="<?php echo $area_techada; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="parking">Estacionamientos:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="parking" type="text" id="parking" value="<?php echo $parking; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="cuartos">Cuartos:</label>
                </div>
                <div class="col-4 col-lg-2">
                  <input class="form-control" name="cuartos" type="text" id="cuartos" value="<?php echo $cuartos; ?>" />
                </div>
              </div>

              <!-- <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="comodidades">Comodidades:</label><br>
                  <small>(Separar con coma ",")</small>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="comodidades" id="comodidades" type="text" value="< ?php echo $comodidades; ?>" />
                </div>
              </div> -->

              <input type="hidden" name="comodidades" value="<?php echo $comodidades; ?>" />

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="ubicacion">Ubicaci&oacute;n:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input class="form-control" name="ubicacion" id="ubicacion" type="text" value="<?php echo $ubicacion; ?>" />
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="orden">Orden:</label>
                </div>
                <div class="col-2 col-lg-1">
                  <input class="form-control" name="orden" type="text" id="orden" onKeyPress="return soloNumeros(event)" value="<?php echo $orden; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-4 col-lg-2">
                  <label class="col-form-label" for="estado">Estado:</label>
                </div>
                <div class="col-8 col-lg-10">
                  <input type="checkbox" name="estado" data-size="small" data-provide="switchery" value="1" <?php if($estado=="1"){echo "checked";} ?>>
                </div>
              </div>
            </div>

            <footer class="card-footer">
              <a href="inmuebles.php" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
              <button class="btn btn-bold btn-primary" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Inmueble</button>
              <input type="hidden" name="fecha_ing" value="<?php echo $fecha_ing; ?>">
              <input type="hidden" name="proceso">
              <input type="hidden" name="cod_inmueble" value="<?php echo $cod_inmueble; ?>">
            </footer>

          </form>
        </div>
      </div><!--/.main-content -->
      <?php include("module/footer_int.php"); ?>
    </main>
    <!-- END Main container -->
  </body>
</html>