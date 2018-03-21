<?php

#extension of Classes

require_once "conexion.php";

class Datos extends Conexion{
	#users register
	#--------------------------------------------
	public function registroUsuarioModel($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario,:password,:email)");

		#bindParam()
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else {
			return "error";
		}
	}

	#users login
	#--------------------------------------------
	public function ingresoUsuarioController($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare();
	}
}

?>