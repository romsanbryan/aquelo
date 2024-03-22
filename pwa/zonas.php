<?php
include("./includes/header.html");
require("./services/conexion.php");
$zona = $_GET['zona']; 

$result = mysqli_query($mysqli, "SELECT `estado` FROM `Activador` where idzona = '".$zona."'");
mysqli_data_seek ($result, 0);
$extraido= mysqli_fetch_array($result);
$estado = $extraido['estado'];

$result = mysqli_query($mysqli, "SELECT  `valor` FROM MedidaSensor m INNER JOIN TipoMedidaSensor t ON m.`idsensor` = t.idsensor INNER JOIN Sensor s ON s.id = t.idsensor WHERE s.idzona =  '".$zona."' ORDER BY fecha_medida DESC");
mysqli_data_seek ($result, 0);
$extraido= mysqli_fetch_array($result);
$humedad = $extraido['valor'];
?>
  
<div class="container-fluid text-center">    
  <div class="row">
    <div class="col-md-12"> 
		<h2>
			<div class="col-md-5 ">
				Humedad de la tierra <?php echo $humedad;?>
			</div>
			<div class=" col-md-offset-4 col-md-3">
				Activar humedad 
				<label class="switch">
					<?php if ($estado==1): ?>
						<input type="checkbox" onclick="location.href='./services/actualizariego.php?estado=0&zona=<?php echo $zona; ?>'"  checked>
					<?php else: ?>
						<input type="checkbox" onclick="location.href='./services/actualizariego.php?estado=1&zona=<?php echo $zona; ?>'">
					<?php endif ?>
					<span class="slider round"></span>
				</label>
			</div>
		</h2>
	</div>

    <div class="col-md-12">   
    	<hr>  
      		<form action="./services/actualizarCanales.php" method="POST">
			<div class="col-md-6 text-left"> 
				<?php if ($zona=="ZONA_1"): ?>
					<div style="height: 300px; background-image: url('./resources/plantas1.jpg');background-repeat: no-repeat;padding-top: 35%;">
					<?php $cultivo = "Hierbabuena"?>
					</div>
				<?php else: ?>
					<?php if ($zona=="ZONA_2"): ?>
						<div style="height: 300px; background-image: url('./resources/plantas2.jpg');background-repeat: no-repeat;padding-top: 35%;">
							<?php $cultivo = "Fresas"?>
						</div>
					<?php else: ?>
						<div style="height: 300px; background-image: url('./resources/plantas3.jpg');background-repeat: no-repeat;padding-top: 35%;">
							<?php $cultivo = "Tomates"?>
						</div>
					<?php endif ?>
				<?php endif ?>

			</div>
			<strong>
				<div class="col-md-6">
				<h4><?php echo $zona?></h4>
				<div class="col-md-6 text-left"> Cultivo: <?php echo $cultivo?></div>
				<div class="col-md-6 text-right"> 
					<?php
						$result = mysqli_query($mysqli, "SELECT fechahora FROM Activacion WHERE zona = '".$zona."'");
						mysqli_data_seek ($result, 0);
						$extraido= mysqli_fetch_array($result);
						echo "Último riego: ".$extraido['fechahora']."<br>";
					?>
				</div>
				</div>
			</strong>
			<div class="col-md-6">
				<hr>
				<div class="col-md-6 text-left"> 
					<div>
						<?php
						$result = mysqli_query($mysqli, "SELECT Sensor.id, Sensor.tipo, Sensor.marca, Sensor.modelo, Sensor.idestacion, ConfiguracionSensor.altura, ConfiguracionSensor.fechahora, Sensor.potencia_soportada, Sensor.canal FROM Sensor, ConfiguracionSensor WHERE idzona = '".$zona."' and Sensor.id = ConfiguracionSensor.id ");
						mysqli_data_seek ($result, 0);
						$extraido= mysqli_fetch_array($result);
						echo "<h3>Sensor: ".$extraido['id']."</h3>";
						echo "Tipo: ".$extraido['tipo']."<br>";
						echo "Marca: ".$extraido['marca']."<br>";
						echo "Modelo: ".$extraido['modelo']."<br>";
						echo "Estacion: ".$extraido['idestacion']."<br>";
						echo "Canal: <input type='text' name='canalSensor' value='".$extraido['canal']."' size='4'><br>";
						echo "Altura: ".$extraido['altura']."<br>";
						echo "Potencia: ".$extraido['potencia_soportada']."<br>";
						echo "Fecha Configuracion: ".$extraido['fechahora']."<br>";
					?>	
					</div>
				</div>
				<div class="col-md-6 text-left">
					<div>
						<?php
						require("./services/conexion.php");
						$result = mysqli_query($mysqli, "SELECT `id`,`tipo`,`marca`,`modelo`,`tipo_comunicacion`,`canal`,`estado`,`potencia_soportada` FROM `Activador` where idzona = '".$zona."' ");
						mysqli_data_seek ($result, 0);
						$extraido= mysqli_fetch_array($result);
						echo "<h3>Activador: ".$extraido['id']."</h3>";
						echo "Tipo: ".$extraido['tipo']."<br>";
						echo "Marca: ".$extraido['marca']."<br>";
						echo "Modelo: ".$extraido['modelo']."<br>";
						echo "Potencia: ".$extraido['potencia_soportada']."<br>";
						echo "Canal: <input type='text' name='canalActuador' value='".$extraido['canal']."' size='4'><br>";
						echo "Comunicacion: ".$extraido['tipo_comunicacion']."<br>";
					?>	
					</div>
				</div>
				<div class=" col-md-offset-10 col-md-2"> 
					<input type="hidden" name="zona" value=<?php echo $zona ?>>
					<input type="submit" value="Guardar cambios">
				</div>
			</div>
		</form>
    </div>
</div></div></p>
<?php
  include("./includes/footer.html");
?>