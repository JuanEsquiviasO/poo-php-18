<?php 

require_once "conexion.php";
class GestorSlideModel {
	#Upload image route
	#----------------------------------------------------------------------------------
	public function subirImagenSlideModel($datos, $tabla) {
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		if($stmt->execute()) {
			return "ok";
		}
		else {
			"error";
		}
		$stmt->close();
	}

	#Select image route
	#------------------------------------------------------------------------------------
	public function mostrarImagenSlideModel($datos, $tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT ruta, titulo, descripcion FROM $tabla WHERE ruta = :ruta");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	#Show image in the view
	#------------------------------------------------------------------------------------
	public function mostrarImagenVistaModel($tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT ruta, titulo, descripcion FROM $tabla ORDER BY orden ASC");
		$stmt->execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}
}