<?php include("module/conexion.php"); ?>
<?php include("module/verificar.php"); ?>
<?php 
$cod_lugar = $_REQUEST['cod_lugar'];
$eliminar = "DELETE FROM inmuebles_lugares WHERE cod_lugar='$cod_lugar'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:inmuebles-lugares.php");
?>