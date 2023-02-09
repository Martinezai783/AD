<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    </head>
<body>

    <?php

    require_once("../dbutils.php");

    var_export($_POST);

    $con=conectarDB();

    ?>


<div class="container">
    <h1>Agregar</h1>
    <form method="post" action="agregar.php">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" name="">Nombre del mazo </span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            name="nombre">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Descripcion </span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            name="descripcion">
        </div>
        <?php 
        if(isset($_POST["crear"])){

            if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"])){
        
                $nombre = $_POST["nombre"];
        
                $descripcion = $_POST["descripcion"];

                $mensaje = insertarMazo($con,$nombre,$descripcion);


                echo '<div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="'.$mensaje.'" readonly>
                </div>';
            }else{
                echo '<div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default" name="">Alerta</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="Faltan Datos." readonly>
                </div>';
            }


        }?>
        <input type="submit" class="btn btn-secondary btn-lg" value="Crear mazo" name="crear"/>
        
    </form>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</div>      
</body>
</html>
