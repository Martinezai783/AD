<?php
session_start(); // Iniciar la sesión

// Crear un array con 50 palabras de 2 a 7 letras del diccionario
$palabras = array(
  "arte", "bello", "casa", "dedo", "fuego", "gris", "huevo", "igual",
  "jardin", "largo", "mesa", "nuevo", "oro", "pelo", "queso", "rojo",
  "silla", "torre", "uva", "vino", "yoga", "zorro", "blanco", "crema",
  "delta", "flor", "gato", "hotel", "jugo", "koala", "lapiz", "manzana",
  "nadar", "perro", "queso", "rana", "sol", "tigre", "union", "volar",
  "yegua", "zapato", "brisa", "cielo", "dragon", "espejo", "flecha", "abrigo",
  "heroe", "isla", "jaula", "luna", "monte", "nieve", "opalo", "pulgar"
);

// Verificar si la palabra ya está en la sesión antes de generar una nueva
if (!isset($_SESSION['palabra'])) {
  // Elegir una palabra aleatoria del array
  $palabra_aleatoria = $palabras[array_rand($palabras)];
  $_SESSION["palabra"] = $palabra_aleatoria;

  // Obtener la longitud de la palabra y guardar cada letra y su número en la sesión
  $longitud_palabra = strlen($palabra_aleatoria);
  for ($i = 0; $i < $longitud_palabra; $i++) {
    $letra = $palabra_aleatoria[$i];
    $numero_letra = $i + 1;
    $_SESSION["letra$numero_letra"] = $letra;
  }
}

var_export($_SESSION);

// Generar inputs para cada letra de la palabra
echo "<form method='post' action='main.php'>";
$longitud_palabra = strlen($_SESSION["palabra"]);
for ($i = 0; $i < $longitud_palabra; $i++) {
  $numero_letra = $i + 1;
  echo "<input type='text' name='letra$numero_letra' placeholder='Letra $numero_letra' ";
  if (isset($_SESSION["letra$numero_letra" . "_introducida"])) {
    echo "value='{$_SESSION["letra$numero_letra" . "_introducida"]}'";
  }
  echo "maxlength='1 '>";
}
echo "<button type='submit' name='guardar'>Guardar</button>";
echo '<input type="submit" name="eliminar_session" value="Eliminar sesión">';
echo "</form>";

// Obtener los valores introducidos y guardarlos en un array en la sesión
if (isset($_POST['guardar'])) {
  $longitud_palabra = strlen($_SESSION["palabra"]);
  for ($i = 0; $i < $longitud_palabra; $i++) {
    $numero_letra = $i + 1;
    $letra_introducida = $_POST["letra$numero_letra"];
    $_SESSION["letra$numero_letra" . "_introducida"] = $letra_introducida;
  }
}
?>
<form method="post" action="">
  
</form>

<?php
if (isset($_POST['eliminar_session'])) {
  // Eliminamos la sesión
  session_unset();
  session_destroy();
}
?>