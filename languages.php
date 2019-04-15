<?php

require_once ("conection.php");

$arquivo = file_get_contents("languages.json");

//decodificando os dados armazenados para um array
$json = json_decode($arquivo);

//escrevendo na tela as informações
// var_dump($json);
foreach ($json as $key => $row) {
	// var_dump($key);
	
	var_dump($row);
	echo "<br>";

	$stmt = $db->prepare("INSERT INTO linguagens(nome, language_id, color, type) VALUES (:nome, :language_id, :color, :type)");
 	$stmt->bindParam(':nome', $key);
 	$stmt->bindParam(':language_id', $row->language_id);
 	$stmt->bindParam(':color', $row->color);
 	$stmt->bindParam(':type', $row->type);
 	$stmt -> execute();

}

echo "FINISH!";

unset($db);