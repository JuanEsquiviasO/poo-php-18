<?php 

//OOP code
class Automovil {
	#Properties
	public $brand;
	public $model;

	#Method != Function
	public function toShow() {
		echo "<p>Hi, it's an $this->brand, model $this->model</p>";
	}
}

#Object
$a = new Automovil();
$a -> brand = "Toyota";
$a -> model = "Corolla";
$a -> toShow();


$b = new Automovil();
$b -> brand = "Hyundai";
$b -> model = "Accent";
$b -> toShow();

#The four principles of OOP
#1. Encapsulation
#2. Abstraction
#3. Inheritance
#4. Polymorphism


?>