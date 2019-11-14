<?php 
session_id('inventario');
session_start(); 
echo session_name().'<br>'. session_id();
//$_SESSION=array();
?>
<!DOCTYPE html>
<html>
<head>
	<title>INVENTARIO</title>
	<meta charset="utf-8">
</head>
<body>

	<form action="" action="GET">
		<fieldset>
			<legend>Añade producto</legend>
			<label>Código </label>
			<input id="cod" name="codigo" type="text" placeholder="Introduce el código" required>
			<span><?php if (!preg_match("/^[a-zA-Z0-9]*$/", $_GET['codigo'])){
				echo 'Código incorrecto';
			}
			?></span> 
			<br>
			<label>Descripción: </label>
			<textarea id="desc" name="descripcion" type="text" placeholder="Introduce una descripción" required></textarea>
			<span><?php 
			if (!preg_match("/^[a-zA-Z0-9]*$/",$_GET['descripcion'])){
				echo 'Caracteres no permitidos';
			}
			?>

		</span>
		<br>
		<br>
		<label>Precio</label>
		<input id="precio" name="precio" type="number" placeholder="Introduce el precio" required>
		<span><?php 
		if(empty($_GET['precio'])){
			echo 'Precio requerido';
		}?>

	</span>
	<br>
	<br>
	<input type="submit" name="submit" value="Guardar">
</fieldset>
</form>

<div>
	<?php

	/**Comprueba si se ha pulsado el boton submit*/
	if (!empty($_GET["submit"])){
		$codigo=strtoupper($_GET['codigo']);
		$descripcion=strtolower($_GET['descripcion']);
		$precio=$_GET['precio'];
		/**Funcion strtoupper para convertir la cadena "código" a mayusculas */

		if (!empty($_GET['codigo']) && !empty($_GET['descripcion']) && !empty($_GET['precio'])) {
			
			$_SESSION['inventario'][$_GET['codigo']]=[
				'descripcion'=>$_GET['descripcion'],
				'precio'=>$_GET['precio']
			];

			foreach ($_SESSION['inventario'] as $codigo) {
				sort($codigo);
				$clong=count($codigo);

				for($x = 0; $x < $clong; $x++) {
					echo $codigo[$x];
					echo "<br>";
				}
				
			}
			

			
			var_dump($_SESSION['inventario']);
			//var_dump($_GET['codigo']);
			//var_dump(each($_GET['codigo']));
			//echo $_GET['codigo'];
			//echo '<br>';
			//echo $_SESSION['inventario'][$_GET['codigo']]['descripcion'];
			//echo '<br>';
			//echo $_SESSION['inventario'][$_GET['codigo']]['precio'];

		
			/*foreach ($_SESSION['invetario'] as $codigo => $datos){
				echo $codigo;
				foreach ($datos as $key=>$valor) {
					echo $valor;
				}

			} 
			function mostrarDatos($valor, $key){
				echo $key . " -> $valor" . "<br>";
			}

			
			/*foreach ($_SESSION['invetario'] as $codigo =>$detalles) {
				echo '<h1> $codigo </h1>';
				foreach ($detalles as $clave=>$valor) {
					echo '<p> $clave: $valor </p>';
					
				}
				
			}*/

			//array_walk($_SESSION['inventario'][$_GET['codigo']], mostrarDatos);
			

		}

		
		
		

	}

	?>


</div>

</body>
</html>