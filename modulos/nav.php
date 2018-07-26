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
              <img src="cms/assets/img/meta/<?php echo $xLogo ?>" width="220" class="logoside" /></a>
              <?php
                mysqli_free_result($resultadoMet);
              ?>
            </div>
            <ul>
              <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Departamentos</a></li>
                  <li><a href="#">Oficinas</a></li>
                  <li><a href="#">Casa</a></li>
                  <li><a href="#">Locales</a></li>
                  <li><a href="">Terrenos</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alquiler</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Departamentos</a></li>
                  <li><a href="#">Oficinas</a></li>
                  <li><a href="#">Casa</a></li>
                  <li><a href="#">Locales</a></li>
                  <li><a href="#">Terrenos</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proyectos</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Proyecto 1</a></li>
                  <li><a href="#">Proyecto 2</a></li>
                </ul>
              </li>
              <li><a href="#">Quiero Vender</a></li>
              <li><a href="contacto.php">Contacto</a></li>
              <li><a href="blog.php">Blog</a></li>
            </ul>
            <div class="row">
              <div class="redes">
                <ul class="redes">
                  <li><i class="fab fa-facebook-square"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-md-6 hidden-xs hidden-sm" align="right">
      <div class="topbares">Calle Aldabas Nº.559 of.403 - Surco |  2751241/ 2751254/ 6237723</div>
    </div>
  </div>
</div>
<!--newMenu-->