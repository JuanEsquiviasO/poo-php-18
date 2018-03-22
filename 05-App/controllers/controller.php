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

		if (isset($_POST["usuarioRegistro"])) {
			$datosController = array("usuario"=>$_POST["usuarioRegistro"], "password"=>$_POST["passwordRegistro"], "email"=>$_POST["emailRegistro"]);
			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");
			
			if ($respuesta == "success") {
				header("location:index.php?action=ok");
			}
			else {
				header("location:index.php");
			}
		}
	}

	#User Login
	#-------------------------------------------
	public function ingresoUsuarioController() {

		if (isset($_POST["usuarioIngreso"])) {
			$datosController = array("usuario"=>$_POST["usuarioIngreso"], "password"=>$_POST["passwordIngreso"]);
			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
			
			if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password" == $_POST["passwordIngreso"]]) {
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");
			}
			else {
				header("location:index.php?action=fallo");
			}
		}
	}

	#View of users
	#-------------------------------------------
	public function vistaUsuariosController() {
		$respuesta = Datos::vistaUsuariosModel("usuarios");

		foreach($respuesta as $row => $item) {
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><button>Borrar</button></td>
			</tr>';
		}
	}

	#Edit users
	#-------------------------------------------
	public function editarUsuarioController() {
		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");
		echo '<input type="hidden" name="'.$respuesta["id"].'" name="usuarioEditar" required>
					<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
					<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
					<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
					<input type="submit" value="Actualizar">';
	}

	#Update users
	#-------------------------------------------
	public function actualizarUsuarioController() {
		if(isset($_POST["usuarioEditar"])) {
			$datos = array("id"=>$_POST["id"], "usuario"=>$_POST["usuario"], "password"=>$_POST["password"], "email"=>$_POST["email"]);

		}
	}
}

?>