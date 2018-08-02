<?php 
$enlaces = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'update_oppweb') or die('No se pudo seleccionar la base de datos');

/*$enlaces = mysqli_connect('localhost', 'kqwelwsz_oppweb', 'W_}3ak-$XGJ]') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'kqwelwsz_oppweb') or die('No se pudo seleccionar la base de datos');*/

?>