<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php 
$cod_distrito = $_REQUEST['cod_distrito'];
$eliminar = "DELETE FROM inmuebles_distritos WHERE cod_distrito='$cod_distrito'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:inmuebles-distritos.php");
?>