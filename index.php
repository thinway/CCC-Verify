<?php 

/**
 *	Función que verifica si se han introducido todos los datos
 *	y si las longitudes de los mismos coinciden con la especificación.
 *
 *	@param String $entidad 	Código de 4 dígitos de la entidad.
 *	@param String $oficina 	Código de 4 dígitos de la oficina.
 *	@param String $dc 		Código de 2 dígitos del dígito de control.
 *	@param String $cuenta 	Código de 10 dígitos de la cuenta.
 *
 *	@return array $errores  Array asociativo con los errores encontrados.
 */ 
function verificar_datos($entidad, $oficina, $dc, $cuenta) {
	// Array Asociativo donde se guardarán los errores en caso de existir
	$errores = array();

	// Si algunos de los campos se ha dejado en blanco ...
	if ( empty($entidad) || empty($oficina) || empty($dc) || empty($cuenta) ) {
		// Se carga un error de campos vacíos en el array
		$errores['campos_vacios'] = true;
	}

	// Si la longitud no se ajusta a la especificación ...
	if ( strlen($entidad)!= 4 || strlen($oficina)!= 4 || strlen($dc)!=2 || strlen($cuenta)!= 10) {
		// Se carga un error en el array para dejar constancia de este hecho
		$errores['longitud_campos'] = true;
	}

	return $errores; // Se devuelve el array de errores
}

/**
 *	Función que verifica la corrección de un número de CCC calculando el dígito de
 *	control aplicando un algoritmo sobre los campos entidad, oficina y cuenta.
 *	Dicho valor de dígito de control calculado se compara con el parámetro $dc recibido.
 *	Se ha seguido el algoritmo descrito en:
 *		http://www.luciano.es/utiles/ccc.htm
 *
 *	@param String $entidad 	Código de 4 dígitos de la entidad.
 *	@param String $oficina 	Código de 4 dígitos de la oficina.
 *	@param String $dc 		Código de 2 dígitos del dígito de control.
 *	@param String $cuenta 	Código de 10 dígitos de la cuenta.
 *
 *	@return bool 			Verdadero si el código CCC es correcto y falso en caso contrario.
 */
function verificar_dc($entidad, $oficina, $dc, $cuenta ){
	$entidadoficina = $entidad . $oficina; // Se compacta entidad y oficina en un mismo string
	$multiplicadores1 = array(4, 8, 5, 10, 9, 7, 3, 6 );
	$suma = 0;

	for ($i=0; $i < 8; $i++) { 
		$suma += $entidadoficina[$i] * $multiplicadores1[$i];
	}

	$dc1 = 11 - $suma % 11;
	if ( $dc1 == 11 ) {
		$dc1 = 0;
	}else if ( $dc1 == 10) {
		$dc1 = 1;
	}

	$multiplicadores2 = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6 );
	$suma = 0;
	for ($i=0; $i<10 ; $i++) { 
		$suma += $cuenta[$i] * $multiplicadores2[$i];
	}

	$dc2 = 11 - $suma % 11;
	if ( $dc2 == 11 ) {
		$dc2 = 0;
	}else if ( $dc2 == 10) {
		$dc2 = 1;
	}

	// echo "DC: ".$dc1.$dc2."<br>";
	if ( $dc == $dc1 . $dc2 ) {
		return true;
	} else {
		return false;
	}

}

// Si no recibo ningún parámetro por POST ...
if ( !$_POST ) {
	// Cargo el formulario
 	include 'formulario_ccc.html.php';
}else{
	// Si se reciben parámetros por POST se pasan a variables
	// Se filtra la información introducida por el formulario con htmlspecialchars
	$entidad = htmlspecialchars($_POST['entidad'], ENT_QUOTES, 'UTF-8');
	$oficina = htmlspecialchars($_POST['oficina'], ENT_QUOTES, 'UTF-8');
	$dc = htmlspecialchars($_POST['dc'], ENT_QUOTES, 'UTF-8');
	$cuenta = htmlspecialchars($_POST['cuenta'], ENT_QUOTES, 'UTF-8');

	// Si los datos introducidos no son correctos porque falta alguno o las longitudes
	// no coinciden con la especificación ...
	if( $error = verificar_datos($entidad, $oficina, $dc, $cuenta) ){
		// Se carga la página de error
		include 'error.html.php';
	}else{
		// Si la verificación del código CCC es correcta ...
		if ( verificar_dc($entidad, $oficina, $dc, $cuenta) ) {
			// Se carga la página de éxito
			include 'exito.html.php';
		} else {
			// Si no es correcta cargamos un nuevo tipo de error en nuestro array de errores
			$error['error_dc'] = true;

			// Y cargamos la página de error
			include 'error.html.php';
		}

	}
}