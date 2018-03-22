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
		$stmt->close();
	}

	#users login
	#--------------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#View users
	#--------------------------------------------
	public function vistaUsuariosModel($tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

}

?>