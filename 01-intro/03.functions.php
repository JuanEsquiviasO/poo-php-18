<?php 

#functions without parameters
function welcome() {
	echo "Hi world!<br>";
}
welcome();

#functions with parameters
function farewell($goodbye) {
	echo $goodbye . "<br>";
}
farewell("Adios!");

#functions with return
function retorno($retornar) {
	return $retornar;
}
echo retorno("retornar");

?>