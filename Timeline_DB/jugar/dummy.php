<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Mazo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
</head>
<body>
<?php

require_once("../dbutils.php");

$con=conectarDB();

?>
<div class="container">
	<center>
	<h1 style="font-size: 70px;">JUGAR</h1>	<h2>Introduce tus datos</h2><br>
	</center>
    <form method="post" action="puntuacion.php">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="mazo" id="mazo">
        <option selected value="-1">Elige un mazo:</option>
        <?php
        $mazos = selectMazos($con);

        for ($i = 0; $i<count($mazos); $i++) {

            echo '<option value="'.$mazos[$i]["ID"].'">'.$mazos[$i]["NOMBRE"].' </option>';
            
          }
    ?>
    </select>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Introduce tu nombre: </span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombreJugador" id="nombreJugador">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Introduce tu puntuacion: </span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="puntuacion" id="puntuacion">
    </div>
	<center>
    <button type="submit" class="btn btn-secondary btn-lg" name="modificar" id="enviar">GO!</button>
    <div id="mensaje-error" style="color: red;"></div>
	</center>
    </form>
	
<script>
document.getElementById("enviar").addEventListener("click", function(event) {
    var mazo = document.getElementById("mazo").value;
    var nombreJugador = document.getElementById("nombreJugador").value;
    var puntuacion = document.getElementById("puntuacion").value;
    if (mazo == "-1" || nombreJugador == "" || puntuacion == "") {
        event.preventDefault();
        document.getElementById("mensaje-error").innerHTML = '<br><div class="input-group mb-3"><span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"value="Faltan Datos" readonly></div>'
    }
});
</script>
</div>
</body>
</html>
