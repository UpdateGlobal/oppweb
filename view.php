<?php include("cms/module/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("modulos/head.php"); ?>
</head>
<body>
  <?php include('modulos/nav.php'); ?>
  <!--finder-->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12">
        <p class="branch">Inicio > Ventas </p>
      </div>
      <div class="col-md-2 col-xs-12" style="float: right;">
        <div class="wrap-input2 validate-input">
          <input class="input2" type="text" name="find">
          <span class="focus-input2" data-placeholder=""><i class="fas fa-search"></i></span>
        </div>
      </div>
    </div>
  </div>
  <!-- end finder-->
  <!--view-->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <p><b>Filtrar B&uacute;squeda</b></p>
        <hr class="hr">

        <p><b>Inmuebles</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>

          <li>Departamentos<span class="list_inm"> (12)</span></li>
          
        </ul> 
        
        <p><b>Lugar</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>
          
          <li>Lima <span class="list_inm"> (123)</span></li>
        
        </ul> 
        
        <p><b>Distrito</b><i class="fas fa-arrow-circle-up" style="float: right;"></i></p>
        <ul>
        
          <li>Miraflroes <span class="list_inm"> (12)</span></li>
        
        </ul>

      </div>
      <div class="col-md-8">

        <!--item inmueble-->
        <div class="ncard">
          <div class="col-md-5" style="padding: 0px;">
            <img src="images/edificio234.jpg" class="ncard_img2">
          </div>
          <div class="col-md-7" style="padding: 0px;">
            <div class="card-block">
              <h4 class="ncard-title mt-3">Edificio en Lima Perú.</h4>
              <p class="mcard_p2"> Mayo 22 / 2018 - by Luis bernal</p>
              <div class="meta">
                <p class="mcard_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of.</p>
              </div>
            </div>
            <div class="ncard-footer">
              <div class="row">
                <div class="col-md-5">
                  <small class="smtext"><a href="inmueble.php?cod_inmueble=">Ver Inmueble</a></small>
                </div>
                <div class="col-md-7"></div>
              </div> 
            </div>
          </div>
        </div>
        <!--item inmueble-->

      </div>
    </div>
  </div>
  <!--end view-->
  <!--footer-->
  <section style="background-color: #fff">
    <br><br><br><br><br><br><br><br>
  </section>
  <?php include("modulos/footer.php"); ?>
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

