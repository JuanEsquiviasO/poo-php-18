<h1>REGISTRO DE USUARIO</h1>
<form method="post" onsubmit="return validateRegister()">
	<label for="usuarioRegistro">User<span></span></label>
	<input type="text" placeholder="maximum 6 characters" maxlength="6" name="usuarioRegistro" id="usuarioRegistro" required>

	<label for="passwordRegistro">Password</label>
	<input type="password" placeholder="minimum 6 characters, must include number and a capital letter" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
	
	<label for="emailRegistro">E-mail</label>
	<input type="email" placeholder="write your email correctly" name="emailRegistro" id="emailRegistro" required>

	<p style="text-align: center"><input type="checkbox" id="terminos"><a href="#"> Accept Terms and Conditions</a></p>

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