<?php 
// Se extrae la URI sin los parámetros GET
// La función explode extrae divide la cadena de la URI en dos cadenas
// tomando como separador el símbolo ?
// Más info:
// 			http://php.net/manual/es/function.explode.php
//			http://php.net/manual/es/reserved.variables.server.php
$uri_parts = explode('?', $_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Código Correcto - Cuenta CCC</title>
</head>
<body>
	<h1>Código Correcto</h1>
	<p>Codigo CCC correcto: <?php echo $entidad.'-'.$oficina.'-'.$dc.'-'.$cuenta; ?></p>
	<a href="http://<?=$_SERVER['HTTP_HOST'].$uri_parts[0]?>">Probar otro CCC</a>
</body>
</html>