<?php
	require("./conexion.php");


		$tipoactivador = null;
		$marcaactivador = null;
		$modeloactivador = null;

		$tiposensor = null;
		$idsensor = null;
		$modelosensor = null;
		$marcasensor = null;
		$estacionsensor = null;
		$fechaConfSensor = null;


		$result = mysqli_query($mysqli, "SELECT tipo, marca, modelo FROM Activador WHERE id = '".$_POST["actuador"]."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);
		$tipoactivador = $extraido['tipo'];
		$marcaactivador = $extraido['marca'];
		$modeloactivador = $extraido['modelo'];



		$result = mysqli_query($mysqli, "SELECT `fechaconfigsensor`, `idsensor`, `idtiposensor`, `marcasensor`, `modelosensor`, `idestacion` FROM TipoMedidaSensor WHERE nombre = '".$_POST["medida"]."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);
		$tiposensor = $extraido['idtiposensor'];
		$marcasensor = $extraido['marcasensor'];
		$modelosensor = $extraido['modelosensor'];
		$estacionsensor = $extraido['idestacion'];
		$idsensor = $extraido['idsensor'];
		$fechaConfSensor = $extraido['fechaconfigsensor'];

		$fecha = date('Y-m-j H:i:s');


		$update = "UPDATE `ConfiguracionSensor` SET `fechafinconfig`='".$fecha."' WHERE id='".$id."'";
		$mysqli->query($update);
		
		$insert = "INSERT INTO `ReglaActivacion` (`fecha_creada`, `idactivador`, `tipoactivador`, `marcaactivador`, `modeloactivador`, `periodicidad_incidencia`, `secuencial`, `estado`, `duracion`, `nombremedida`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `observacion`) VALUES ('".$fecha."', '".$_POST["actuador"]."', ".$tipoactivador.", '".$marcaactivador."', '".$modeloactivador."', ".$_POST["incidencia"].", '".$_POST["secuencial"]."', ".$_POST["estado"].", ".$_POST["duracion"].", '".$_POST["medida"]."', '".$fechaConfSensor."', '".$idsensor."', ".$tiposensor.", '".$marcasensor."', '".$modelosensor."', '".$estacionsensor."', '".$_POST["observaciones"]."');";

		$mysqli->query($insert);

		header('Location: ../nuevo.php');

	
?>