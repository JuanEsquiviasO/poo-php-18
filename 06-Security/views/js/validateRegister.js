// coment
function validateRegister() {
	var usuario = document.querySelector('#usuarioRegistro').value
	// console.log('usuario', usuario)
	var password = document.querySelector('#passwordRegistro').value
	// console.log('password', password)
	var email = document.querySelector('#emailRegistro').value
	// console.log('email', email);
	
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

return true
}