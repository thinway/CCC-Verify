<?php
$entidad = $oficina = $dc = $cuenta = ""; 
if ( $_GET ) {
	if ( isset( $_GET['entidad']) ) {
		$entidad = htmlspecialchars($_GET['entidad'], ENT_QUOTES, 'UTF-8');
	}
	if ( isset( $_GET['oficina']) ) {
		$oficina = htmlspecialchars($_GET['oficina'], ENT_QUOTES, 'UTF-8');
	}
	if ( isset($_GET['dc']) ) {
		$dc = htmlspecialchars($_GET['dc'], ENT_QUOTES, 'UTF-8');
	}
	if ( isset($_GET['cuenta']) ) {
		$cuenta = htmlspecialchars($_GET['cuenta'], ENT_QUOTES, 'UTF-8');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Código CCC</title>
</head>
<body>
	<h2>Introduzca su código CCC:</h2>
	<form action="" method="POST">
		<div>
			<label for="entidad">Entidad:
				<input type="text" name="entidad" value="<?=$entidad?>">
			</label>
		</div>
		<div>
			<label for="oficina">Oficina: 
				<input type="text" name="oficina" value="<?=$oficina?>">
			</label>
		</div>
		<div>
			<label for="dc">DC: 
				<input type="text" name="dc" value="<?=$dc?>">
			</label>
		</div>
		<div>
			<label for="cuenta">Cuenta:
				<input type="text" name="cuenta" value="<?=$cuenta?>">
			</label>
		</div>
		<div>
			<input type="submit" value="Verificar">
		</div>
	</form>
</body>
</html>