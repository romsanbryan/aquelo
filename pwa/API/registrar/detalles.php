<?
	
// http://aquelo.romsanbryan.x10host.com/API/registrar/SH1/20
		require("../../services/conexion.php");
		$fecha = date('Y-m-j H:i:s');


		list($m1, $m2, $m3) = explode("$", $_GET['peticion']);


// ====================================== medida 1
		list($nombre, $valor) = explode(",", $m1);

		$result = mysqli_query($mysqli, "SELECT * FROM TipoMedidaSensor where nombre ='".$nombre."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);


		$consulta = "INSERT INTO `MedidaSensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('".$fecha."', '".$nombre."', '".$extraido['fechaconfigsensor']."', '".$extraido['idsensor']."', ".$extraido['idtiposensor'].", '".$extraido['marcasensor']."', '".$extraido['modelosensor']."', '".$extraido['idestacion']."', '".$valor."');";


		if ($mysqli->connect_errno) {
		    printf("Conexión fallida: %s\n", $mysqli->connect_error);
		    exit();
		}

		if ($resultado = $mysqli->query($consulta)) {
				$mostrar[] = "si";
			
		}else{
				$mostrar[] = "no";
		}






// ====================================== medida 2
		list($nombre, $valor) = explode(",", $m2);

		$result = mysqli_query($mysqli, "SELECT * FROM TipoMedidaSensor where nombre ='".$nombre."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);


		$consulta = "INSERT INTO `MedidaSensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('".$fecha."', '".$nombre."', '".$extraido['fechaconfigsensor']."', '".$extraido['idsensor']."', ".$extraido['idtiposensor'].", '".$extraido['marcasensor']."', '".$extraido['modelosensor']."', '".$extraido['idestacion']."', '".$valor."');";


		if ($mysqli->connect_errno) {
		    printf("Conexión fallida: %s\n", $mysqli->connect_error);
		    exit();
		}

		if ($resultado = $mysqli->query($consulta)) {
				$mostrar[] = "si";
			
		}else{
				$mostrar[] = "no";
		}


// ====================================== medida 3
		list($nombre, $valor) = explode(",", $m3);

		$result = mysqli_query($mysqli, "SELECT * FROM TipoMedidaSensor where nombre ='".$nombre."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);


		$consulta = "INSERT INTO `MedidaSensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('".$fecha."', '".$nombre."', '".$extraido['fechaconfigsensor']."', '".$extraido['idsensor']."', ".$extraido['idtiposensor'].", '".$extraido['marcasensor']."', '".$extraido['modelosensor']."', '".$extraido['idestacion']."', '".$valor."');";


		if ($mysqli->connect_errno) {
		    printf("Conexión fallida: %s\n", $mysqli->connect_error);
		    exit();
		}

		if ($resultado = $mysqli->query($consulta)) {
				$mostrar[] = "si";
			
		}else{
				$mostrar[] = "no";
		}



	print_r($mostrar);


?>