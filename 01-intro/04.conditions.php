<?php 

#Conditions
$a = 5;
$b = 10;

if ($a > $b) {
	echo "a is greater than b";
}

else if($a === $b) {
	echo "a is the same as b";
}

else {
	echo "a is less than b";
}

echo "<br><br>";

#Switches
$day = "monday";

switch($day) {
	case 'saturday':
	echo "I'm study PHP";
	break;

	case 'friday':
	echo "I go to the party";
	break;

	case 'sunday':
	echo "I go to sleep";
	break;

	default: echo "I go to the university";
}

echo "<br><br>";

#Cicle while

$n = 1;
while ($n <= 5) {
	echo $n;
	$n++;
}


echo "<br><br>";

#Cicle do while
$p = 1;
do {
	echo $p;
	$p++;
}
while($p <= 5);


echo "<br><br>";

#Cicle for
for ($i=1; $i <=5 ; $i++) { 
	echo $i;
}


?>




















