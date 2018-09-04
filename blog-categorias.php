<?php include("cms/module/conexion.php"); ?>
<?php $cod_categoria=$_REQUEST['cod_categoria']; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("modulos/head.php"); ?>
</head>
<body>
  <?php include("modulos/nav.php"); ?>
  <!--finder-->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12">
        <?php 
          $consultarCategorias = "SELECT * FROM noticias_categorias WHERE estado='1' AND cod_categoria='$cod_categoria'";
          $resultadoCategorias = mysqli_query($enlaces,$consultarCategorias) or die('Consulta fallida: ' . mysqli_error($enlaces));
          $filaCat = mysqli_fetch_array($resultadoCategorias);
            $xCategoria = $filaCat['categoria'];
        ?>
        <p class="branch">Inicio > Blog > <?php echo $xCategoria; ?></p>
        <?php
          mysqli_free_result($resultadoCategorias);
        ?>
      </div>
      <!-- <div class="col-md-2 col-xs-12" style="float: right;">
        <div class="wrap-input2 validate-input">
          <input class="input2" type="text" name="find">
          <span class="focus-input2" data-placeholder=""><i class="fas fa-search"></i></span>
        </div>
      </div> -->
    </div>
  </div>
  <!-- end finder-->
  <!--bodyBlog-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <?php include("modulos/blog-categorias.php"); ?>
      </div>
      <div class="col-md-10">
        <div class="row">
          <?php
              $consultarNoticias = "SELECT * FROM noticias WHERE estado='1' AND cod_categoria='$cod_categoria'";
              $resultadoNoticias = mysqli_query($enlaces, $consultarNoticias);
              $total_registros = mysqli_num_rows($resultadoNoticias);
              if($total_registros==0){ 
            ?>
              <h2>No hay entradas en nuestro blog, pronto tendremos novedades.</h2>
              <div style="height: 40px;"></div>
            <?php 
              }else{
                $registros_por_paginas = 4;
                $total_paginas = ceil($total_registros/$registros_por_paginas);
                $pagina = intval($_GET['p']);
                if($pagina<1 or $pagina>$total_paginas){
                  $pagina=1;
                }
                $posicion = ($pagina-1)*$registros_por_paginas;
                $limite = "LIMIT $posicion, $registros_por_paginas";

                $consultarNoticias = "SELECT * FROM noticias WHERE estado='1' AND cod_categoria='$cod_categoria' ORDER BY fecha ASC $limite";
                $resultadoNoticias = mysqli_query($enlaces,$consultarNoticias) or die('Consulta fallida: ' . mysqli_error($enlaces));
                while($filaNot = mysqli_fetch_array($resultadoNoticias)){
                  $xCodigo        = $filaNot['cod_noticia'];
                  $xSlug          = $filaNot['slug'];
                  $xTitulo        = $filaNot['titulo'];
                  $xImagen        = $filaNot['imagen'];
                  $xDescripcion   = $filaNot['noticia'];
                  $xFecha         = $filaNot['fecha'];
                  $xAutor         = $filaNot['autor'];
          ?>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card" style="margin-bottom: 30px;">
              <img class="card-img-top" src="/cms/assets/img/noticias/<?php echo $xImagen; ?>">
              <div class="card-block">
                <h4 class="card-title mt-3 titulo-noticia"><?php echo $xTitulo; ?></h4>
                <?php
                  $mydate = strtotime($xFecha);
                  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                ?>
                <p class="mcard_p2"><?php echo $meses[date('n', $mydate)-1]." ".date('d', $mydate)." / ".date('Y', $mydate); ?> - por <?php echo $xAutor; ?></p>
                <div class="meta descripcion-noticia">
                  <p class="mcard_p">
                    <?php 
                      $xDescripcion_r = strip_tags($xDescripcion);
                      $strCut = substr($xDescripcion_r,0,200);
                      $xDescripcion_r = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      echo strip_tags($xDescripcion_r);
                    ?>
                  </p>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-6">
                    <small class="smtext"><a href="/blog-noticia/<?php echo $xSlug; ?>" target="new">Leer M&aacute;s...</a></small>
                  </div>
                  <div class="col-md-6">
                    <!-- <ul class="mcard_list">
                      <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 111</li>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
            mysqli_free_result($resultadoNoticias);
          ?>
        </div>
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
                    echo "<li><a href='/blog-categorias/".$slug."&p=".($pagina-1)."'>&laquo;</a></li>";
                  }
                  for($i=$pagina; $i<=$total_paginas && $i<=($pagina+$paginas_mostrar); $i++){
                    if($i==$pagina){
                      echo "<li class='active'><a><strong>$i</strong></a></li>";
                    }else{
                      echo "<li><a href='/blog-categorias/".$slug."&p=$i'>$i</a></li>";
                    }
                  }
                  if(($pagina+$paginas_mostrar)<$total_paginas){
                    echo "<li>...</li>";
                  }
                  if($pagina<$total_paginas){
                    echo "<li><a href='/blog-categorias/".$slug."&p=".($pagina+1)."'>&raquo;</a></li>";
                  }
          echo "</ul>
              </div>
            </div>";
          }
        }
      ?>
    </div>
  </div>
  <!--bodyBlog-->
  <!--footer-->
  <section style="background-color: #fff">
    <br><br><br><br><br><br><br><br>
  </section>
  <?php include("modulos/footer.php"); ?>
  <!--footer-->
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