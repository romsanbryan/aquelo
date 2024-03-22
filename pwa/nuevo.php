<?php
include("./includes/header.html");
require("./services/conexion.php");
?>

<div class="container-fluid">    
  <div class="row">
    <div class="col-md-5">
	    <h1 style="text-align: center;"> Nueva regla</h1>
		<form action="./services/nuevaRegla.php" method="POST">
			Medida <input type="text" name="medida">	<br>

			Actuador <input type="text" name="actuador">	<br>
			
			Periocidad de incidencia: <input type="number" name="incidencia" value="0">	<br>

			Secuencial: <input type="number" name="secuencia" value="0">	<br>

			Estado: <input type="number" name="estado" value="0" max="1" min="0">	<br>

			Duracion: <input type="number" name="duracion" value="0" > minutos <br>

			Observaciones:<br><textarea rows="10" name="observaciones"></textarea><br>
			<input type="submit" value="Registrar regla">
		</form>
	</div>
	
	<div class="col-md-1" style="border-left:1px solid #000;height:400px;"></div>

	 <div class="col-md-5 text-left">
		<h1 style="text-align: center;"> Nuevo Calendario</h1>
		<form action="./services/evento.php" method="POST">
			Actuador: <input type="text" name="actuador" value="0"> <br>
			Fecha Inicio: <input type="datetime-local" name="FI">	<br>

			Fecha Fin: <input type="datetime-local" name="FF">	<br>

			Nombre: <input type="text" name="nombre" value="0"> <br>

			Observaciones:<br><textarea rows="10" name="observacionesEvento"></textarea><br>
			<input type="submit" value="Registrar calendario">
		</form>
	</div>
  </div>
</div>


<?php
include("./includes/footer.html");
?>