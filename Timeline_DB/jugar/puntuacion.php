<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php
    if(!isset($_POST["modificar"])){ 
        header("Location: dummy.php");
    }
    require_once("../dbutils.php");
    $con = conectarDB();
    $idMazo = $_POST["mazo"];
    $nombreJugador = $_POST["nombreJugador"];
    $puntuacion = $_POST["puntuacion"];
    $idPuntuacion = agregarPuntuacion($con, $nombreJugador, $idMazo, $puntuacion);
?>
    <body>
    <div class="container">
        <br>
        <center><h1 style="font-size: 70px;">Puntuaciones</h1></center>
        <br>
        <?php
            // Obtener las puntuaciones de la base de datos
    $puntuaciones = selectPuntuaciones($con);
    // Mostrar las puntuaciones en una tabla HTML
    if ($puntuaciones) {
        echo '<table class="table table-dark table-striped">';
        echo '<thead><tr><th>Posición</th><th>Nombre</th><th>Nombre del Mazo</th><th>Puntuación</th></tr></thead>';
        echo '<tbody>';
        $posicion = 1;
        foreach ($puntuaciones as $puntuacion) {
            echo '<tr>';
            echo '<td>' .  "&nbsp&nbsp&nbsp " .$posicion . '</td>';
            echo '<td>' . $puntuacion['NOMBRE'] . '</td>';
            // Obtenemos el nombre del mazo a través de su id
            echo '<td>' . selectNombreMazo($con, $puntuacion['ID_MAZO']) . '</td>';
            echo '<td>' . $puntuacion['PUNTUACION'] . '</td>';
            echo '</tr>';
            $posicion++;
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron puntuaciones.";
    }
    // Verificar si el jugador está en el top 10
    $top10 = false;
    $posicionJugadorActual = 0;
    foreach ($puntuaciones as $index => $puntuacion){
        if ($puntuacion["ID"] == $idPuntuacion){
            $top10 = true;
            $posicionJugadorActual = $index + 1;
        }
    }
    // Mostrar mensaje de felicitación o de consolación según corresponda
    if ($top10 == true) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Felicidades ' . $nombreJugador . ', estás en la posición ' . $posicionJugadorActual . ' del top 10 de puntuaciones.';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Lo siento ' . $nombreJugador . ', no has entrado al top 10 de puntuaciones.';
        echo '</div>';
    }
?>
    <a href="./dummy.php">
        <button type="button" class="btn btn-secondary btn-lg m-2" style="width: 100%; font-size: 20px">Volver a jugar</button>
    </a>
    <a href="../index.php">
        <button type="button" class="btn btn-secondary btn-lg m-2" style="width: 100%; font-size: 20px">Menú principal</button>
    </a>
</div>
</body>


</html>