<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<center><img src="./img/wordleLogo.png"></center>
<?php
session_start();

// Si no hay una palabra incógnita almacenada en la sesión, elige una nueva
if (!isset($_SESSION['word'])) {
  $words = $words = array(
    "ala", "arte", "azul", "barco", "bello", "blanco", "bola",
    "bueno", "casa", "cena", "cerdo", "clase", "coche", "coco", "color", "correr",
    "crema", "dado", "diente", "dinero", "diván", "dulce", "eje", "fama", "fiesta",
    "flor", "gato", "goma", "gris", "hacha", "hacer", "hora", "joven", "juego",
    "lago", "lápiz", "largo", "letra", "libro", "lista", "llama", "luz", "mano",
    "mesa", "mina", "mono", "mundo", "nido", "oro"
  );
  $_SESSION['word'] = $words[array_rand($words)];
  $_SESSION['guesses'] = 0;
}
// Separa la palabra incógnita en letras individuales
$word = str_split($_SESSION['word']);
$length = count($word);
// Si el jugador envió un intento de adivinar la palabra
if (isset($_POST['guess'])) {
  // Incrementa el contador de intentos
  $_SESSION['guesses']++;

  // Separa la palabra intentada en letras individuales
  $guess = str_split(strtolower($_POST['guess']));

  // Compara las letras una por una
  $result = "";
  for ($i = 0; $i < $length; $i++) {
    if ($guess[$i] == $word[$i]) {
      $result .= "<span style='color: green; text-size:'20px''>{$guess[$i]}</span>";
    } elseif (in_array($guess[$i], $word)) {
      $result .= "<span style='color: yellow;'>{$guess[$i]}</span>";
    } else {
      $result .= "<span style='color: grey;'>{$guess[$i]}</span>";
    }
  }

  // Muestra el resultado al jugador
  echo "<center><p><font size='3'>Intento # {$_SESSION['guesses']}:</font><font size='5'> {$result}</font></p></center><br>";

  // Si el jugador adivinó la palabra
  if ($guess == $word) {
    echo "<center><p><font size='4'>¡Felicidades! Adivinaste la palabra en {$_SESSION['guesses']} intentos.<br>";
    echo "La palabra era: {$_SESSION['word']}</font></p><br>";
    echo "<form><input type='submit' value='Jugar de nuevo'></form>";
    // Elimina la palabra de la sesión para que comience un nuevo juego
    unset($_SESSION['word']);
  } else {
    // Si el jugador agotó sus intentos
    if ($_SESSION['guesses'] == 6) {
      echo "<center><p><font size='4'>Lo siento, agotaste tus 6 intentos.<br>";
      echo "La palabra era: {$_SESSION['word']}</font></p><br>";
      echo "<form><input type='submit' value='Jugar de nuevo'></form></center>";
      // Elimina la palabra de la sesión para que comience un nuevo juego
      unset($_SESSION['word']);
    } else {
      // Muestra el formulario para que el jugador intente adivinar de nuevo
      echo "<center><form method='post' style='font-size: 20px;'><input type='text' name='guess' maxlength='{$length}' pattern='[a-zA-Z]{{$length}}' required>";
      echo "<input type='submit' value='Adivinar'></form></center>";
    }
  }
} else {
  // Muestra el formulario para que el jugador intente adivinar por primera vez
  echo "<center><form method='post' style='font-size: 20px;'><input type='text' name='guess' maxlength='{$length}' pattern='[a-zA-Z]{{$length}}' required>";
  echo "<input type='submit' value='Adivinar'></form></center>";
}
