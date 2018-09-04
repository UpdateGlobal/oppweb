<?php include("cms/module/conexion.php"); ?>
<?php 
$menu = $_REQUEST['menu'];
if($menu==3){
  $tipo = 1;
}else{
  $tipo = 0;
}
$cod_categoria = $_REQUEST['cod_categoria'];
$distrito = $_REQUEST['distrito'];
$parametros = "&distrito=$distrito";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("modulos/head.php"); ?>
    <script>
      function ValidarBus(){
        if(document.bus.buscador.value==""){
          alert("Debes ingresar datos para la búsqueda");
          document.bus.buscador.focus();
          return;
        }
        document.bus.action="/buscar.php";
        document.bus.submit();
      }
    </script>
</head>
<body>
  <?php include('modulos/nav.php'); ?>
  <!--finder-->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12">
        <p class="branch">Inicio > B&uacute;squeda <?php echo $distrito; ?> </p>
      </div>
    </div>
  </div>
  <!-- end finder-->
  <!--view-->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php include("modulos/menu-inmuebles.php"); ?>
      </div>
      <div class="col-md-8">
        <?php
          //configuracion de paginador
          if($menu==2){
            $buscarpro = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.alquiler='0' AND (di.distrito LIKE '%$distrito%' AND i.cod_categoria LIKE '%$cod_categoria%' AND i.tipo LIKE '%$tipo%') AND i.estado='1'";
          }else{
            $buscarpro = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.alquiler='1' AND (di.distrito LIKE '%$distrito%' AND i.cod_categoria LIKE '%$cod_categoria%' AND i.tipo LIKE '%$tipo%') AND i.estado='1'";
          }
          $resultadobus = mysqli_query($enlaces, $buscarpro);
          $total_registros = mysqli_num_rows($resultadobus);
          if($total_registros==0){ ?>
            <h2>Sin resultados para la b&uacute;squeda: <?php echo $distrito; ?><br>
            Intente con otro término.</h2>
            <div style="height: 40px;"></div>
          </div>
        <?php 
          }else{
            $registros_por_paginas = 3;
            $total_paginas = ceil($total_registros/$registros_por_paginas);
            $pagina = intval($_GET['p']);
            if($pagina<1 or $pagina>$total_paginas){
              $pagina=1;
            }
            $posicion = ($pagina-1)*$registros_por_paginas;
            $limite = "LIMIT $posicion, $registros_por_paginas";
            //fin configuracion paginador

            if($menu==2){
              $buscarpro="SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND (di.distrito LIKE '%$distrito%' AND i.cod_categoria LIKE '%$cod_categoria%' AND i.alquiler='0' AND i.tipo LIKE '%$tipo%') AND i.estado='1' $limite";
            }else{
              $buscarpro="SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND (di.distrito LIKE '%$distrito%' AND i.cod_categoria LIKE '%$cod_categoria%' AND i.alquiler='1' AND i.tipo LIKE '%$tipo%') AND i.estado='1' $limite";
            }
            $resultadobus=mysqli_query($enlaces, $buscarpro);
            while($filaInm=mysqli_fetch_array($resultadobus)){
              $xCodigo      = $filaInm['cod_inmueble'];
              $xLugar       = $filaInm['lugar'];
              $xInmuebles   = $filaInm['titulo'];
              $xSlug        = $filaInm['slug'];
              $xDescripcion = $filaInm['descripcion'];
              $xImagen      = $filaInm['imagen'];
              $xFecha       = $filaInm['fecha_ing'];
              $xOrden       = $filaInm['orden'];
              $xEstado      = $filaInm['estado'];
        ?>
        <!--item inmueble-->
        <div class="ncard">
          <div class="col-md-5" style="padding: 0px;">
            <a href="/inmueble/<?php echo $xSlug; ?>"><img src="/cms/assets/img/inmuebles/<?php echo $xImagen; ?>" class="ncard_img2"></a>
          </div>
          <div class="col-md-7" style="padding: 0px;">
            <div class="card-block">
              <h4 class="ncard-title mt-3"><?php echo $xInmuebles; ?></h4>
              <p class="mcard_p2"><?php
                $mydate = strtotime($xFecha);
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                echo $dias[date('w', $mydate)]." ".date('d', $mydate)." de ".$meses[date('n', $mydate)-1]. " del ".date('Y', $mydate);
              ?></p>
              <div class="meta">
                <p class="mcard_p">
                <?php
                  $xDescripcionSM = strip_tags($xDescripcion);
                  $strCut = substr($xDescripcionSM,0,180);
                  $xDescripcionSM = substr($strCut,0,strrpos($strCut, ' ')).'...';
                  echo $xDescripcionSM;
                ?>
                </p>
              </div>
            </div>
            <div class="ncard-footer">
              <div class="row">
                <div class="col-md-5">
                  <small class="smtext"><a href="/inmueble/<?php echo $xSlug; ?>">Ver Inmueble</a></small>
                </div>
                <div class="col-md-7"></div>
              </div> 
            </div>
          </div>
        </div>
        <br>
        <!--item inmueble-->
        <?php
          }
        ?>
      </div>
    </div>
    <div class="row" align="center">
      <?php
        $paginas_mostrar = 5;
        if ($total_paginas>1){
          echo "<div class='row text-center'>
                  <div class='col-lg-12'>
                    <ul class='pagination'>";
                  if($pagina>1){
                    echo "<li><a href='?p=".($pagina-1)."'>&laquo;</a></li>";
                  }
                  for($i=$pagina; $i<=$total_paginas && $i<=($pagina+$paginas_mostrar); $i++){
                    if($i==$pagina){
                      echo "<li class='active'><a><strong>$i</strong></a></li>";
                    }else{
                      echo "<li><a href='?p=$i'>$i</a></li>";
                    }
                  }
                  if(($pagina+$paginas_mostrar)<$total_paginas){
                    echo "<li>...</li>";
                  }
                  if($pagina<$total_paginas){
                    echo "  <li><a href='?p=".($pagina+1)."'>&raquo;</a></li>";
                  }
        echo "  </ul>
              </div>
            </div>";
          }
        }
      ?>
    </div>
  </div>
  <!--end view-->
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