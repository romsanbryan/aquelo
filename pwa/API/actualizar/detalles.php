<?
	
// http://aquelo.romsanbryan.x10host.com/API/registrar/SH1/20
		require("../../services/conexion.php");

		$consulta = "UPDATE `Activador` SET `estado` = '".$_GET['detalle']."' WHERE `Activador`.`id` = '".$_GET['peticion']."' AND `Activador`.`tipo` = 3 AND `Activador`.`marca` = 'Omron' AND `Activador`.`modelo` = 'G3MB-202P';";

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