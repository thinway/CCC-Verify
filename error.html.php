<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuenta CCC - Error</title>
</head>
<body>
	<h1>Error!!!</h1>
	<p><?php if ( isset($lista_errores['campos_vacios']) ) echo "Existen campos vacíos."; ?></p>
	<p><?php if ( isset($lista_errores['longitud_campos']) ) echo "La longitud de los campos no cumple la especificación."; ?></p>
	<p><?php if ( isset($lista_errores['error_dc'] ) ) echo "El código CCC introducido no es correcto."; ?></p>
	<p><?php if ( isset($lista_errores['alfanumericos']) ) echo "Existen datos no núméricos."; ?></p>
	<a href="?entidad=<?=$entidad?>&oficina=<?=$oficina?>&dc=<?=$dc?>&cuenta=<?=$cuenta?>">Volver al formulario</a>
</body>
</html>