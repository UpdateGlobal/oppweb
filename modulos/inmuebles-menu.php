        <p><b>Filtrar B&uacute;squeda</b></p>
        <hr class="hr">
        <p><b>Inmuebles</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>
          <?php
            $consultarCategoria = "SELECT * FROM inmuebles_categorias ORDER BY orden";
            $resultadoCategoria = mysqli_query($enlaces,$consultarCategoria) or die('Consulta fallida: ' . mysqli_error($enlaces));
            while($filaCat = mysqli_fetch_array($resultadoCategoria)){
              $xCodigo    = $filaCat['cod_categoria'];
              $xSlug      = $filaCat['slug'];
              $xCategoria = $filaCat['categoria'];
              
              if($xTipox=="1"){
                $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_categoria=$xCodigo AND tipo='1' AND estado='1'";
              }else{
                if($xAlquilerx=="0"){
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_categoria=$xCodigo AND venta='1' AND estado='1'";
                }else{
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_categoria=$xCodigo AND alquiler='1' AND estado='1'";
                }
              }
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){}else{ ?>
          <?php if($xTipox=="1"){ ?>
          <li><a href="/proyectos-categorias/<?php echo $xSlug; ?>"><?php echo $xCategoria; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <?php if($xAlquilerx==0){ ?>
          <li><a href="/ventas-categorias/<?php echo $xSlug; ?>"><?php echo $xCategoria; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <li><a href="/alquiler-categorias/<?php echo $xSlug; ?>"><?php echo $xCategoria; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php } ?>
          <?php } ?>
          <?php } ?>
          <?php 
            }
            mysqli_free_result($resultadoCategoria);
          ?>
        </ul>
        <p><b>Lugar</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>
          <?php
            $consultarLugar = "SELECT * FROM inmuebles_lugares ORDER BY orden";
            $resultadoLugar = mysqli_query($enlaces,$consultarLugar) or die('Consulta fallida: ' . mysqli_error($enlaces));
            while($filaLug = mysqli_fetch_array($resultadoLugar)){
              $xCodigo    = $filaLug['cod_lugar'];
              $xSlug      = $filaLug['slug'];
              $xLugar     = $filaLug['lugar'];

              if($xTipox=="1"){
                $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_lugar=$xCodigo AND tipo='1' AND estado='1'";
              }else{
                if($xAlquilerx=="0"){
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_lugar=$xCodigo AND venta='1' AND estado='1'";
                }else{
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_lugar=$xCodigo AND alquiler='1' AND estado='1'";
                }
              } 
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){}else{ ?>
          <?php if($xTipox=="1"){ ?>
          <li><a href="/proyectos-lugares/<?php echo $xSlug; ?>"><?php echo $xLugar; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <?php if($xAlquilerx==0){ ?>
          <li><a href="/ventas-lugares/<?php echo $xSlug; ?>"><?php echo $xLugar; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <li><a href="/alquiler-lugares/<?php echo $xSlug; ?>"><?php echo $xLugar; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php } ?>
          <?php } ?>
          <?php } ?>
          <?php
            }
            mysqli_free_result($resultadoLugar);
          ?>
        </ul>
        <p><b>Distrito</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>
          <?php
            $consultarDistrito = "SELECT * FROM inmuebles_distritos ORDER BY orden";
            $resultadoDistrito = mysqli_query($enlaces,$consultarDistrito) or die('Consulta fallida: ' . mysqli_error($enlaces));
            while($filaDis = mysqli_fetch_array($resultadoDistrito)){
              $xCodigo    = $filaDis['cod_distrito'];
              $xDistrito  = $filaDis['distrito'];
              $xSlug      = $filaDis['slug'];

              if($xTipox=="1"){
                $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_distrito=$xCodigo AND tipo='1' AND estado='1'";
              }else{
                if($xAlquilerx=="0"){
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_distrito=$xCodigo AND venta='1' AND estado='1'";
                }else{
                  $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_distrito=$xCodigo AND alquiler='1' AND estado='1'";
                }
              }
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){}else{ ?>
          <?php if($xTipox=="1"){ ?>
          <li><a href="/proyectos-distritos/<?php echo $xSlug; ?>"><?php echo $xDistrito; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <?php if($xAlquilerx==0){ ?>
          <li><a href="/ventas-distritos/<?php echo $xSlug; ?>"><?php echo $xDistrito; ?> <span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php }else{ ?>
          <li><a href="/alquiler-distritos/<?php echo $xSlug; ?>"><?php echo $xDistrito; ?> <span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php } ?>
          <?php } ?>
          <?php } ?>
          <?php
            }
            mysqli_free_result($resultadoDistrito); 
          ?>
        </ul>