      <p><b>Categor&iacute;as</b></p>
      <hr class="hr">
      <?php
        $consultarCategoria = "SELECT * FROM noticias_categorias ORDER BY orden";
        $resultadoCategoria = mysqli_query($enlaces,$consultarCategoria) or die('Consulta fallida: ' . mysqli_error($enlaces));
        while($filaCat = mysqli_fetch_array($resultadoCategoria)){
          $xCodigo    = $filaCat['cod_categoria'];
          $xSlug      = $filaCat['slug'];
          $xCategoria = $filaCat['categoria'];
      ?>
      <p><b><a href="/categorias/<?php echo $xSlug; ?>"><i class="fas fa-arrow-circle-up" style="float: right;"></i> <?php echo $xCategoria; ?></a></b></p>
      <?php 
        }
        mysqli_free_result($resultadoCategoria);
      ?>
      <hr class="hr">