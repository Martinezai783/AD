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

require_once("../dbutils.php");

//var_export($_POST);

$con=conectarDB();

?>
<div class="container">
<h2><?php 

$mazo = selectMazoById($con,$_POST["mazo"]);

echo 'Seleccione la carta el mazo "'.$mazo[0]["NOMBRE"].'" que desea modificar';

?></h2>
    </select>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Cartas</option>
      <?php
        $cartas = selectCartas($con,$_POST["mazo"]);

        for ($i = 0; $i<=count($cartas); $i++) {

            echo '<option value="'.$cartas[$i]["ID"].'">'.$cartas[$i]["NOMBRE"].' </option>';
            
          }?>
  </select>
  
    <button type="button" class="btn btn-secondary btn-lg">Modificar carta</button>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</div>      
</body>
</html>
