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
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">The file must be JPG or PNG format</div>');
	}

	// Upload image to the server
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
		var datos = new FormData();
		datos.append("imagen", imagen);
		$.ajax({
			url:"views/ajax/gestorSlide.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			beforeSend: function(){
				$("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
			},
			success: function(respuesta){
				$("#status").remove();
				if (respuesta == 0) {
					$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">The image is less than 1600px 600px</div>');
				}
				else {
					$("#columnasSlide").css({"height":"auto"});
					$("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times"></span><img src="'+respuesta["ruta"].slice(6)+'" class="handleImg"></li>');
					$("#ordenarTextSlide").append('<li><span class="fa fa-pencil" style="background:blue"></span><img src="'+respuesta["ruta"].slice(6)+'" style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1>'+respuesta["descripcion"]+'</p></li>');
					swal({
						title: "Ok!",
						text: "The image upload successfuly!",
						type: "success",
						confirmButtonText: "Close",
						closeOnConfirm: false
						},
						function(isConfirm) {
							if (isConfirm) {
								window.location = "slide";
							} 
						});
				}
			}
		});
	}
});	

/*===== Drop image =====*/


/*=====================================
						DELETE ITEM SLIDE
======================================*/
$(".eliminarSlide").click(function(){
	idSlide = $(this).parent().attr("id");
	rutaSlide = $(this).attr("ruta");

	$(this).parent().remove();
	$("#item"+idSlide).remove();

	var borrarItem = new FormData();
	
	borrarItem.append("idSlide", idSlide);
	borrarItem.append("rutaSlide", rutaSlide);
	
	$.ajax({
		url:"views/ajax/gestorSlide.php",
		method: "POST",
		data: borrarItem,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			console.log('respuesta', respuesta);
		}
	});
});


/*===== Delete item slide =====*/