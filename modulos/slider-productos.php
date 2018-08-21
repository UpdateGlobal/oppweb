            <div class="ma-featuredproductslider-container">
                <div class="container">
                    <div class="ma-featured-sldier-title ma-title">
                        <h1>Smartphones al mejor precio</h1>
                    </div>
                    <div class="row">
                        <ul class="owl">
                            <?php 
                                $consultarPro = "SELECT * FROM productos WHERE estado='1' ORDER BY orden ASC";
                                $resultadoPro = mysqli_query($enlaces, $consultarPro);
                                while($filaPro = mysqli_fetch_array($resultadoPro)){
                                    $xCodProc        = $filaPro['cod_producto'];
                                    $xCodCatc        = $filaPro['cod_categoria'];
                                    $xCodSubCatc     = $filaPro['cod_sub_categoria'];
                                    $xCodSubSubCatc  = $filaPro['cod_sub_subcategoria'];
                                    $xSlugp          = $filaPro['slug'];
                                    $xNomProb        = $filaPro['nom_producto'];
                                    $xDisponibilidad = $filaPro['disponibilidad'];
                                    $xDescuento      = $filaPro['descuento'];
                                    $xPrecioO        = number_format($filaPro['precio_oferta'],2);
                                    $xPrecioN        = number_format($filaPro['precio_normal'],2);
                                    $xPromocion      = $filaPro['promocion'];
                                    $xFecha          = $filaPro['fecha_ing'];
                                    $xImagen         = $filaPro['imagen'];
                            ?>
                            <li class='featuredproductslider-item item'>
                                <div class="item-inner">
                                    <div class="ma-box-content">
                                        <div class="products">
                                            <?php
                                                if($xDescuento==""){
                                                }else{ 
                                            ?>
                                            <span class='label-pro-sale'><?php echo $xDescuento; ?></span>
                                            <?php } ?>
                                            <?php
                                                $today = date("Y-m-d");
                                                if($xFecha == $today){
                                            ?>
                                            <div class="label-pro-new"><span>Hoy</span></div>
                                            <?php
                                                }else{ }
                                            ?>
                                            <a href="/producto/<?php echo $xSlugp; ?>"><img src="/cms/assets/img/productos/<?php echo $xImagen; ?>" /></a>
                                        </div>
                                        <div class="des">
                                            <h2 class="product-name">
                                                <a href="/producto/<?php echo $xSlugp; ?>"><?php echo $xNomProb; ?></a>
                                            </h2>
                                            <div class="price-box">
                                            <?php if($xPrecioO=="0.00"){ ?>
                                                <p class="special-price">
                                                    <span class="price">S/. <?php echo $xPrecioN; ?></span>
                                                </p>
                                            <?php }else{ ?>
                                                <p class="old-price">
                                                    <span class="price">S/. <?php echo $xPrecioN; ?></span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price">S/. <?php echo $xPrecioO; ?></span>
                                                </p>
                                            <?php } ?>
                                            </div>
                                            <div class="actions">
                                                <form name="fcarrito<?php echo $xCodProcs; ?>" action="/verificar.php" method="post">
                                                    <input type="hidden" name="cantidad" value="1" />
                                                    <input type="hidden" name="cod_producto" value="<?php echo $xCodProc; ?>" />
                                                    <input type="hidden" name="cod_categoria" value="<?php echo $xCodCatc; ?>" />
                                                    <input type="hidden" name="cod_sub_categoria" value="<?php echo $xCodSubCatc; ?>" />
                                                    <input type="hidden" name="cod_sub_subcategoria" value="<?php echo $xCodSubSubCatc; ?>" />
                                                    <button type="input" title="Agregar al Carrito" class="button btn-cart"><span><span>Agregar al Carrito</span></span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                                }
                                mysqli_free_result($resultadoPro);
                            ?>
                        </ul>
                    </div>
                </div>

                <script type="text/javascript">
                    $jq(document).ready(function() {
                        $jq(".ma-featuredproductslider-container .owl").owlCarousel({
                            autoPlay: true,
                            items: 4,
                            itemsDesktop: [1199, 4],
                            itemsDesktopSmall: [980, 3],
                            itemsTablet: [767, 2],
                            itemsMobile: [479, 1],
                            slideSpeed: 3000,
                            paginationSpeed: 3000,
                            rewindSpeed: 3000,
                            navigation: false,
                            stopOnHover: true,
                            pagination: false,
                            scrollPerPage: true,
                        });
                    });
                </script>
            </div>