<?php
$zona = $_GET['zona'];
$estado = $_GET['estado'];
require("./conexion.php");
mysqli_query($mysqli, " UPDATE Activador SET estado=".$estado." WHERE idzona = '".$zona."'");

if ($estado==1) {
	$result = mysqli_query($mysqli, "SELECT `id`,`tipo`,`marca`,`modelo` FROM `Activador` WHERE idzona=".$zona."' ");
	mysqli_data_seek ($result, 0);
	$extraido= mysqli_fetch_array($result);
	$id = $extraido['id'];
	$tipo = $extraido['tipo'];
	$marca = $extraido['marca'];
	$modelo = $extraido['modelo'];

	$result = mysqli_query($mysqli, "SELECT `fecha_creada` FROM `ReglaActivacion` WHERE `idactivador`='".$id."' ");
	mysqli_data_seek ($result, 0);
	$extraido= mysqli_fetch_array($result);

	$fechaCreada = $extraido['fecha_creada'];

	$fecha = date('Y-m-j H:i:s');
	mysqli_query($mysqli, "INSERT INTO `Activacion` (`fechahora`, `fecharegla`, `idactivador`, `tipoactivador`, `marcaactivador`, `modeloactivador`, `zona`) VALUES ('".$fecha."', '".$fechaCreada."', '".$id."', '".$tipo."', '".$marca."', '".$modelo."', '".$zona."')");
}

header('Location: ./../index.php');
?>