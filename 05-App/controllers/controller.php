<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	public function pagina(){	
		include "views/template.php";
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController(){
		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else {
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	#Users Register
	#--------------------------------------
	public function registroUsuarioController() {
		$datosController = array("usuario"=>$_POST["usuario"], "password"=>$_POST["password"], "email"=>$_POST["email"]);

		$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

		echo $respuesta;
	}
}

?>