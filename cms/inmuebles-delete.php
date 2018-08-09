<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php 
$cod_inmueble = $_REQUEST['cod_inmueble'];
$eliminar = "DELETE FROM inmuebles WHERE cod_inmueble='$cod_inmueble'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:inmuebles.php");
?>