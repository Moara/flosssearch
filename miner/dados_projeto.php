<?php
// header("Refresh:1");

// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, html_url FROM repositorios WHERE quantidade_commits is null AND language = 208 LIMIT 1") or die ($link->error);
$repositorio = $sql->fetch(PDO::FETCH_OBJ);

	$url = $repositorio->html_url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$result = curl_exec($ch);
	curl_close($ch);

	print_r($result);
	die();

	$result = preg_replace('/\s\s+/', ' ', $result);
	$result = trim(html_entity_decode(strip_tags($result)));

	$position_representing = strpos($result, 'commits');
	$lines = substr($result, 0, $position_representing);
	$lines = preg_replace('/\s\s+/', ' ', $lines);
	$lines = trim($lines);
	$lines = explode(' ', $lines);

	$quantidade_commits = end($lines);

if ($repositorio) {

}

unset($db);