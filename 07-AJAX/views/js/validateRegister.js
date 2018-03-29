// Validate existing user with AJAX

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
			}
			else {
				$("label[for='usuarioRegistro'] span").html("");
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
		var caracteres = usuario.length
		var expresion = /^[a-zA-Z0-9]*$/

		if (caracteres > 6) {
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Write less than 6 characters."
			return false
		}

		if (!expresion.test(usuario)) {
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Do not write special characters."
			return false
		}

	}

	// Valid password with javascript and regular expressions
	if (password != "") {
		var caracteres = password.length
		var expresion = /^[a-zA-Z0-9]*$/

		if (caracteres < 6) {
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Write more than 6 characters."
			return false
		}

		if (!expresion.test(password)) {
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Do not write special characters."
			return false
		}

	}

	// Valid email with javascript and regular expressions
	if (email != "") {
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

		if (!expresion.test(email)) {
			document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Write the e-mail correctly."
			return false
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