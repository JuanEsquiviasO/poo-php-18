<h1>EDITAR USUARIO</h1>
<form method="post">
	<input type="text" value="Usuario" name="usuarioEditar" required>
	<input type="text" value="Contraseña" name="passwordEditar" required>
	<input type="email" value="Email" name="emailEditar" required>
	<input type="submit" value="Actualizar">
</form>

<?php 

$editarUsuario = new MvcController();
$editarUsuario -> editarUsuarioController();

?>