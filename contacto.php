<?php include("cms/module/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("modulos/head.php"); ?>
    <meta property="og:title" content="<?php echo $xTitulo; ?><?php if($xSlogan==""){ echo " | ".$xSlogan; } ?>" />
    <meta property="og:description" content="<?php echo $xDes; ?>" />
    <meta property="og:image" content="<?php echo $xUrl; ?>/cms/assets/img/meta/<?php echo $xFace1; ?>" />
    <meta property="og:image" content="<?php echo $xUrl; ?>/cms/assets/img/meta/<?php echo $xFace2; ?>" />
  </head>
  <body>
    <?php include("modulos/nav.php"); ?>
    <!--formulario-->
    <section class="for_bg">
      <div class="container-fluid" id="formulario">
        <div class="row">
          <div class="col-md-6 col-xs-12 hidden-sm hidden-xs">
            <img src="images/agent-image-1.png" class="img-responsive for_img">
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
    <!--cintillo-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 bg_con" align="center">
          <?php
            $consultarCot = 'SELECT * FROM contacto';
            $resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
            $filaCot  = mysqli_fetch_array($resultadoCot);
              $xDirection   = $filaCot['direction'];
          ?>
          <h3 class="for_w">Dirrecci&oacute;n: <?php echo $xDirection; ?></h3>
          <?php mysqli_free_result($resultadoCot); ?>
        </div>
      </div>
    </div>
    <!--cintillo-->
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