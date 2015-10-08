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
				<input type="text" name="entidad" value="<?php echo isset($entidad) ? $entidad : ""; ?>" required>
			</label>
		</div>
		<div>
			<label for="oficina">Oficina: 
				<input type="text" name="oficina" value="<?php echo isset($oficina) ? $oficina : ""; ?>" required>
			</label>
		</div>
		<div>
			<label for="dc">DC: 
				<input type="text" name="dc" value="<?php echo isset($dc) ? $dc : ""; ?>" required>
			</label>
		</div>
		<div>
			<label for="cuenta">Cuenta:
				<input type="text" name="cuenta" value="<?php echo isset($cuenta) ? $cuenta : ""; ?>" required>
			</label>
		</div>
		<div>
			<input type="submit" value="Verificar">
		</div>
	</form>
</body>
</html>