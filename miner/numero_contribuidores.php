<?php
// header("Refresh:1");

// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, html_url FROM repositorios WHERE total_contribuidores is null LIMIT 1") or die ($link->error);
$repositorio = $sql->fetch(PDO::FETCH_OBJ);

if ($repositorio) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL, $repositorio->html_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$result = curl_exec($ch);
	curl_close($ch);

	$result = preg_replace('/\s\s+/', ' ', $result);
	$texto = strip_tags($result);

	$position_releases = strpos($texto, 'releases');
	$releases = substr($texto, $position_releases);
	$contributors = strstr($releases, 'contributors', true);
	$contributors = substr($contributors, 8);
	$contributors = trim(html_entity_decode(strip_tags($contributors)));
	$contributors = preg_replace('/\s\s+/', ' ', $contributors);

	echo "contributors: $contributors <br>";

	// if($contributors != 'Fetching'){

	


		if(!$contributors){
			$contributors = 0;
		}

		if($contributors == 'Fetching'){$contributors = 0;}

		print_r('contributors: '.$contributors);
		// die();

		date_default_timezone_set('America/Bahia');
		$data_analise = date('Y-m-d H:i:s');

		$update = $db->prepare("UPDATE repositorios SET total_contribuidores = ".$contributors.", analise_numero_contribuidores = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

		echo "<br/>GRAVADO!";

	// }	

}

unset($db);