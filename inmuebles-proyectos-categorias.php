<?php include("cms/module/conexion.php"); ?>
<?php $cod_categoria=$_REQUEST['cod_categoria']; ?>
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
      document.bus.action="/busqueda.php";
      document.bus.submit();
    }
  </script>
</head>
<body>
  <?php include('modulos/nav.php'); ?>
  <!--finder-->
  <div class="container">
    <div class="row">
      <?php 
        $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.cod_categoria='$cod_categoria' AND tipo='1'";
        $resultadoInm = mysqli_query($enlaces, $consultarInm) or die('Consulta fallida: ' . mysqli_error($enlaces));
        $filaInm = mysqli_fetch_array($resultadoInm);
          $xCategoria   = $filaInm['categoria'];
      ?>
      <div class="col-md-8 col-xs-12">
        <p class="branch">Inicio > Proyectos > <?php echo $xCategoria; ?></p>
      </div>
      <!-- 
      <div class="col-md-2 col-xs-12" style="float: right;">
        <div class="wrap-input2 validate-input">
          <input class="input2" type="text" id="buscador" name="buscador" onkeypress="if(event.keyCode==13){ValidarBus();}">
          <span class="focus-input2" data-placeholder="" onclick="javascript:ValidarBus();" ><i class="fas fa-search"></i></span>
        </div>
      </div>
      -->
    </div>
  </div>
  <!-- end finder-->
  <!--view-->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php $xAlquilerx="0"; $xTipox="1"; include('modulos/inmuebles-menu.php'); ?>
      </div>
      <div class="col-md-8">
        <?php
          $consultarInm = "SELECT * FROM inmuebles WHERE cod_categoria='$cod_categoria' AND tipo='1' AND estado='1'";
          $resultadoInm = mysqli_query($enlaces, $consultarInm);
          $total_registros = mysqli_num_rows($resultadoInm);
          if($total_registros==0){
        ?>
        <h2>No hay inmuebles disponibles para esta categor&iacute;a, pronto tendremos novedades.</h2>
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

            $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.cod_categoria='$cod_categoria' AND tipo='1' ORDER BY orden ASC $limite";
            $resultadoInm = mysqli_query($enlaces, $consultarInm) or die('Consulta fallida: ' . mysqli_error($enlaces));
            while($filaInm = mysqli_fetch_array($resultadoInm)){
              $xCodigo      = $filaInm['cod_inmueble'];
              $xLugar       = $filaInm['lugar'];
              $xInmuebles   = $filaInm['titulo'];
              $xDescripcion = $filaInm['descripcion'];
              $xImagen      = $filaInm['imagen'];
              $xFecha       = $filaInm['fecha_ing'];
              $xOrden       = $filaInm['orden'];
              $xEstado      = $filaInm['estado'];
        ?>
        <!--item inmueble-->
        <div class="ncard">
          <div class="col-md-5" style="padding:0px;">
            <a href="inmueble.php?cod_inmueble=<?php echo $xCodigo; ?>"><img src="cms/assets/img/inmuebles/<?php echo $xImagen; ?>" class="ncard_img2" /></a>
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
                  <small class="smtext"><a href="inmueble.php?cod_inmueble=<?php echo $xCodigo; ?>">Ver Inmueble</a></small>
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
          mysqli_free_result($resultadoInm); 
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
                    echo "<li><a href='?cod_categoria=".$cod_categoria."&p=".($pagina-1)."'>&laquo;</a></li>";
                  }
                  for($i=$pagina; $i<=$total_paginas && $i<=($pagina+$paginas_mostrar); $i++){
                    if($i==$pagina){
                      echo "<li class='active'><a><strong>$i</strong></a></li>";
                    }else{
                      echo "<li><a href='?cod_categoria=".$cod_categoria."&p=$i'>$i</a></li>";
                    }
                  }
                  if(($pagina+$paginas_mostrar)<$total_paginas){
                    echo "<li>...</li>";
                  }
                  if($pagina<$total_paginas){
                    echo "  <li><a href='?cod_categoria=".$cod_categoria."&p=".($pagina+1)."'>&raquo;</a></li>";
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