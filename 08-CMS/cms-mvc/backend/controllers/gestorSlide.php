<?php 

class GestorSlide {

	public function mostrarImagenController($datos) {
		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		if ($ancho < 1600 || $alto < 600) {
			echo 0;
		}
	}
}

