<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <!-- The above 3 meta tags *must* come first in the head -->

	<title>Opp - Vista</title>
	<meta charset="UTF-8">
	<meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link rel=”canonical” href=””/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

  <!-- twitter card starts from here, if you don't need remove this section -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@yourtwitterusername" />
  <meta name="twitter:creator" content="@yourtwitterusername" />
  <meta name="twitter:url" content="http://yourdomain.com" />
  <meta name="twitter:title" content="Your home page title, max 140 char" /> <!-- maximum 140 char -->
  <meta name="twitter:description" content="Your site description, maximum 140 char " /> <!-- maximum 140 char -->
  <meta name="twitter:image" content="assets/img/twittercardimg/twittercard-280-150.jpg" />  <!-- when you post this page url in twitter , this image will be shown -->
  <!-- twitter card ends from here -->

  <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
  <meta property="og:title" content="Your home page title" />
  <meta property="og:url" content="http://your domain here.com" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:site_name" content="Your site name here" />
  <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
  <meta property="og:type" content="website" />
  <meta property="og:image" content="assets/img/opengraph/fbphoto.jpg" /> <!-- when you post this page url in facebook , this image will be shown -->
  <!-- facebook open graph ends from here -->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

  <!-- fontawason-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" >

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/util.css"/> -->
  <link rel="stylesheet" href="css/main.css"/>
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '261767897755680'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=261767897755680&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


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

    <!--formulario-->
    <section class="for_bg">
        <div class="container-fluid" id="formulario">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <img src="images/agent-image-1.png" class="img-responsive for_img">
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

    <!--cintillo-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 bg_con" align="center">

            <h3 class="for_w">Dirrección: Calle Aldabas Nº.559 oficina 403 Surco - Lima, Peru</h3>
            
          </div>
        </div>
      </div>
    <!--cintillo-->

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.184647155321!2d-77.02152004930426!3d-12.099508391390115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871aeb024b9%3A0x858d2d926451337!2sAv.+Rep%C3%BAblica+de+Panam%C3%A1+3564%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1527892951935"  height="620" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>

    <!--footer-->
    <section style="background-color: #fff">
    <br><br><br><br><br><br><br><br>
    </section>
    <footer class="page-footer">
              <div class="container" align="center">
                <div class="row">
                  <div class="col-md-12">
                    <img src="imgweb/logosvgwhite.svg" class="img-responsive abt_img2 hidden-xs ">
                    <img src="imgweb/logo_svg.svg" class="img-responsive abt_img2 hidden-sm hidden-md hidden-lg">
                    <p class="grey-text text-lighten-4 text_foot img_foo foo_bt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                      <div class="row img_foo">
                        <a href="https://www.linkedin.com/company/update-global-marketing" target="_blank"><span class="social"> <i class="fab fa-linkedin-in"></i></span></a>
                        <a href="https://www.facebook.com/updatemarketing/" target="_blank"><span class="social"> <i class="fab fa-facebook-f"></i></span></a>
                        <a href="https://www.instagram.com/update.pe/" target="_blank"><span class="social"> <i class="fab fa-instagram"></i></span></a>
                         
                      </div>
                  </div>
                </div>
              </div>
              <div class="footer-copyright bgfoote">
                <div class="container" style="font-size: 10px;">
                    <div class="row">
                        <div class="col-md-12" align="center">
                             <p class="foo_bt">Update Global Marketing © | info@update.pe </p>   
                        </div>
                    </div>
                </div>
              </div>
    </footer>
    <!--footer-->    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/owl.carousel.min.js"></script>
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


