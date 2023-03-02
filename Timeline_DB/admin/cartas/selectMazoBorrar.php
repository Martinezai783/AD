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

//var_export($_POST);

$con=conectarDB();

?>
<div class="container">
<form method="post" action="borrar.php">
   <h1>Selecione el Mazo del cual quiere borrar cartas</h1>
   <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="mazo">
    <?php
        $mazos = selectMazos($con);

        for ($i = 0; $i<count($mazos); $i++) {

            echo '<option value="'.$mazos[$i]["ID"].'">'.$mazos[$i]["NOMBRE"].' </option>';
            
          }


    ?>
  </select>

  <input type="submit" value="Seleccionar Mazo" class="btn btn-secondary btn-lg"/>

</form>
</div>
</body>
</html>