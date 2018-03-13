<?php 

#var number
$number = 5;
echo "This is a variable Number: $number<br>";
var_dump($number);
echo "<br><br>";

#var string
$word = "word";
echo "This is a variable of type string: $word<br>";
var_dump($word);
echo "<br><br>";

#var boolean
$boolean = true;
echo "This is a variable of type boolean: $boolean<br>";
var_dump($boolean);
echo "<br><br>";

#var array
$colours = array("cyan", "magenta") ;
echo "This is a variable of type array: $colours[1]<br>";
var_dump($colours);
echo "<br><br>";

#var array with properties
$vegetables = array("vegetable1"=>"lettuce", "vegetable2"=>"onion");
echo "This is a variable of type array with properties: $vegetables[vegetable1]<br>";
var_dump($vegetables);
echo "<br><br>";

#var object
$fruits = (object)["fruit1" =>"grape", "fruit2"=>"apple"];
echo "This is a variable of type object: $fruits->fruit1<br>";
var_dump($fruits);
echo "<br><br>";



?>