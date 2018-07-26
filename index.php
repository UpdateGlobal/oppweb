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
    <?php include('modulos/nav.php'); ?>
    <!--slider-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 bg_slide_de">
                <div class="depa_desta">
                    <p class="textowless"> San Miguel</p>
                </div>
                <div class="depa_title">
                    <p class="textowless2">Condominios Las Brisas</p>
                </div>
            </div>
            <div class="col-sm-6 bg_slide_iz">
                <div class="owl-one owl-carousel owl-theme">
                    <div class="item items" style="background: url(images/slide1.png);">
                        <div class="textowl">
                            <p class="textowless">Edificio San Jose</p>
                        </div>
                    </div>
                    <div class="item items" style="background: url(images/slide2.png);">
                        <p class="textowl">loren ipsum #2<br><span>LOREN IPSUM</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider-->
    <!--fidner2-->
    <div class="container">
        <div class="row">
            <div class="conten_finder" align="center">
                <br>
                <span class="sea_textp">ENCUENTRA UN LUGAR PARA TI</span>
                <p class="card_p">Porqué Invertir En Plexus</p>
                <br>
                <ul class="finder">
                    <li class="inpute">
                        <select class="form-control">
                            <option>Seleccionar...</option>
                            <option>Ventas</option>
                            <option>Alquileres</option>
                            <option>Hipotecas</option>
                        </select>
                    </li>
                    <li class="inpute">
                        <select class="form-control">
                            <option>Seleccionar...</option>
                            <option>Departamentos</option>
                            <option>Casa</option>
                            <option>Oficinas</option>
                            <option>Almacenes</option>
                        </select>
                    </li>
                    <li class="inpute">
                        <input type="text" class="form-control" placeholder="Buscar por Distrito" >
                    </li>
                    <li class="inpute">
                        <a type="submit" class="btn btnfin" href="view.php">Buscar</a>
                    </li>
                </ul>
                <br><br><br>
            </div>
        </div>
    </div>
    <!--fidner2-->
    <!--cards-->
    <section class="seccion_bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" align="center">
                    <br><br>
                    <span class="sea_textp">PROYECTOS</span>
                    <p class="card_p">Lanzamientos Inmobiliarios</p>
                    <br>
                    <div class="owl-two owl-carousel owl-theme">
                        <a href="inmueble.php">
                            <div class="item slushi rent_shadow" style="background: url(imgweb/magdalena.jpg); background-size: cover;">  
                                <div class="row card_title" style="margin: 20px 0px;padding: 10px 0px;">
                                    <div class="col-md-6 col-xs-12 card_home" align="left">MAGDALENA</div>
                                    <div class="col-md-6 col-xs-12 card_price" align="right">$ 377,280</div>
                                    <p class="card_adres"> <i class="fas fa-map-marker-alt"></i>Prisma Tower - Lima, Peru</p>
                                </div>
                                <div class="row botton_title navbar-fixed-bottom" >
                                    <ul class="card_list">
                                        <li><i class="fas fa-home"></i> 78 mts</li>
                                        <li><i class="fas fa-bed"></i> 4 Cuartos</li>
                                        <li><i class="fas fa-car"></i> 1 Estacionamiento</li>
                                    </ul>
                                </div>
                            </div>
                        </a>  
                        <a href="inmueble.php">
                            <div class="item slushi rent_shadow" style="background: url(imgweb/miraflores.jpg);  background-size: cover;">
                                <div class="row card_title" style="margin: 20px 0px;padding: 10px 0px;">
                                    <div class="col-md-6 col-xs-12 card_home" align="left">MIRAFLORES</div>
                                    <div class="col-md-6 col-xs-12 card_price" align="right">$ 269,220</div>
                                    <p class="card_adres"> <i class="fas fa-map-marker-alt"></i>Ramirez Gaston - Lima, Peru</p>
                                </div>
                                <div class="row botton_title navbar-fixed-bottom" >
                                    <ul class="card_list">
                                        <li><i class="fas fa-home"></i> 78 mts</li>
                                        <li><i class="fas fa-bed"></i> 4 Cuartos</li>
                                        <li><i class="fas fa-shower"></i>2 Baños</li>
                                        <li><i class="fas fa-car"></i> 1 Parking</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="inmueble.php">
                            <div class="item slushi rent_shadow" style="background: url(imgweb/pueblolibre.jpg);  background-size: cover;">
                                <div class="row card_title" style="margin: 20px 0px;padding: 10px 0px;">
                                    <div class="col-md-6 col-xs-12 card_home" align="left">PUEBLO LIBRE</div>
                                    <div class="col-md-6 col-xs-12 card_price" align="right">$ 133,901</div>
                                    <p class="card_adres"> <i class="fas fa-map-marker-alt"></i>Parque Colmenares - Lima, Peru</p>
                                </div>
                                <div class="row botton_title navbar-fixed-bottom" >
                                    <ul class="card_list">
                                        <li><i class="fas fa-home"></i> 78 mts</li>
                                        <li><i class="fas fa-bed"></i> 4 Cuartos</li>
                                        <li><i class="fas fa-shower"></i>2 Baños</li>
                                        <li><i class="fas fa-car"></i> 1 Parking</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </section>
<!--cards-->
<!--card_rents-->
<section>
    <div class="container-fluid">
        <div class="row" align="center">
            <br><br><br>
            <h3 class="rent_text opptitle">NOVEDADES PARA TI</h3>
            <p class="rent_sub oppsubtitle">Lanzamientos Inmobiliarios</p>
            <br><br><br>
            <div class="col-md-3" align="left">
                <p class="rent_p">Propiedad</p>
                <h3 class="rent_text">ALQUILER</h3>
                <p class="rent_p oppmtext">loren ipnsun text da more fitne max height da il lovo dirte mamat mot</p>
                <br>
            </div>  
            <div class="col-md-9">
                <div class="owl-tree owl-carousel owl-theme">
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/miraflores2.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">MIRAFLORES</div>
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">Oficina alquiler</p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 300 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 4 cubiculos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i> 2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/santiagodesurco.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">ST. SURCO</div> 
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">oficina alquiler </p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 298 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 3 Cubiculos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i> 2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/santiagodesurco2.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">ST. SURCO</div> 
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">Departamento alquiler</p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 80 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 3 Cuartos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i> 2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin: 80px 20px;">
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-md-3" align="left">
                <p class="rent_p">Propiedad</p>
                <h3 class="rent_text">EN VENTA</h3>
                <p class="rent_p">loren ipnsun text da more fitne max height da il lovo dirte mamat mot</p>
                <br>
            </div>  
            <div class="col-md-9" >
                <div class="owl-tree owl-carousel owl-theme">
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/santihagodesurco3.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">ST. SURCO</div>
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">20 Apartamentos tipo A <br> Precio: $ 130,000</p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 78 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 4 Cuartos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i>2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/miraflores.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">MIRAFLORES  </div>
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">20 Apartamentos tipo A <br> Precio: $ 278,000</p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 78 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 4 Cuartos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i>2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="inmueble.php">
                        <div class="rent_img">
                            <div class="rent_item rent_shadow" >
                                <div class="row" style="margin: 0px;">
                                    <img src="imgweb/miraflores2.jpg" class="rent_img" alt="">
                                    <div class="botton_rent">
                                        <div class="rent_valor">MIRAFLORES</div>
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px;">
                                    <p class="rent_titl">20 Apartamentos tipo A <br> Precio: $ 238,000</p>
                                    <ul class="rent_list">
                                        <li class="itemc"><i class="fas fa-home"></i> 83 mts</li>
                                        <li class="itemc"><i class="fas fa-bed"></i> 3 Cuartos</li>
                                        <li class="itemc"><i class="fas fa-shower"></i>2 Baños</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--card_sale-->
    <br>
    <br>
    <br>
    <!--empresa-->
    <section class="seccion_bg">
        <div class="container-fluid">
            <br><br>
            <div class="row">
                <div class="col-md-5">
                    <img src="imgweb/logo_svg.svg" class="img-responsive abt_img">
                </div>
                <div class="col-md-7">
                    <h3 class="about">Nosotros</h3>
                    <p class="abt_nom">Octavio Pedraza Porras E Hijos</p>
                    <br>
                    <p class="art_abt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor.
                    Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                    </p>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
    <!--empresa-->
    <!--Contacto-->
    <section class="cont_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4" align="center">
                    <div class="cont_txt2">
                        <i class="fas fa-home fa-5x" style="color: white !important;"></i>
                        <br>
                        <h3 class="opptitle">LOREN IPSUN</h3>
                        <p class="oppmtext">loren ipsun text da</p>
                        <br>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                    <div class="cont_txt">
                        <br>
                        <h3 class="opptitle" align="left">LOREN IPSUN</h3>
                        <p class="oppmtext" align="left">loren ipsun text da moret</p>
                        <br>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                     <button type="button" class="btn btn-defaults btn-lg">Contactanos</button>
                </div>
            </div>
        </div>
    </section>
    <!--Contacto-->
    <!--formulario-->
    <section class="for_bg">
        <div class="container-fluid" id="formulario">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <img src="images/agent-image-1.png" class="img-responsive for_img hidden-xs">
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="wrap-contact2">
                        <div align="center">
                            <h3 class="for_text">CONTÁCTANOS</h3>
                            <p class="for_p">Ayudamos a vender tu inmueble</p>
                            <br>
                        </div>
                        <form class="contact2-form validate-form">
                            <div class="wrap-input2 validate-input" data-validate="Nombre requerido">
                                <input class="input2" type="text" name="name">
                                <span class="focus-input2" data-placeholder="Nombre"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Correo requerido">
                                <input class="input2" type="text" name="email">
                                <span class="focus-input2" data-placeholder="Email"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Telefono requerido">
                                <input class="input2" type="text" name="email">
                                <span class="focus-input2" data-placeholder="Telefono"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Mensaje requerido">
                                <textarea class="input2" name="message"></textarea>
                                <span class="focus-input2" data-placeholder="Mensaje"></span>
                            </div>
                            <div class="container-contact2-form-btn">
                                <div class="wrap-contact2-form-btn">
                                    <div class="contact2-form-bgbtn"></div>
                                    <button class="contact2-form-btn">
                                        Enviar Mensaje
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <!--formulario-->
    <!--mcard-->
    <section style="background-color: #f7f7f7;">
    <div class="container-fluid">
        <div class="row mcard" align="center"><br>
            <h3 class="rent_text">CONSEJOS Y NOTICIAS</h3>
            <p class="rent_p">Lo que debes saber si buscas un inmueble</p>
        </div>        
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <br><br>
                <div class="card">
                    <img class="card-img-top" src="imgweb/santiagodesurco2.jpg">
                    <div class="card-block">
                        <h4 class="card-title mt-3">ALQUILER OFICINA EN CHACARILLA DEL ESTANQUE -SURCO</h4>
                        <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                        <div class="meta">
                            <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="smtext">Leer Mas...</small>
                            </div>
                            <div class="col-md-6">
                                <ul class="mcard_list">
                                    <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 9348</li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-6 col-xs-12">
                <br>
                <div class="row ncard_btn">
                    <div class="col-md-12">
                        <div class="ncard">
                            <div class="col-md-5" style="padding: 0px;">
                                <img src="imgweb/santiagodesurco.jpg"  class="ncard_img ">
                            </div>
                            <div class="col-md-7" style="padding: 0px;">
                                <div class="card-block">
                                    <h4 class="ncard-title mt-3">EDIFICIO GALEANO – SURCO</h4>
                                    <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                                    <div class="meta">
                                        <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                                <div class="ncard-footer">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <small class="smtext">Leer Mas...</small>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="ncard_list">
                                                <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 93</li>
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end card-->
                
                <div class="row ncard_btn">
                    <div class="col-md-12">
                        <div class="ncard">
                            <div class="col-md-5" style="padding: 0px;">
                                <img src="imgweb/santiagodesurco2.jpg" class="ncard_img">
                            </div>
                            <div class="col-md-7" style="padding: 0px;">
                                <div class="card-block">
                                    <h4 class="ncard-title mt-3">ALQUILER OFICINA EN CHACARILLA DEL ESTANQUE -SURCO</h4>
                                    <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                                    <div class="meta">
                                        <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                                <div class="ncard-footer">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <small class="smtext">Leer Mas...</small>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="ncard_list">
                                                    <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 93</li>
                                                </ul>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                    <div class="row ncard_btn">
                        <div class="col-md-12">
                            <div class="ncard">
                                <div class="col-md-5" style="padding: 0px;">
                                    <img src="imgweb/santihagodesurco3.jpg" class="ncard_img">
                                </div>
                                <div class="col-md-7" style="padding: 0px;">
                                    <div class="card-block">
                                        <h4 class="ncard-title mt-3">ALQUILER OFICINA ALDABAS- SURCO</h4>
                                        <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
                                        <div class="meta">
                                            <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                    <div class="ncard-footer">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <small class="smtext">Leer Mas...</small>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="ncard_list">
                                                    <li><i class="fas fa-share-alt" style="color: skyblue;"></i> 93</li>
                                                </ul>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
            </div>    
        </div>
    </div>
    <br><br><br>
    </section>
    <!--mcard-->
    <!--footer-->
    <section style="background-color: #fff">
        <br><br><br><br><br><br><br><br>
    </section>
    <?php include("modulos/footer.php"); ?>
    <!--footer-->           
    <!-- Set up your HTML -->
<!--     <script type="text/javascript">
        
    (function () {
     var preload = document.getElementById("preload");
     var loading = 0;
     var id = setInterval(frame, 64);

     function frame(){
      if(loading == 100) {
       clearInterval(id);
       window.open("index.php", "_self");
      }
      else {
       loading = loading + 1;
       if(loading == 90) {
        preload.style.animation = "fadeout 1s ease";
       }
      }
     }
    })();
    </script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-one').owlCarousel({
                loop:true,
                margin:0,
                autoplay:false,
                autoplayTimeout:3000,
                nav:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-two').owlCarousel({
                loop:true,
                margin:50,
                autoplay:false,
                autoplayTimeout:3000,
                nav:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-tree').owlCarousel({
                loop:true,
                margin:50,
                autoplay:false,
                autoplayTimeout:3000,
                nav:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            })
        });
    </script>
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