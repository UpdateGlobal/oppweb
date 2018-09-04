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
              
              $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_categoria=$xCodigo AND estado='1'";
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){}else{ ?>
          <li><a href="/inmuebles-categorias/<?php echo $xSlug; ?>"><?php echo $xCategoria; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
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

              $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_lugar=$xCodigo AND estado='1'";
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){}else{ ?>
          <li><a href="/inmuebles-lugares/<?php echo $xSlug; ?>"><?php echo $xLugar; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
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
              $xSlug      = $filaDis['slug'];
              $xDistrito  = $filaDis['distrito'];

              $consultaInmueble = "SELECT * FROM inmuebles WHERE cod_distrito=$xCodigo AND estado='1'";
              $resultadoInmueble = mysqli_query($enlaces,$consultaInmueble);
              $numinmuebles = mysqli_num_rows($resultadoInmueble);
          ?>
          <?php if($numinmuebles==0){ }else{ ?>
          <li><a href="/inmuebles-distritos/<?php echo $xSlug; ?>"><?php echo $xDistrito; ?><span class="list_inm">(<?php echo $numinmuebles; ?>)</span></a></li>
          <?php } ?>
          <?php
            }
            mysqli_free_result($resultadoDistrito);
          ?>
        </ul>