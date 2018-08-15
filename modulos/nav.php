<!--newMenu-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6" align="left">
      <nav class="navbar navbar-default">
        <div class="container-fluid" style="padding: 10px 5px 10px;">
          <div class="header_box1">
            <div class="header_box1_menu">
              <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            </div>
            <div class="header_box1_logo">
              <?php
                $consultarMet = 'SELECT * FROM metatags';
                $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
                $filaMet = mysqli_fetch_array($resultadoMet);
                  $xLogo      = $filaMet['logo'];
              ?>
              <a href="index.php">
                <img src="cms/assets/img/meta/<?php echo $xLogo; ?>" width="220" class="logo" />
              </a>
              <?php
                mysqli_free_result($resultadoMet);
              ?>
            </div>
          </div>
          <div id="mySidenav" class="sidenav">
            <div class="row" style="background-color: white;">
              <?php
                $consultarMet = 'SELECT * FROM metatags';
                $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
                $filaMet = mysqli_fetch_array($resultadoMet);
                  $xLogo      = $filaMet['logo'];
              ?>
              <a href="index.php">
                <img src="cms/assets/img/meta/<?php echo $xLogo ?>" width="220" class="logoside" />
              </a>
              <?php
                mysqli_free_result($resultadoMet);
              ?>
            </div>
            <ul>
              <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas</a>
                <ul class="dropdown-menu">
                  <?php
                    $consultarCategoria = "SELECT * FROM inmuebles_categorias ORDER BY orden";
                    $resultadoCategoria = mysqli_query($enlaces,$consultarCategoria) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    while($filaCat = mysqli_fetch_array($resultadoCategoria)){
                      $xCodigo    = $filaCat['cod_categoria'];
                      $xCategoria = $filaCat['categoria'];
                  ?>
                  <li><a href="inmuebles-ventas-categorias.php?cod_categoria=<?php echo $xCodigo; ?>"><?php echo $xCategoria; ?></a></li>
                  <?php
                    }
                    mysqli_free_result($resultadoCategoria);
                  ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alquiler</a>
                <ul class="dropdown-menu">
                  <?php
                    $consultarCategoria = "SELECT * FROM inmuebles_categorias ORDER BY orden";
                    $resultadoCategoria = mysqli_query($enlaces,$consultarCategoria) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    while($filaCat = mysqli_fetch_array($resultadoCategoria)){
                      $xCodigo    = $filaCat['cod_categoria'];
                      $xCategoria = $filaCat['categoria'];
                  ?>
                  <li><a href="inmuebles-alquiler-categorias.php?cod_categoria=<?php echo $xCodigo; ?>"><?php echo $xCategoria; ?></a></li>
                  <?php
                    }
                    mysqli_free_result($resultadoCategoria);
                  ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proyectos</a>
                <ul class="dropdown-menu">
                  <li><a href="inmuebles-proyecto.php">Proyecto 1</a></li>
                  <li><a href="inmuebles-proyecto.php">Proyecto 2</a></li>
                </ul>
              </li>
              <li><a href="contacto.php">Quiero Vender</a></li>
              <li><a href="contacto.php">Contacto</a></li>
              <li><a href="blog.php">Blog</a></li>
            </ul>
            <div class="row">
              <div class="redes">
                <ul class="redes">
                  <?php
                    $consultarSol = "SELECT * FROM social WHERE estado='1' ORDER BY orden";
                    $resultadoSol = mysqli_query($enlaces,$consultarSol) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    while($filaSol = mysqli_fetch_array($resultadoSol)){
                      $xLinks     = $filaSol['links'];
                      $xType      = $filaSol['type'];
                      if($xType=="fa-facebook-square"){ $xValor = "fa-facebook-f"; }
                      if($xType=="fa-twitter-square"){ $xValor = "fa-twitter"; }
                      if($xType=="fa-google-plus-official"){ $xValor = "fa-google-plus-g"; }
                      if($xType=="fa-linkedin"){ $xValor = "fa-linkedin-in"; }
                      if($xType=="fa-behance"){ $xValor = "fa-behance"; }
                      if($xType=="fa-youtube-play"){ $xValor = "fa-youtube"; }
                      if($xType=="fa-vimeo"){ $xValor = "fa-vimeo-v"; }
                      if($xType=="fa-wordpress"){ $xValor = "fa-wordpress"; }
                      if($xType=="fa-tumblr-square"){ $xValor = "fa-tumblr"; }
                      if($xType=="fa-pinterest"){ $xValor = "fa-pinterest-p"; }
                      if($xType=="fa-instagram"){ $xValor = "fa-instagram"; }
                      if($xType=="fa-flickr"){ $xValor = "fa-flickr"; }
                  ?>
                  <li><a href="<?php echo $xLinks; ?>" target="_blank"><i class="fab <?php echo $xValor; ?>"></i></span></a></li>
                  <?php
                    }
                    mysqli_free_result($resultadoSol);
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-md-6 hidden-xs hidden-sm" align="right">
      <?php
        $consultarCot = 'SELECT * FROM contacto';
        $resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
        $filaCot  = mysqli_fetch_array($resultadoCot);
          $xDirection = $filaCot['direction'];
          $xTelefono  = $filaCot['phone'];
      ?>
      <div class="topbares"><?php echo $xDirection; ?><?php if($xTelefono!=""){ echo " | ".$xTelefono; } ?></div>
    </div>
  </div>
</div>
<!--newMenu-->