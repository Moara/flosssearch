<?php

echo 'Hello World! <br/>';

echo "<hr/>";

for ($i=1; $i <= 5; $i++) { 
	
	$motoristas[] = array(
	'nome' => 'BL '.$i,
	'cidade' => 'VCA '.$i
	);

}

echo "<pre>";
var_dump($motoristas);
echo "</pre>";

echo "<hr/>";

foreach ($motoristas as $r) {
	echo $r['nome'].'<br/>';
}