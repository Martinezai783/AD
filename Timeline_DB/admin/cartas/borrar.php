<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cartas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    </head>
<body>
<?php

require_once("../../dbutils.php");

if(!isset($_POST["mazo"])){

    header("Location: selectMazoBorrar.php");
  
  }

//var_export($_POST);

$con=conectarDB();

?>
<div class="container">
<form method="post" action="borrar.php">
   <h2><?php 

    $mazo = selectMazoById($con,$_POST["mazo"]);
   
    echo 'Seleccione la carta el mazo "'.$mazo[0]["NOMBRE"].'" que desea borrar';
   
   ?></h2>

        <?php 
            
            if(isset($_POST["mazo"]))

            {
            echo '<input type="hidden" name="mazo" value="'.$_POST["mazo"].'">';
            }

        ?>

    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="carta">
    <option selected value="-1">Cartas</option>
    <?php
        $cartas = selectCartas($con,$_POST["mazo"]);

        for ($i = 0; $i<count($cartas); $i++) {

            echo '<option value="'.$cartas[$i]["ID"].'">'.$cartas[$i]["NOMBRE"].' </option>';
            
          }?>
    </select>
  <?php 
        if(isset($_POST["borrar"])){

            if($_POST["carta"] != "-1"){
        
                
                $id = $_POST["carta"];

                $mensaje = borrarCarta($con,$id);

                echo '<div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="'.$mensaje.'" readonly>
                </div>';

            }else{
                echo '<div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="Selecciona una carta para borrar" readonly>
                </div>';
            }}?>

  <input type="submit" value="Borrar mazo" class="btn btn-secondary btn-lg" name="borrar"/>
</form>
</div> 

    
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>     
</body>
</html>

