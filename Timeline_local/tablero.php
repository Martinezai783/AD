<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
		var tablero = localStorage.getItem("timeline").split('-');

$(function(){
			
$.ajax({
			url:"tablero.php",
			method:"get",
			data: tablero,
			success: function(res){
				console.log(res);
			}
		});
});
	</script>
<body>
	<?php 
	session_start();

	function RandomUnico($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
   
    if(!isset($_SESSION["tablero"]))
    {
		$valorTablero = RandomUnico(0,(count($_SESSION["mazo"])-1),1);
		
       $_SESSION["tablero"][0] = $_SESSION["mazo"][$valorTablero[0]];

	   array_splice($_SESSION["mazo"],$valorTablero[0], 1);
    }


	if(isset($_POST["carta"]))
	{
		$_SESSION["seleccion"] = $_POST["carta"];
	}
		
	?>

	

	<div class="header-botones">
		<button id="boton-volver" onclick="location.href='mano.php'"><span>Volver</span></button>
		<button id="boton-confirmar" disabled='true' onclick="clickConfimar()">Confirmar</button>
		<button id="boton-cerrar" onclick="location.href='closedSession.php'">Cerrar Sesión</button>
	</div>	

	<div class="timeline">
		<div class="timeline-lista">
		<h1>TIME LINE</h1>	
            <center>
			<div class="lista" id="lista">
                <?php 
					
	
					for($i=0; $i<count($_SESSION["tablero"]);$i++)
					{
					  echo '<div class="carta" data-id='.$_SESSION["tablero"][$i].'>
								<img src="./img_tablero/'.$_SESSION["tablero"][$i].'.png"
								width="120px" height="165px"/>
							</div>';
					}
				
				?>
				

				
			</div>
            </center>
		</div>
	</div>
    <center>
    <div class="cartaSeleccionada" <?php if(empty($_POST)) echo "hidden"?>>
        <div class="cartaSeleccionada-lista">
			<h1>TU CARTA
			</h1>
            <div id="tucarta">
                <div class="tucarta" data-id='<?php echo $_SESSION["mano"][$_POST["carta"]]?>'>
				<img src="./img_mano/<?php echo $_SESSION["mano"][$_POST["carta"]]?>.png" width="120px" height="165px">
				</div>
            </div>
        </div>
    </div>
    </center> 
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
	<script src="main.js"></script>
</body>
</html>