<?php 
session_start();

unset($_SESSION);

session_destroy();

//echo ("sesión destruida");

    echo header("Location:mano.php")

?>
