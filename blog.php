<?php include("cms/module/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("modulos/head.php"); ?>
  <?php
    $consultarMet = 'SELECT * FROM metatags';
    $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaMet = mysqli_fetch_array($resultadoMet);
      $xTitulo    = $filaMet['titulo'];
      $xSlogan    = $filaMet['slogan'];
      $xDes       = $filaMet['description'];
      $xUrl       = $filaMet['url'];
      $xFace1     = $filaMet['face1'];
      $xFace2     = $filaMet['face2'];
      $xIco       = $filaMet['ico'];
  ?>
  <!-- twitter card starts from here, if you don't need remove this section -->
  <meta name="twitter:url" content="<?php echo $xUrl; ?>" />
  <meta name="twitter:title" content="<?php echo $xTitulo; ?> <?php if($xSlogan==""){ echo $xSlogan; } ?>" /> <!-- maximum 140 char -->
  <meta name="twitter:description" content="<?php echo $xDes ?>" /> <!-- maximum 140 char -->
  <meta name="twitter:image" content="cms/assets/img/meta/<?php echo $xFace1; ?>" />
  <!-- twitter card ends from here -->

  <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
  <meta property="og:title" content="<?php echo $xTitulo; ?> <?php if($xSlogan==""){ echo $xSlogan; } ?>" />
  <meta property="og:url" content="<?php echo $xUrl; ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:site_name" content="<?php echo $xTitulo; ?>" />
  <meta property="og:description" content="<?php echo $xDes; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="cms/assets/img/meta/<?php echo $xFace1; ?>" />
  <meta property="og:image" content="cms/assets/img/meta/<?php echo $xFace2; ?>" />
  <!-- facebook open graph ends from here -->
  <?php
    mysqli_free_result($resultadoMet);
  ?>
</head>
<body>
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
                            <div class="header_box1_logo"><a href="index.php">
                                <img src="imgweb/LOGOvert.svg" width="220" class="logo" ></a>
                            </div>
                        </div>

                        <div id="mySidenav" class="sidenav">
                            <div class="row" style="background-color: white;">
                                <img src="imgweb/LOGOvert.svg" width="220" class="logoside" ></a>
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
                                    <li><a href="">Terrenos</a></li>
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
                    </nav>
          </div>
                  <div class="col-md-6 hidden-xs hidden-sm" align="right">
                    <div class="topbares">
                         Calle Aldabas Nº.559 of.403 - Surco |  2751241/ 2751254/ 6237723
                    </div>
                  </div>
      </div>
    </div>
    <!--newMenu-->

    <!--finder-->
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <p class="branch">Inicio > Blog </p>
        </div>
        <div class="col-md-2 col-xs-12" style="float: right;">
          <div class="wrap-input2 validate-input" >
              <input class="input2" type="text" name="find">
              <span class="focus-input2" data-placeholder=""><i class="fas fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
    <!-- end finder-->

    <!--bodyBlog-->
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
            <?php include("modulos/categorias.php"); ?>
          </div>
          <div class="col-md-10">

                <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="card" style="margin-bottom: 30px;">
                        <img class="card-img-top" src="images/bitmap.png">
                        <div class="card-block">
                            <h4 class="card-title mt-3">Real state life</h4>
                            <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                          <div class="meta">
                            <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-md-6">
                                <small class="smtext"><a href="post.php" target="new"> Leer Mas...</a></small>
                            </div>
                              <div class="col-md-6">
                                <ul class="mcard_list">
                                  <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 111</li>
                                </ul>
                              </div>
                          </div> 
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="images/bitmap.png">
                        <div class="card-block">
                            <h4 class="card-title mt-3">Real state life</h4>
                            <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                          <div class="meta">
                            <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-md-6">
                                <small class="smtext"><a href="post.php" target="new"> Leer Mas...</a></small>
                            </div>
                              <div class="col-md-6">
                                <ul class="mcard_list">
                                  <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 222</li>
                                </ul>
                              </div>
                          </div> 
                        </div>
                    </div>
                  </div>

                </div>  <!--item row blog-->
                <br><br>
                <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="images/bitmap.png">
                        <div class="card-block">
                            <h4 class="card-title mt-3">Real state life</h4>
                            <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                          <div class="meta">
                            <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-md-6">
                                <small class="smtext"><a href="post.php" target="new"> Leer Mas...</a></small>
                            </div>
                              <div class="col-md-6">
                                <ul class="mcard_list">
                                  <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 333</li>
                                </ul>
                              </div>
                          </div> 
                        </div>
                    </div>
                  </div>

                </div>  <!--item row blog-->    
          </div>
      </div>
                <div class="row" align="center">
                  <ul class="pagination">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&raquo;</a></li>
                  </ul>
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

