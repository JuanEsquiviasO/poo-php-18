<h1>REGISTRO DE USUARIO</h1>
<form method="post" onsubmit="return validateRegister()"> 
	<input type="text" placeholder="Usuario" name="usuarioRegistro" required>
	<input type="password" placeholder="Contraseña" name="passwordRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="submit" value="Enviar">
</form>

<?php 

$registro = new MvcController();
$registro -> registroUsuarioController();

if (isset($_GET["action"])) {
	if ($_GET["action"] == "ok") {
		echo "Success register!";
	}
}

?>