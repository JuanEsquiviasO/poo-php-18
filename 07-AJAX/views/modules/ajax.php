<?php 

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax {
	public $validarUsuario;
	public function validarUsuarioAjax() {
		$datos = $this->$validarUsuario;
		$respuesta = MvcController::vistaUsuarioController($datos);
		echo $respuesta;
	}
}

$a = new Ajax();
$a -> validarUsuario = $_POST["validarUsuario"];
$a -> validarUsuarioAjax();

