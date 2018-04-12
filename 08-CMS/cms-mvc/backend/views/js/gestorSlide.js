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

	var imagenSize = imagen.size;
	console.log('imagenSize', imagenSize);
});

/*===== Drop image =====*/