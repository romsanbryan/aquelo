<?php
  include("./includes/header.html");
  require("./services/conexion.php");
  

?>
  
<div class="container-fluid text-center">    
  <div class="row">
    <div class="col-md-12">     
      <a href="./zonas.php?zona=ZONA_1">
        <div class=" col-md-offset-1 col-md-4 col-md-offset-1 zona" style="background-image: url('./resources/plantas1.jpg');background-repeat: no-repeat;"> 
          <h3 style="color: black;">ZONA 1</h3>
          <a href="./API/obtener/actuador/DST_EV_1">
          <?php
            $result = mysqli_query($mysqli, "SELECT `estado` FROM `Activador` where id = 'DST_RL_1'");
            mysqli_data_seek ($result, 0);
            $extraido= mysqli_fetch_array($result);
            $estado = $extraido['estado'];
            if ($estado==0) {
              echo '
                <div class="actuador" style="color: black;float:right;"></div>';
            } else {
              echo '
                <div class="actuador" style="background-color: red; color: black;float:right;></div>';
            }
          ?>
          </a>
          <a href="./API/obtener/sensor/DST_HT_1">
            <div class="sensor" style="color: black;float: right; margin-top: 40%; margin-right: -20%;"></div>
          </a>
        </div>
      </a>
    
      <a href="./zonas.php?zona=ZONA_2">
        <div class=" col-md-offset-1 col-md-4 col-md-offset-1 zona" style="background-image: url('./resources/plantas2.jpg'"> 
          <h3 style="color: black;">ZONA 2</h3>
          <a href="./API/obtener/actuador/DST_EV_2">
          <?php
            $result = mysqli_query($mysqli, "SELECT `estado` FROM `Activador` where id = 'DST_RL_2'");
            mysqli_data_seek ($result, 0);
            $extraido= mysqli_fetch_array($result);
            $estado = $extraido['estado'];
            if ($estado==0) {
              echo '
                <div class="actuador" style="color: black; float:left;"></div>';
            } else {
              echo '
                <div class="actuador" style="background-color: red; color: black;float:left;"></div>';
            }
          ?>
          </a>
          <a href="./API/obtener/sensor/DST_HT_2">
            <div class="sensor" style="color: black;margin-top: 40%;float:left;margin-left: -20%;"></div>
          </a>
        </div>
      </a>
    </div>

    <div class="col-md-12">
      <a href="./zonas.php?zona=ZONA_3">
        <div class=" col-md-offset-1 col-md-4 col-md-offset-1 zona" style="background-image: url('./resources/plantas3.jpg'"> 
          <h3 style="color: black;">ZONA 3</h3>
          <a href="./API/obtener/actuador/DST_EV_3">
          <?php
            $result = mysqli_query($mysqli, "SELECT `estado` FROM `Activador` where id = 'DST_RL_3'");
            mysqli_data_seek ($result, 0);
            $extraido= mysqli_fetch_array($result);
            $estado = $extraido['estado'];
            if ($estado==0) {
              echo '
                <div class="actuador" style="color: black;float: right;"></div>';
            } else {
              echo '
                <div class="actuador" style="color: black;background-color: red;float: right;"></div>';
            }
          ?>
          </a>
          <a href="./API/obtener/sensor/DST_HT_3">
            <div class="sensor" style="color: black;float: right; margin-top: 40%; margin-right: -20%;"></div>
          </a>
        </div>
      </a>

      <div class=" col-md-offset-1 col-md-4 col-md-offset-1 arduino">
 
        <h3>Arduino</h3>
        <a href="./API/obtener/activador/DST_RL_1">
          <div class="activador">
          <span style="background-color: black; padding: 1px">1</span>
          </div>
        </a>
        <a href="./API/obtener/activador/DST_RL_2">
          <div class="activador">
            <span style="background-color: black; padding: 1px">2</span>
          </div>
        </a>
        <a href="./API/obtener/activador/DST_RL_3">
          <div class="activador">
            <span style="background-color: black; padding: 1px">3</span>
          </div>
        </a>

      </div>


      <div class=" col-md-offset-1 col-md-4 col-md-offset-1 bomba">
        <h3><i class="fa fa-tint" style="size: 100%;"></i> Bomba de agua</h3>
        
      </div>
    </div>

  </div>

</div>

<?php
  include("./includes/footer.html");
?>