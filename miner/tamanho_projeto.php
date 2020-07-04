<?php
header("Refresh:2");
// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, name FROM repositorios WHERE code_lines_available is null AND language = 208 LIMIT 1") or die ($link->error);
$repositorio = $sql->fetch(PDO::FETCH_OBJ);

if ($repositorio) {

	$url = "https://www.openhub.net/p/".$repositorio->name;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$result = curl_exec($ch);
	curl_close($ch);

	// print_r($result);
	// die();

	$result = preg_replace('/\s\s+/', ' ', $result);
	// $result = strip_tags($result);

	$position_representing = strpos($result, 'representing');

	date_default_timezone_set('America/Bahia');
	$data_analise = date('Y-m-d H:i:s');
	
	if ($position_representing) {
		
		$representing = substr($result, $position_representing);
		$lines = strstr($representing, 'lines of code', true);
		$lines = substr($lines, 12);
		$lines = trim(html_entity_decode(strip_tags($lines)));
		$lines = preg_replace('/\s\s+/', ' ', $lines);
		// $lines = str_replace(",", ".", $lines);
		$lines = preg_replace("/[^0-9]/", "", $lines);

		print_r($lines);

		$update = $db->prepare("UPDATE repositorios SET code_lines_available = 1, code_lines = ".$lines.", analise_code_lines = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

		echo "<br/>GRAVADO!";

	} else {

		$update = $db->prepare("UPDATE repositorios SET code_lines_available = 0, analise_code_lines = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

	}

}

unset($db);