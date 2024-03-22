<?php

require("./conexion.php");
mysqli_query($mysqli, "CREATE EVENT `".$_POST["nombre"]."` ON SCHEDULE AT '".$_POST["FI"]."' ON COMPLETION PRESERVE ENABLE COMMENT  '".$_POST["observacionesEvento"]."' DO UPDATE  `Activador` SET  `estado` =1 WHERE  `id` =  '".$_POST["actuador"]."'");

mysqli_query($mysqli, "CREATE EVENT `".$_POST["nombre"]."` ON SCHEDULE AT '".$_POST["FF"]."' ON COMPLETION PRESERVE ENABLE COMMENT  '".$_POST["observacionesEvento"]."' DO UPDATE  `Activador` SET  `estado` =0 WHERE  `id` =  '".$_POST["actuador"]."'");

header('Location: ./../index.php');

?>