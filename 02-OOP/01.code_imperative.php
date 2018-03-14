<?php 

// Imperative code (spaghetti)
$automovil1 = (object)["brand"=>"Toyota", "model"=>"Corolla"];
$automovil2 = (object)["brand"=>"Hyundai", "model"=>"Accent"];

function toShow($automovil) {
	echo "<p>Hi, it's an $automovil->brand, model $automovil->model</p>";
}

toShow($automovil1);
toShow($automovil2);


?>