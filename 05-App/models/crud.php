<?php

#extension of Classes

require_once "conexion.php";

class Datos extends Conexion{
	#users register
	#--------------------------------------------
	public function registroUsuarioModel($datosModel, $tabla) {
		$stmt = Conexion::conectar()->prepare();
	}
}

?>