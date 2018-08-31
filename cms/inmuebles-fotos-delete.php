<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php 
$cod_foto = $_REQUEST['cod_foto'];
$cod_inmueble = $_REQUEST['cod_inmueble'];

$eliminar = "DELETE FROM inmuebles_fotos WHERE cod_foto='$cod_foto'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:inmuebles-fotos-nuevo.php?cod_inmueble=$cod_inmueble");
?>