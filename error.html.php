<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuenta CCC - Error</title>
</head>
<body>
	<h1>Error!!!</h1>
	<p><?php if ( isset($error['campos_vacios']) ) echo "Existen campos vacíos."; ?></p>
	<p><?php if ( isset($error['longitud_campos']) ) echo "La longitud de los campos no cumple la especificación."; ?></p>
	<p><?php if ( isset($error['error_dc'] ) ) echo "El código CCC introducido no es correcto."; ?></p>
	<a href="">Volver al formulario</a>
</body>
</html>