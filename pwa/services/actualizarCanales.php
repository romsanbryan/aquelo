<?php
$canalSensor = $_POST["canalSensor"];
$canalActuador = $_POST["canalActuador"];
$zona = $_POST["zona"];

require("./conexion.php");
mysqli_query($mysqli, "UPDATE Activador SET canal=".$canalActuador." WHERE idzona = '".$zona."'");
mysqli_query($mysqli, "UPDATE Sensor SET canal =  '".$canalSensor."' WHERE idzona =  '".$zona."'");


header('Location: ./../index.php');
?>