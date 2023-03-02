<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cartas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    </head>
<body>
<?php

require_once("../../dbutils.php");

if(!isset($_POST["mazo"]) && !isset($_POST["modificar"])){

  header("Location: selectMazoModificar.php");

}

//var_export($_POST);

$con=conectarDB();?>
<div class="container">

<h2><?php 

$mazo = selectMazoById($con,$_POST["mazo"]);

echo 'Modificando cartas del mazo "'.$mazo[0]["NOMBRE"].'"';

?></h2>
    
    <form action="modificar.php" method="post" enctype="multipart/form-data">

    <?php 
    
      if(isset($_POST["mazo"]))

      {
        echo '<input type="hidden" name="mazo" value="'.$_POST["mazo"].'">';
      }

    ?>
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="carta">
          <option selected value=-1>Selecione una carta</option>
            <?php
              $cartas = selectCartas($con,$_POST["mazo"]);

              for ($i = 0; $i<count($cartas); $i++) {

                  echo '<option value="'.$cartas[$i]["ID"].'">'.$cartas[$i]["NOMBRE"].' </option>';
                  
            }?>
        </select>
        <label for="floatingSelect">Cartas</label>
      </div>
<br/>
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
        if(isset($_POST["modificar"])){

            if($_POST["carta"] != "-1"){

                $target_dir = "../imagenes/";
                $target_file = $target_dir.basename($_FILES["imagen"]["name"]);

            

                if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)){

                    $carta = $_POST["carta"];

                    $fecha=$_POST["fecha"];

                    $descripcion = $_POST["descripcion"];

                    $imagen = $target_file;

                    $mazo = $_POST["mazo"];

                    $mensaje = modificarCarta($con, $carta, $descripcion, $fecha, $imagen, $mazo);


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
                value="Seleccione la carta que quiere modificar" readonly>
                </div>';
            };

        }?>
  
    <input type="submit" class="btn btn-secondary btn-lg" name="modificar" value="Modificar carta"/>

    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</div>      
</body>
</html>
