<?php
/*
$linguagem = array(0 => 'java');
$page = 1;

$url = "https://api.github.com/search/repositories?q=language:".$linguagem[0]."&page=".$page."&per_page=100";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

$data = curl_exec($ch);
curl_close($ch);
echo "<pre>";

$obj = json_decode($data);
print_r($obj);
echo "</pre>";
*/

$arquivo = file_get_contents("languages.json");

//decodificando os dados armazenados para um array
$json = json_decode($arquivo);

//escrevendo na tela as informações
// var_dump($json);
foreach ($json as $key => $row) {
	var_dump($key);
	echo "<br>";
	var_dump($row);
	die();
}