<?php

// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, html_url FROM repositorios WHERE releases is null LIMIT 1") or die ($link->error);
$repositorio = $sql->fetch(PDO::FETCH_OBJ);

if ($repositorio) {

	var_dump($repositorio);
	echo "<br/>";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL, $repositorio->html_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$result = curl_exec($ch);
	curl_close($ch);

	$result = preg_replace('/\s\s+/', ' ', $result);
	$texto = strip_tags($result);

	$position_branches = strpos($texto, 'branches');
	if ($position_branches) {
		$releases = substr($texto, $position_branches);
		$releases = strstr($releases, 'releases', true);
		$releases = substr($releases, 8);
		$releases = trim(html_entity_decode(strip_tags($releases)));
		$releases = preg_replace('/\s\s+/', ' ', $releases);
	} else {

		$position_branches = strpos($texto, 'branch');
		$releases = substr($texto, $position_branches);
		$releases = strstr($releases, 'releases', true);
		$releases = substr($releases, 8);
		$releases = trim(html_entity_decode(strip_tags($releases)));
		$releases = preg_replace('/\s\s+/', ' ', $releases);

	}
	

	if($releases != 'Fetching'){

		if(!$releases){
			$releases = 0;
		}

		print_r('releases: '.$releases);
		// die();

		date_default_timezone_set('America/Bahia');
		$data_analise = date('Y-m-d H:i:s');

		$update = $db->prepare("UPDATE repositorios SET releases = ".$releases.", analise_maturidade = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

		echo "<br/>GRAVADO!";

	}	

}

unset($db);