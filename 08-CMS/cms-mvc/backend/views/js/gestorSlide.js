/*=====================================
		AREA DE ARRASTRE DE IMAGENES
======================================*/
console.log($("#columnasSlide").html());

if($("#columnasSlide").html() == 0) {
	$("#columnasSlide").css({"height":"100px"});
}

else {
	$("#columnasSlide").css({"height":"auto"});

}
/*===== Area de arrastre de imágenes =====*/


/*=====================================
						UPLOAD IMAGE
======================================*/
$("#columnasSlide").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();

	$("#columnasSlide").css({"background":"url(views/images/pattern.jpg)"});
});
/*===== Upload image =====*/


/*=====================================
						DROP IMAGE
======================================*/
$("#columnasSlide").on("drop", function(e){
	e.preventDefault();
	e.stopPropagation();

	$("#columnasSlide").css({"background":"white"});

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen = archivo[0];

// Validar tamaño de la imágen
	var imagenSize = imagen.size;	
	if(Number(imagenSize) > 2000000) {
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">The file exceeds the allowed capacity 200Kb</div>')
	}
	else {
		$(".alerta").remove();
	}

// Validar tipo de la imágen
	var imagenType = imagen.type;
	if(imagenType == "image/jpeg" || imagenType == "image/png"){
		$(".alerta").remove();
	}
	else {
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">The file must be JPG or PNG format</div>')
	}

	// Upload image to the server
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
		var datos = new FormData();
		datos.append("imagen", imagen);
		$.ajax({
			
		});
	}
});

/*===== Drop image =====*/