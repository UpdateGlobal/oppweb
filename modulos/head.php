	<meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <!-- The above 3 meta tags *must* come first in the head -->
	<?php
    $consultarMet = 'SELECT * FROM metatags';
    $resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaMet = mysqli_fetch_array($resultadoMet);
      $xCodigo    = $filaMet['cod_meta'];
      $xLogo      = $filaMet['logo'];
      $xTitulo    = $filaMet['titulo'];
      $xSlogan    = $filaMet['slogan'];
      $xDes       = $filaMet['description'];
      $xKey       = $filaMet['keywords'];
      $xIco       = $filaMet['ico'];
  ?>
  <title><?php echo $xTitulo; ?><?php if($xSlogan==""){ echo " | ".$xSlogan; } ?></title>
	<meta name="description" content="<?php echo $xDes; ?>" />
  <meta name="keywords" content="<?php echo $xKey; ?>" />
  <!-- Favicon -->
	<link href="/cms/assets/img/meta/<?php echo $xIco; ?>" rel="shortcut icon"/>
  <?php
    mysqli_free_result($resultadoMet);
  ?>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet" />

  <!-- fontawason-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="/css/style.css"/>
  <!-- <link rel="stylesheet" href="css/util.css"/> -->
  <link rel="stylesheet" type="text/css" href="/css/main.css"/>
  <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css"/>
  <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css"/>
  <link rel="stylesheet" type="text/css" href="/css/custom.css"/>

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
    <img height="1" width="1" src="https://www.facebook.com/tr?id=261767897755680&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->