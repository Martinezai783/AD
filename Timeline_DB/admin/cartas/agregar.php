<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agragar Carta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    </head>
<body>
<?php

require_once("../../dbutils.php");

//var_export($_POST);

$con=conectarDB();

?>
<div class="container">
    <h1>Agregar Carta</h1>
    <form action="agregar.php" method="post" enctype="multipart/form-data">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="mazo">
        <option selected value=-1>Selecione un mazo</option>

        <?php
        $mazos = selectMazos($con);

        for ($i = 0; $i<count($mazos); $i++) {

            echo '<option value="'.$mazos[$i]["ID"].'">'.$mazos[$i]["NOMBRE"].' </option>'; 
          }
        ?>  
    </select>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="fecha" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Descripcion </span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="descripcion" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Imagen </label>
        <input class="form-control" type="file" id="imagen  " name="imagen" required>
    </div>

    <?php 
        if(isset($_POST["crear"])){

            if($_POST["mazo"] != "-1"){

                $target_dir = "../imagenes/";
                $target_file = $target_dir.basename($_FILES["imagen"]["name"]);

            

                if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)){

                    $fecha=$_POST["fecha"];

                    $descripcion = $_POST["descripcion"];

                    $imagen = $target_file;

                    $mazo = $_POST["mazo"];

                    $mensaje = insertarCarta($con, $descripcion, $fecha, $imagen, $mazo);


                    echo '<div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Alerta</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                    value="'.$mensaje.'" readonly>
                    </div>';

                } else {

                    echo '<div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Alerta</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                    value="Error al cargar la imagen al servidor." readonly>
                    </div>';

                };

            }else{
                echo '<div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="Seleccione el mazo donde quiere insertar la carta" readonly>
                </div>';
            };

        }?>

    <input type="submit" class="btn btn-secondary btn-lg" name="crear" value="Crear carta"/>

    </form>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</div>      
</body>
</html>
