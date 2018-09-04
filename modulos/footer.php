    <footer class="page-footer">
        <div class="container" align="center">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $consultarCon = "SELECT * FROM contenidos WHERE cod_contenido='2'";
                        $resultadoCon = mysqli_query($enlaces,$consultarCon) or die('Consulta fallida: ' . mysqli_error($enlaces));
                        $filaCon = mysqli_fetch_array($resultadoCon);
                            $xImagen      = $filaCon['img_contenido'];
                            $xContenido   = $filaCon['contenido'];
                    ?>
                    <img src="/cms/assets/img/nosotros/<?php echo $xImagen; ?>" class="img-responsive abt_img2 hidden-xs" />
                    <?php
                        $consultarMet = 'SELECT * FROM metatags';
                        $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
                        $filaMet = mysqli_fetch_array($resultadoMet);
                            $xLogo      = $filaMet['logo'];
                    ?>
                    <img src="/cms/assets/img/meta/<?php echo $xLogo; ?>" class="img-responsive abt_img2 hidden-sm hidden-md hidden-lg">
                    <?php
                        mysqli_free_result($resultadoMet);
                    ?>
                    <p class="grey-text text-lighten-4 text_foot img_foo foo_bt"><?php echo $xContenido; ?></p>
                    <?php
                        mysqli_free_result($resultadoCon);
                    ?>
                    <div class="row img_foo">
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
                        <a href="/<?php echo $xLinks; ?>" target="_blank"><span class="social"><i class="fab <?php echo $xValor; ?>"></i></span></a>
                        <?php
                          }
                          mysqli_free_result($resultadoSol);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright bgfoote">
            <div class="container" style="font-size: 10px;">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <p class="foo_bt">Update Global Marketing &copy; | info@update.pe </p>   
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/npm.js"></script>
    <script src="/js/owl.carousel.min.js"></script>