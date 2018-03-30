// Validate existing user with AJAX


var usuarioExistente = false;
var emailExistente = false;

$("#usuarioRegistro").change(function(){
	var usuario = $("#usuarioRegistro").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			if (respuesta == 0) {
				$("label[for='usuarioRegistro'] span").html('<p>This user has already done in a DB</p>');
				usuarioExistente = true;
			}
			else {
				$("label[for='usuarioRegistro'] span").html("");
				usuarioExistente = false;
			}
		}
	});
});

// End Validate existing user with AJAX


// Validate existing email with AJAX

$("#emailRegistro").change(function(){
	var email = $("#emailRegistro").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			if (respuesta == 0) {
				$("label[for='emailRegistro'] span").html('<p>This email has already done in a DB</p>');
				emailExistente = true;
			}
			else {
				$("label[for='emailRegistro'] span").html("");
				emailExistente = false;
			}
		}
	});
});

// End Validate existing user with AJAX


// Validate Register
function validateRegister() {
	var usuario = document.querySelector('#usuarioRegistro').value
	// console.log('usuario', usuario)
	var password = document.querySelector('#passwordRegistro').value
	// console.log('password', password)
	var email = document.querySelector('#emailRegistro').value
	// console.log('email', email)
	var terminos = document.querySelector('#terminos').checked

	
	// Valid user with javascript and regular expressions
	if (usuario != "") {
		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if (caracteres > 6) {
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Write less than 6 characters.";
			return false;
		}

		if (!expresion.test(usuario)) {
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Do not write special characters.";
			return false;
		}

		if (usuarioExistente){
			document.querySelector("label[for='usuarioRegistro'] span").innerHTML = "<br>This user has already done in a DB.";
			return false;
		}

	}

	// Valid password with javascript and regular expressions
	if (password != "") {
		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if (caracteres < 6) {
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Write more than 6 characters.";
			return false;
		}

		if (!expresion.test(password)) {
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Do not write special characters.";
			return false;
		}

	}

	// Valid email with javascript and regular expressions
	if (email != "") {
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresion.test(email)) {
			document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Write the e-mail correctly.";
			return false;
		}

		if (emailExistente){
			document.querySelector("label[for='emailRegistro'] span").innerHTML = "<br>This email has already done in a DB.";
			return false;
		}

	}

	// Valid terminos with javascript and regular expressions
	if (!terminos) {
		document.querySelector("form").innerHTML += "<br>Registration failed, accept terms and conditions."
		document.querySelector('#usuarioRegistro').value = usuario
		document.querySelector('#passwordRegistro').value = password
		document.querySelector('#emailRegistro').value = email

		return false
	}

return true
}