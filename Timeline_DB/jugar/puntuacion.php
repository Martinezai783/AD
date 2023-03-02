 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiscores' table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </head>
 <body>
    <?php

    if(empty($_POST["puntuacion"])){

        header("Location: dummy.html");
      
      }

      require_once("../dbutils.php");

      $con = conectarDB();
        var_export($_POST);
    
    ?>

    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Jugador</th>
            <th scope="col">Puntuacion</th>
            </tr>

            <?php 
                
                $puntuaciones = selectPuntuaciones($con);

                //$puntuaciones = selectPuntuacionesNombre($con);

                var_export($puntuaciones);

                if($_POST["puntuacion"]>min($puntuaciones))
                {
                    
                }
            ?>

        </thead>
    </div>

 </body>
 </html>