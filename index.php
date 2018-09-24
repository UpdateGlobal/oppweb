<?php include("cms/module/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("modulos/head.php"); ?>
    <script>
        function ValidarBus(){
            if(document.bus.distrito.value==""){
                alert("Debes ingresar un distrito para la búsqueda");
                document.bus.distrito.focus();
                return;
            }
            document.bus.action="/busqueda.php";
            document.bus.submit();
        }
    </script>
</head>
<body>
    <?php include("modulos/nav.php"); ?>
    <!--slider-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 bg_slide_de">
                <?php
                    $consultaCon = "SELECT * FROM contenidos WHERE cod_contenido='3'";
                    $ejecutarCon = mysqli_query($enlaces,$consultaCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    $filaCon = mysqli_fetch_array($ejecutarCon);
                        $cod_contenido    = $filaCon['cod_contenido'];
                        $titulo_contenido = $filaCon['titulo_contenido'];
                        $img_contenido    = $filaCon['img_contenido'];
                        $contenido        = $filaCon['contenido'];
                        $estado           = $filaCon['estado'];
                        $enlace           = $filaCon['enlace'];
                ?>
                <div class="depa_desta">
                    <p class="textowless"><?php echo $titulo_contenido; ?></p>
                </div>
                <div class="depa_title">
                    <p class="textowless2"><?php echo $contenido; ?></p>
                </div>
            </div>
            <div class="col-sm-6 bg_slide_iz">
                <div class="owl-one owl-carousel owl-theme">
                    <?php
                        $consultarBanner = "SELECT * FROM banners WHERE estado='1' ORDER BY orden";
                        $resultadoBanner = mysqli_query($enlaces,$consultarBanner) or die('Consulta fallida: ' . mysqli_error($enlaces));
                        while($filaBan = mysqli_fetch_array($resultadoBanner)){
                            $xCodigo    = $filaBan['cod_banner'];
                            $xTitulo    = $filaBan['titulo'];
                            $xImagen    = $filaBan['imagen'];
                    ?>
                    <div class="item items" style="background: url(/cms/assets/img/banner/<?php echo $xImagen; ?>);">
                        <div class="textowl">
                            <p class="textowless"><?php echo $xTitulo; ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
                <span class="sea_textp">TU MEJOR EXPERIENCIA INMOBILIARIA</span>
                <p class="card_p">Octavio Pedraza Porras</p>
                <br>
                <form name="bus" id="bus">
                    <ul class="finder">
                        <li class="inpute">
                            <select class="form-control" name="menu">
                                <option value="default">Seleccionar...</option>
                                <option value="1">Ventas</option>
                                <option value="2">Alquileres</option>
                                <option value="3">Proyectos</option>
                            </select>
                        </li>
                        <li class="inpute">
                            <select class="form-control" name="cod_categoria">
                                <option value="default">Seleccionar...</option>
                                <?php
                                    $consultarCategoria = "SELECT * FROM inmuebles_categorias ORDER BY orden";
                                    $resultadoCategoria = mysqli_query($enlaces,$consultarCategoria) or die('Consulta fallida: ' . mysqli_error($enlaces));
                                    while($filaCat = mysqli_fetch_array($resultadoCategoria)){
                                      $xCodigo    = $filaCat['cod_categoria'];
                                      $xCategoria = $filaCat['categoria'];
                                ?>
                                <option value="<?php echo $xCodigo; ?>"><?php echo $xCategoria; ?></option>
                                <?php
                                    }
                                    mysqli_free_result($resultadoCategoria);
                                ?>
                            </select>
                        </li>
                        <li class="inpute">
                            <input type="text" class="form-control" name="distrito" placeholder="Buscar por Distrito" onkeypress="if(event.keyCode==13){ValidarBus();}" />
                        </li>
                        <li class="inpute">
                            <input type="button" class="btn btnfin" value="Buscar" onclick="javascript:ValidarBus();" />
                        </li>
                    </ul>
                </form>
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
                        <?php 
                            $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.tipo='1' ORDER BY orden ASC";
                            $resultadoInm = mysqli_query($enlaces, $consultarInm) or die('Consulta fallida: ' . mysqli_error($enlaces));
                            while($filaInm = mysqli_fetch_array($resultadoInm)){
                                $xCodigo      = $filaInm['cod_inmueble'];
                                $xDistrito    = $filaInm['distrito'];
                                $xLugar       = $filaInm['lugar'];
                                $xTitulo      = $filaInm['titulo'];
                                $xSlug        = $filaInm['slug'];
                                $xImagen      = $filaInm['imagen'];
                                $xArea        = $filaInm['area'];
                                $xCuartos     = $filaInm['cuartos'];
                                $xPrecio      = $filaInm['precio'];
                                $xParking     = $filaInm['parking'];
                        ?>
                        <a href="/inmueble/<?php echo $xSlug; ?>">
                            <div class="item slushi rent_shadow" style="background: url(/cms/assets/img/inmuebles/<?php echo $xImagen; ?>); background-size: cover;">
                                <div class="row card_title" style="margin: 20px 0px;padding: 10px 0px;">
                                    <div class="col-md-6 col-xs-12 card_home" align="left"><?php echo $xDistrito; ?></div>
                                    <div class="col-md-6 col-xs-12 card_price" align="right">$ <?php echo $xPrecio; ?></div>
                                    <p class="card_adres"><i class="fas fa-map-marker-alt"></i> <?php echo $xTitulo; ?> - <?php echo $xLugar; ?></p>
                                </div>
                                <div class="row botton_title navbar-fixed-bottom">
                                    <ul class="card_list">
                                        <li><i class="fas fa-home"></i> <?php echo $xArea; ?></li>
                                        <li><i class="fas fa-bed"></i> <?php echo $xCuartos ?></li>
                                        <li><i class="fas fa-car"></i> <?php echo $xParking; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <?php 
                            }
                        ?>
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
                        <?php 
                            $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND i.alquiler='0' ORDER BY orden ASC";
                            $resultadoInm = mysqli_query($enlaces, $consultarInm) or die('Consulta fallida: ' . mysqli_error($enlaces));
                            while($filaInm = mysqli_fetch_array($resultadoInm)){
                                $xCodigo      = $filaInm['cod_inmueble'];
                                $xDistrito    = $filaInm['distrito'];
                                $xTitulo      = $filaInm['titulo'];
                                $xSlug        = $filaInm['slug'];
                                $xImagen      = $filaInm['imagen'];
                                $xArea        = $filaInm['area'];
                                $xCuartos     = $filaInm['cuartos'];
                                $xBanos       = $filaInm['banos'];
                        ?>
                        <a href="/inmueble/<?php echo $xSlug; ?>">
                            <div class="rent_img">
                                <div class="rent_item rent_shadow">
                                    <div class="row" style="margin: 0px;">
                                        <img src="/cms/assets/img/inmuebles/<?php echo $xImagen; ?>" class="rent_img" alt="">
                                        <div class="botton_rent">
                                            <div class="rent_valor"><?php echo $xDistrito; ?></div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0px;">
                                        <p class="rent_titl"><?php echo $xTitulo; ?></p>
                                        <ul class="rent_list">
                                            <li class="itemc"><i class="fas fa-home"></i> <?php echo $xArea; ?></li>
                                            <li class="itemc"><i class="fas fa-bed"></i> <?php echo $xCuartos; ?> cubiculos</li>
                                            <li class="itemc"><i class="fas fa-shower"></i> <?php echo $xBanos; ?> Baños</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            }
                        ?>
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
                <div class="col-md-9">
                    <div class="owl-tree owl-carousel owl-theme">
                        <?php
                            $consultarInm = "SELECT ci.cod_categoria, ci.categoria, li.cod_lugar, li.lugar, di.cod_distrito, di.distrito, i.* FROM inmuebles_categorias as ci, inmuebles_lugares as li, inmuebles_distritos as di, inmuebles as i WHERE i.cod_categoria=ci.cod_categoria AND i.cod_lugar=li.cod_lugar AND i.cod_distrito=di.cod_distrito AND alquiler='1' ORDER BY orden ASC";
                            $resultadoInm = mysqli_query($enlaces, $consultarInm) or die('Consulta fallida: ' . mysqli_error($enlaces));
                            while($filaInm = mysqli_fetch_array($resultadoInm)){
                                $xCodigo      = $filaInm['cod_inmueble'];
                                $xSlug        = $filaInm['slug'];
                                $xDistrito    = $filaInm['distrito'];
                                $xTitulo      = $filaInm['titulo'];
                                $xImagen      = $filaInm['imagen'];
                                $xArea        = $filaInm['area'];
                                $xCuartos     = $filaInm['cuartos'];
                                $xBanos       = $filaInm['banos'];
                        ?>
                        <a href="/inmueble/<?php echo $xSlug; ?>">
                            <div class="rent_img">
                                <div class="rent_item rent_shadow">
                                    <div class="row" style="margin: 0px;">
                                        <img src="/cms/assets/img/inmuebles/<?php echo $xImagen; ?>" class="rent_img" alt="">
                                        <div class="botton_rent">
                                            <div class="rent_valor"><?php echo $xDistrito ?></div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0px;">
                                        <p class="rent_titl"><?php echo $xTitulo; ?> <br> Precio: $ <?php echo $xPrecio; ?></p>
                                        <ul class="rent_list">
                                            <li class="itemc"><i class="fas fa-home"></i> <?php echo $xArea; ?></li>
                                            <li class="itemc"><i class="fas fa-bed"></i> <?php echo $xCuartos; ?> Cuartos</li>
                                            <li class="itemc"><i class="fas fa-shower"></i> <?php echo $xBanos; ?> Baños</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--card_sale-->
    <br><br><br>
    <!--empresa-->
    <section class="seccion_bg">
        <div class="container-fluid">
            <br><br>
            <?php
                $consultarCon = "SELECT * FROM contenidos WHERE cod_contenido='1'";
                $resultadoCon = mysqli_query($enlaces,$consultarCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
                $filaCon = mysqli_fetch_array($resultadoCon);
                    $xCodigo      = $filaCon['cod_contenido'];
                    $xTitulo      = $filaCon['titulo_contenido'];
                    $xImagen      = $filaCon['img_contenido'];
                    $xContenido   = $filaCon['contenido'];
                    $xEstado      = $filaCon['estado'];
            ?>
            <div class="row">
                <div class="col-md-5">
                    <img src="/cms/assets/img/nosotros/<?php echo $xImagen; ?>" class="img-responsive abt_img">
                </div>
                <div class="col-md-7">
                    <h3 class="about">Nosotros</h3>
                    <p class="abt_nom"><?php echo $xTitulo; ?></p>
                    <br>
                    <div class="art_abt">
                        <?php echo $xContenido; ?>
                    </div>
                    <br><br>
                </div>
            </div>
            <?php
                mysqli_free_result($resultadoCon);
            ?>
        </div>
    </section>
    <!--empresa-->
    <!--Contacto-->
    <section class="cont_bg">
        <div class="container">
            <div class="row">
                <?php
                    $consultarCon = "SELECT * FROM contenidos WHERE cod_contenido='4' AND estado='1'";
                    $resultadoCon = mysqli_query($enlaces,$consultarCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
                    $filaCon = mysqli_fetch_array($resultadoCon);
                        $xTitulo      = $filaCon['titulo_contenido'];
                        $xContenido   = $filaCon['contenido'];
                ?>
                <div class="col-md-4" align="center">
                    <div class="cont_txt2">
                        <i class="fas fa-home fa-5x" style="color: white !important;"></i>
                        <br>
                        <h3 class="opptitle"><?php echo $xTitulo; ?></h3>
                        <br>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                    <div class="cont_txt">
                        <br>
                        <p class="oppmtext" align="left"><?php echo $xContenido; ?></p>
                        <br>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                     <a href="/contacto.php" class="btn btn-defaults btn-lg">Contactanos</a>
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
                    <img src="/images/agent-image-1.png" class="img-responsive for_img hidden-xs">
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="wrap-contact2">
                        <div align="center">
                            <h3 class="for_text">CONT&Aacute;CTANOS</h3>
                            <p class="for_p">Ayudamos a vender tu inmueble</p>
                            <br>
                        </div>
                        <div class="contact2-form validate-form">
                            <div class="wrap-input2 validate-input" data-validate="Nombre requerido">
                                <input class="input2" type="text" id="nombres" name="nombres">
                                <span class="focus-input2" data-placeholder="Nombres"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Correo requerido">
                                <input class="input2" type="text" id="email" name="email">
                                <span class="focus-input2" data-placeholder="Email"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Telefono requerido">
                                <input class="input2" type="text" id="telefono" name="telefono">
                                <span class="focus-input2" data-placeholder="Telefono"></span>
                            </div>
                            <div class="wrap-input2 validate-input" data-validate="Mensaje requerido">
                                <textarea class="input2" id="mensaje" name="mensaje"></textarea>
                                <span class="focus-input2" data-placeholder="Mensaje"></span>
                            </div>
                            <div class="container-contact2-form-btn">
                                <div id="mail-status"></div>
                                <?php $fecha = date("Y-m-d"); ?>
                                <input type="hidden" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $fecha ?>" />
                                <div class="wrap-contact2-form-btn">
                                    <div class="contact2-form-bgbtn"></div>
                                    <button class="contact2-form-btn" name="submit" onClick="sendContact();">Enviar Mensaje</button>
                                </div>
                            </div>
                        </div>
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
            <br>
            <div class="col-md-12">
                <br>
                <div class="row ncard_btn">
                    <?php
                        $consultarNoticias = "SELECT * FROM noticias WHERE estado='1' ORDER BY fecha ASC limit 2";
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
                    <div class="col-md-6">
                        <div class="ncard">
                            <div class="col-md-5 col-sm-5" style="padding: 0px;">
                                <a href="/blog/<?php echo $xSlug; ?>"><img src="/cms/assets/img/noticias/<?php echo $xImagen; ?>" class="ncard_img"></a>
                            </div>
                            <div class="col-md-7 col-sm-7" style="padding: 0px;">
                                <div class="card-block">
                                    <h4 class="ncard-title mt-3"><?php echo $xTitulo; ?></h4>
                                    <?php
                                        $mydate = strtotime($xFecha);
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    ?>
                                    <p class="mcard_p2"><?php echo $meses[date('n', $mydate)-1]." ".date('d', $mydate)." / ".date('Y', $mydate); ?> - por <?php echo $xAutor; ?></p>
                                    <div class="meta">
                                        <p class="mcard_p"><?php 
                                            $xDescripcion_r = strip_tags($xDescripcion);
                                            $strCut = substr($xDescripcion_r,0,100);
                                            $xDescripcion_r = substr($strCut,0,strrpos($strCut, ' ')).'...';
                                            echo strip_tags($xDescripcion_r);
                                        ?></p>
                                    </div>
                                </div>
                                <div class="ncard-footer">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <small class="smtext"><a href="/blog/<?php echo $xSlug; ?>">Leer M&aacute;s...</a></small>
                                        </div>
                                        <div class="col-md-7"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } 
                    ?>
                </div><!--end card-->
                <br>                
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
    <!-- Footer -->
    <!-- Set up your HTML -->
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
    <script>
        function sendContact(){
            var valid;
            valid = validateContact();
            if(valid) {
              jQuery.ajax({
                url: "/contact_form.php",
                data:'nombres='+$("#nombres").val()+'&email='+$("#email").val()+'&telefono='+$("#telefono").val()+'&mensaje='+$("#mensaje").val()+'&fecha_ingreso='+$("#fecha_ingreso").val(),
                type: "POST",
                success:function(data){
                  $("#mail-status").html(data);
                  $("#send").html("");
                },
                error:function (){}
              });
            }
        }
        function validateContact() {
            var valid = true;
            if(!$("#nombres").val()) {
              $("#nombres").css('background-color','#f28282');
              valid = false;
            }
            if(!$("#email").val()) {
              $("#email").css('background-color','#f28282');
              valid = false;
            }
            if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
              $("#email").css('background-color','#f28282');
              valid = false;
            }
            if(!$("#telefono").val()) {
              $("#telefono").css('background-color','#f28282');
              valid = false;
            }
            if(!$("#mensaje").val()) {
              $("#mensaje").css('background-color','#f28282');
              valid = false;
            }
            return valid;
        }
    </script>
</body>
</html>