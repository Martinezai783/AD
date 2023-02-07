<?php 


function conectarDB(){
    try{
        $db = new PDO("mysql:host=localhost;dbname=DB_FRUITIS;charset=utf8mb4","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(PDOException $ex){
        echo ("Error al conectar".$ex->getMessage());
    }
}

    function insertarCarta($con,$nombre,$anio,$imagen,$mazo){
        try
  {
    $sql = "INSERT INTO CARTAS(NOMBRE,AÑO,IMAGEN,ID_MAZO) VALUES (:NOMBRE,:AÑO,:IMAGEN,:ID_MAZO)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':NOMBRE', $nombre);
    $stmt->bindParam(':FECHA', $anio);
    $stmt->bindParam(':IMAGEN', $imagen);
    $stmt->bindParam(':ID_MAZO', $mazo);
    $stmt->execute();
   }
  catch (PDOException $ex)
  {
    echo ("Error en insertarCarta".$ex->getMessage());
  }
  return $con->lastInsertId();

    } 

function borrarCarta($con,$id){

        try
        {
          $sql = "DELETE FROM CARTA WHERE ID=:ID";
          $stmt = $con->prepare($sql);
          $stmt->bindParam(':ID', $id);
          $stmt->execute();
          $result = $stmt->rowCount();
         }
        catch (PDOException $ex)
        {
          echo ("Error en borrarCarta
          ".$ex->getMessage());
        }
        return $result;

    }

  function insertarMazo($con,$nombre,$desc){
      try
{
  $sql = "INSERT INTO MAZO(NOMBRE,DESCRIPCION) VALUES (:NOMBRE,:DESCRIPCION)";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':NOMBRE', $nombre);
  $stmt->bindParam(':DESCRIPCION', $desc);
  $stmt->execute();
 }
catch (PDOException $ex)
{
  echo ("Error en insertarMazo".$ex->getMessage());
}
return $con->lastInsertId();

  }

  function borrarMazo($con,$nombre){

    try
    {
      $sql = "DELETE FROM MAZO WHERE NOMBRE=:NOMBRE";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en borrarMazo
      ".$ex->getMessage());
    }
    return $result;

}

  function consultarRanking($con)

  {
    try
    {
      $sql = "SELECT * FROM RANKING LIMIT 10";
      $stmt = $con->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
    }

    catch (PDOException $ex){
      echo ("Error en consultarMazo".$ex->getMessage());
    }
    return $result;
  }

  function insertarPuntuacion($con,$nombre,$points){
    try{
      $sql = "INSERT INTO PUNTUACIONES(NOMBRE,PUNTUACION) VALUES (:NOMBRE,:PUNTUACION)";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->bindParam(':PUNTUACION', $points);
      $stmt->execute();
    }
    catch (PDOException $ex)
    {
      echo ("Error en insertarPuntuacion".$ex->getMessage());
    }
    return $con->lastInsertId();

}


  


?>