<?php 


function conectarDB(){
    try{
        $db = new PDO("mysql:host=localhost;dbname=db_timeline;charset=utf8mb4","root","");
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
    $sql = "INSERT INTO CARTA(NOMBRE,AÑO,IMAGEN,ID_MAZO) VALUES (:NOMBRE,:AÑO,:IMAGEN,:ID_MAZO)";
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
          echo ("Error en borrarCarta".$ex->getMessage());
        }
        return "Carta ".$result." borrada.";

    }

    function selectMazos($conDb)
    {
      try
      {
        $sql = "SELECT * FROM MAZO";
        $stmt = $conDb->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
       }
      catch (PDOException $ex)
      {
        echo ("Error selectMazos".$ex->getMessage());
      }
      return $data;
    }


    function selectMazoById($conDb,$id)
    {
      try
      {
        $sql = "SELECT * FROM MAZO WHERE ID=:id";
        $stmt = $conDb->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
       }
      catch (PDOException $ex)
      {
        echo ("Error selectMazos".$ex->getMessage());
      }
      return $data;
    }
    
    function selectCartas($conDb,$id)
    {
      try
      {
        $sql = "SELECT * FROM CARTA WHERE ID_MAZO=:id";
        $stmt = $conDb->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
       }
      catch (PDOException $ex)
      {
        echo ("Error selectCarta".$ex->getMessage());
      }
      return $data;
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
return "Mazo ".$con->lastInsertId()." insertado con éxito.";

  }


  function modificarMazo($con,$id,$descripcion){
    $result =0;
    try
    {
      $sql = "UPDATE MAZO SET DESCRIPCION=:descripcion WHERE ID=:id";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':id', $id,PDO::PARAM_STR);
      $stmt->bindParam(':descripcion', $descripcion,PDO::PARAM_STR); 
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo".$ex->getMessage());
    }
    return $result." mazo modificado.";
  }


  function borrarMazo($con,$id){

    try
    {
      $sql = "DELETE FROM MAZO WHERE ID=:id";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en borrarMazo
      ".$ex->getMessage());
    }
    return $result."mazo/s borrados";

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