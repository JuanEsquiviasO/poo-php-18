<?php 

class Conexion{
	public function conectar() {
		$link = new PDO("mysql:host=localhost; dbname=course_php", "root", "");
		return $link;
	}
}

?>