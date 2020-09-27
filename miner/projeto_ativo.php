<?php
header("Refresh:1");
// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, full_name FROM repositorios ORDER BY analise_quantidade_commits ASC LIMIT 1") or die ($link->error);
$repositorio = $sql->fetch(PDO::FETCH_OBJ);

if ($repositorio) {		

	// CONSULTA A API
	date_default_timezone_set('America/Bahia');
	// var_dump(date('Y-m-d'));
	$data = date('Y-m-d',strtotime("-30 day")).'T00:00:00Z';
	$url = "https://api.github.com/repos/".$repositorio->full_name."/commits?since=".$data."&per_page=100";
	// $url = "https://api.github.com/repos/".$repositorio->full_name."/issues/comments?sort=updated&direction=desc&since=".$data."&per_page=100";
	$authToken = 'KEY_GITHUB';
	$headr = array();
	//$headr[] = 'Content-length: 0';
	// $headr[] = 'Accept: application/json';
	$headr[] = 'Authorization:'.$authToken;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$data = curl_exec($ch);
	curl_close($ch);

	$obj = json_decode($data);

	$quantidade_commits = sizeof($obj);

	echo "<pre>";
	print_r($repositorio);
	echo "<hr/>";
	print_r('QTD COMMITS: '.$url.' { '.$quantidade_commits.' }');
	echo "<hr/>";
	echo "</pre>";

	// die();

	date_default_timezone_set('America/Bahia');
	$data_analise = date('Y-m-d H:i:s');

	$update = $db->prepare("UPDATE repositorios SET quantidade_commits = ".$quantidade_commits.", analise_quantidade_commits = '".$data_analise."' WHERE id = ".$repositorio->id."");
	$update->execute();

	echo "<br/>GRAVADO!<br/><br/><br/>";

	echo "<pre>";
	print_r($obj);
	echo "</pre>";

}

unset($db);