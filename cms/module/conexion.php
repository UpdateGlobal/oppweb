<?php 
/*$enlaces = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'update_oppweb') or die('No se pudo seleccionar la base de datos');*/

$enlaces = mysqli_connect('localhost', 'opp_update', 'BP3UTjahsU{R') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'opp_update') or die('No se pudo seleccionar la base de datos');

?>