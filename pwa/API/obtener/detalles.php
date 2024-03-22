<?
	//header('Content-Type: application/json');
	require("../../services/conexion.php");


	// Mostramos estados
	function estado_Activador($detalle){

		//http://aquelo.romsanbryan.x10host.com/API/obtener/estados/DST_RL_1

		require("../../services/conexion.php");


			$consulta = "SELECT Activador.estado, ReglaActivacion.duracion FROM `Activador`, ReglaActivacion WHERE Activador.id = ReglaActivacion.idactivador and Activador.id='".$detalle."'";

		if ($resultado = $mysqli->query($consulta)) {
			while ($fila = $resultado->fetch_row()) {
				$mostrar[] = $fila;
			}
			$resultado->close();
		}
		return $mostrar;


		/*
		require("../../services/conexion.php");

			$consulta = "SELECT Activador.estado FROM Activador, ReglaActivacion WHERE Activador.id = ReglaActivacion.idactivador ";
	

		if ($resultado = $mysqli->query($consulta)) {
			while ($fila = $resultado->fetch_row()) {
				$mostrar[] = $fila;
			}
			$resultado->close();
		}
		return $mostrar;*/
	}


	// Mostramos sensores
	function mostrar_Sensor($detalle){
		require("../../services/conexion.php");

		if($detalle == "lista"){
			$consulta = "SELECT * FROM Sensor, ConfiguracionSensor WHERE Sensor.id = ConfiguracionSensor.id";
		}else{
			$consulta = "SELECT * FROM Sensor, ConfiguracionSensor WHERE Sensor.id = ConfiguracionSensor.id AND Sensor.id = '".$detalle."'";
		}
		if ($resultado = $mysqli->query($consulta)) {
			while ($fila = $resultado->fetch_row()) {
				$mostrar[] = $fila;
			}
			$resultado->close();
		}
		return $mostrar;
	}


	// Mostramos actuadores
	function mostrar_Actuador($detalle){
		require("../../services/conexion.php");

		if($detalle == "lista"){
			$consulta = "SELECT * FROM Actuador";
		}else{
			$consulta = "SELECT * FROM Actuador where id ='".$detalle."'";
		}
		if ($resultado = $mysqli->query($consulta)) {
			while ($fila = $resultado->fetch_row()) {
				$mostrar[] = $fila;
			}
			$resultado->close();
		}
		return $mostrar;
	}


		// Mostramos activadores
	function mostrar_Activador($detalle){
		require("../../services/conexion.php");

		if($detalle == "lista"){
			$consulta = "SELECT * FROM Activador";
		}else{
			$consulta = "SELECT * FROM Activador where id ='".$detalle."'";
		}
		if ($resultado = $mysqli->query($consulta)) {
			while ($fila = $resultado->fetch_row()) {
				$mostrar[] = $fila;
			}
			$resultado->close();
		}
		return $mostrar;
		$mysqli->close();
	}
	
	// Peticiones
	if ($_GET['peticion']=="sensor") {
		$resultados = mostrar_Sensor($_GET['detalle'] );
	}else if ($_GET['peticion']=="actuador") {
		$resultados = mostrar_Actuador($_GET['detalle'] );
	}else if ($_GET['peticion']=="activador") {
		$resultados = mostrar_Activador($_GET['detalle'] );
	}else if ($_GET['peticion']=="estados") {
		$resultados = estado_Activador($_GET['detalle']);
	}else{
		$resultados = "Error con la peticion";
	}

	$mysqli->close();





		if ($_GET['peticion']=="estados") {
			   	foreach($resultados as $item){

			   			echo $item[0].",".$item[1]; // Su valor
			   		

			   	} 



} else {


	include("../../includes/header.html");
	//print_r($resultados);

echo '<div class="container-fluid">    
  <div class="row">
    <div class="col-md-12">';
	   	//print_r( $resultados );
		if ($_GET['peticion']=="actuador") {
		echo '<div class="col-md-6 text-right">
				ID:<br>
				Nombre: <br>
				Tipo:<br>
				Marca: <br>		
				Modelo:<br>
				Zona: <br>
				</div>
				<div class="col-md-6">';
			   	foreach($resultados as $item){
			   		foreach($item as $key => $value){
			   			echo $value."<br>"; // Su valor
			   		}
			   	} 
		echo '</div>
			</div>
		  </div>
		</div>';
		}

		if ($_GET['peticion']=="activador") {
		echo '<div class="col-md-6 text-right">
				ID:<br>
				Tipo: <br>
				Marca:<br>
				Modelo: <br>		
				Comunicacion:<br>
				Canal: <br>
				Estado:<br>
				Potencia: <br>		
				Zona:<br>
				Observaciones: <br>
				</div>
				<div class="col-md-6">';
			   	foreach($resultados as $item){
			   		foreach($item as $key => $value){
			   			echo $value."<br>"; // Su valor
			   		}
			   	} 
		echo '</div>
			</div>
		  </div>
		</div>';
		}

		if ($_GET['peticion']=="sensor") {
		echo '<div class="col-md-6 text-right">
				ID:<br>
				Tipo: <br>
				Marca:<br>
				Modelo: <br>		
				Estacion:<br>
				Observacion: <br>
				Comunicacion:<br>
				Integracion: <br>		
				Canal:<br>
				Estado: <br>
				Potencia:<br>
				Zona: <br>

				Fecha de configuracion:<br>
				ID: <br>
				Tipo:<br>
				Marca: <br>
				Modelo: <br>		
				Estacion:<br>
				Altura:<br>
				Calibracion: <br>
				Offset: <br>		
				Slope:<br>
				Fecha Fin:<br>
				</div>
				<div class="col-md-6">';
			   	foreach($resultados as $item){
			   		foreach($item as $key => $value){
			   			echo $value."<br>"; // Su valor
			   		}
			   	} 
		echo '</div>
			</div>
		  </div>
		</div>';
		}








	include("../../includes/footer.html");
	# code...
}
?>