<?php
session_start();

$tableroOld = $_SESSION["tablero"];

unset($_SESSION["tablero"]);

$valorCartaNueva = $_SESSION["mano"][$_SESSION["seleccion"]];

$tableroOld[]=$valorCartaNueva;

sort($tableroOld);

$_SESSION["tablero"]= $tableroOld;

array_splice($_SESSION["mano"],$_SESSION["seleccion"], 1);


if(empty($_SESSION["mano"])){
    echo header("Location:enhorabuena.php");
}

else{ echo header("Location:mano.php");}

?>