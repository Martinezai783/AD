<?php
session_start();

function RandomUnico($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$tableroOld = $_SESSION["tablero"];

unset($_SESSION["tablero"]);

$valorCartaNueva = $_SESSION["mano"][$_SESSION["seleccion"]];

$tableroOld[]=$valorCartaNueva;

sort($tableroOld);

$_SESSION["tablero"]= $tableroOld;

$valorCartaRobada = RandomUnico(0,(count($_SESSION["mazo"])-1),1);


     $_SESSION["mano"][$_SESSION["seleccion"]] = $_SESSION["mazo"][$valorCartaRobada[0]];

    array_splice($_SESSION["mazo"],$valorCartaRobada[0], 1);
        

    if(empty($_SESSION["mazo"])){
        echo header("Location:gameover.php");
    }
    
    else{ echo header("Location:mano.php");}
    

?>