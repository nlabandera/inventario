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
	<div>
		<form action="" action="GET">
			<fieldset>
				<legend>Añade producto</legend>
				<label>Código </label>
				<input id="cod" name="codigo" type="text" placeholder="Introduce el código" required>
				<span><?php 
							if (!preg_match("/^[a-zA-Z0-9]*$/", $_GET['codigo'])){
								echo 'Código incorrecto';
							}
						?>
						
				</span> 
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
				<input id="precio" name="precio" type="number" placeholder="Introduce el precio" >
				<br>
				<br>
				<input type="submit" name="submit" value="Guardar">
			</fieldset>
		</form>
	</div>

<div>
	<?php
	/**Comprueba si se ha pulsado el boton submit*/
	if (!empty($_GET["submit"])){
		/**Funcion strtoupper para convertir la cadena "código" a mayusculas */
		$codigo=strtoupper($_GET['codigo']);
		/**Funcion strtolower para convertir la cadena "descripcion" a minusculas */
		$descripcion=strtolower($_GET['descripcion']);
		$precio=$_GET['precio'];
		

		if (!empty($codigo) and preg_match("/^[a-zA-Z0-9]*$/", $codigo) and !empty($descripcion) and preg_match("/^[a-zA-Z0-9]*$/", $descripcion)){

			if (array_key_exists($codigo, $_SESSION['inventario']) and $precio=='-1') {
					unset($_SESSION['inventario'][$codigo]);
					
					foreach ($_SESSION['inventario'] as $codigo=>$detalles) {
						echo $codigo.'<br>';
				
						foreach ($detalles as $clave=>$info) {
						echo $clave.':'. $info .'<br>';
					
						}
				
					}
			}
			

			$_SESSION['inventario'][$codigo]=[
				'descripcion'=>$descripcion,
				'precio'=>$precio
			];

			foreach ($_SESSION['inventario'] as $codigo=>$detalles) {
				echo $codigo.'<br>';
				
				foreach ($detalles as $clave=>$info) {
					echo $clave.':'. $info .'<br>';
					
				}
				
			}
			
			
			//var_dump($_SESSION['inventario']);
			
		}
		

	}
	//session_destroy();

	?>


</div>

</body>
</html>