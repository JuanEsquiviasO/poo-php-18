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
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#intentos usuario
	#--------------------------------------------
	public function intentosUsuarioModel($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");
		$stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else {
			return "error";
		}
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


	#Edit users
	#--------------------------------------------
	public function editarUsuarioModel($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}


	#Update user
	#--------------------------------------------
	public function actualizarUsuarioModel($datosModel, $tabla) {
		#prepare
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "success";
		}
		else {
			return "error";
		}
		$stmt->close();
	}


	#Delete user
	#--------------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla) {
	#prepare
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "success";
		}
		else {
			return "error";
		}
		$stmt->close();
	}


	#Validate users existent
	#-------------------------------------------
	public function validarUsuarioModel($datosModel, $tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario = :usuario");
		$stmt->bindParam(":usuario", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#Validate email existent
	#-------------------------------------------
	public function validarEmailModel($datosModel, $tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
}
