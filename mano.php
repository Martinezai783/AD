<script src="mano.js"></script>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles_mano.css"> 
</head>
    
<?php

    session_start();

    if(isset($_SESISON["seleccion"]))
    {
        unset($_SESISON["seleccion"]);
    }

    if(!isset($_SESSION["mazo"]))
    {
    $_SESSION["mazo"] = ["0476","1492","1785","1883","1933","1940","1945","1945a","1961","1975","1984","1984a",
                         "1989","2001","2003","2006","2007","2017","2019","2022"];
    }
  
    function RandomUnico($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
   
    if(!isset($_SESSION["mano"]))
    {
        
        for($i=0; $i<3;$i++){
            $valoresMano = RandomUnico(0,(count($_SESSION["mazo"])-1),1);

            $_SESSION["mano"][$i] = $_SESSION["mazo"][$valoresMano[0]];

            array_splice($_SESSION["mazo"],$valoresMano[0], 1);
        }

       
        
    }
    
?>


<body>
<div class="margenes">
<form method="POST" action="tablero.php">

    <div class="header-botones">
        <br><br>
        <h2>Timeline</h2>
    </div>
    <div class="contenedor">

    
        <div class="grupo-cartas">
            <?php
            for($i=0; $i<count($_SESSION["mano"]);$i++){
                echo '<div class="input-carta">
                    <input type="radio" name="carta" value='.$i.' onclick="habilitarJugar()">
                    <div class="carta-display">
                        <img src="./img_mano/'.$_SESSION["mano"][$i].'.png" width="120px" height="165px"/>
                    </div>
                </div>';
                }
            ?>
        
        </div>
    </div>

    <div class="header-botones">
        <button class="jugar" id=boton-jugar disabled="true">Jugar</button>
        
    </div>

</form>
    <div class="header-botones">
        <button id="boton-ver" onclick="location.href='tablero.php'"><span>Ver Tablero</span></button>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

</body>