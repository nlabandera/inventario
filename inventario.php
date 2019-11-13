<?php 
session_id('inventario');
session_start(); 
echo session_name().'<br>'. session_id();
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
			<input id="cod" name="cod" type="text" placeholder="Introduce el código" required>
			<span style="color: red"><?php if (!preg_match("/^[a-zA-Z0-9]*$/",$_GET['cod'])){
					echo 'Código incorrecto';
				}
			?>
				
			</span> 
			<br>
			<label>Descripción: </label>
			<textarea id="desc" name="desc" type="text" placeholder="Introduce una descripción" required></textarea>
			<span><?php 
				if (!preg_match("/^[a-zA-Z0-9]*$/",$_GET['desc']) ){
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
				}
			 ?>
				
			</span>
			<br>
			<br>
			<input type="submit" name="submit" value="Guardar">
		</fieldset>
	</form>

	<div>
		<?php

		/**Comprueba si se ha pulsado el boton submit*/
		if (isset($_GET["submit"])){
			/**Funcion strtoupper para convertir la cadena "código" a mayusculas */
			$codigo=strtoupper($_GET['cod']);
			$descripcion=strtolower($_GET['desc']);
			$precio=$_GET['precio'];

			$_SESSION['inventario'][$codigo] = $descripcion;

			foreach($_SESSION['inventario'] as $codigo => $descripcion)
					echo '<div><span>'.$codigo.'</span><span>'.$descripcion.'</span></div>';

			//$_SESSION['inventario']=$codigo;

			//echo $codigo;	
		}

		?>


	</div>

</body>
</html>