<?php

// PRINCIPAIS CONTRIBUIDORES

// header("Refresh:1");
// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

$sql = $db->query("SELECT SQL_CACHE id, full_name FROM repositorios WHERE main_contributors IS NULL ORDER BY id ASC LIMIT 1") or die ($link->error);

$repositorio = $sql->fetch(PDO::FETCH_OBJ);

if($repositorio){

	echo "<pre>";
	print_r($repositorio);
	echo "</pre>";
	echo "<hr>";

	// CONSULTA A API
	$url = "https://api.github.com/repos/".$repositorio->full_name."/contributors?per_page=10";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$data = curl_exec($ch);
	curl_close($ch);

	$obj = json_decode($data);

	if ($obj) {

		foreach ($obj as $key => $row) {

			echo "<pre>";
			print_r($row);
			echo "<hr>";
			echo "</pre>";

			$stmt = $db->prepare("INSERT INTO contribuidores(id_repositorio, login, avatar_url, html_url, contributions) VALUES (:id_repositorio, :login, :avatar_url, :html_url, :contributions)");

			$stmt->bindParam(':id_repositorio', $repositorio->id);
			$stmt->bindParam(':login', $row->login);
			$stmt->bindParam(':avatar_url', $row->avatar_url);
			$stmt->bindParam(':html_url', $row->html_url);
			$stmt->bindParam(':contributions', $row->contributions);
			$stmt->execute();

			echo "<br/>GRAVADO!<hr/><br/>";

		}

		// die();

		date_default_timezone_set('America/Bahia');
		$data_analise = date('Y-m-d H:i:s');

		$update = $db->prepare("UPDATE repositorios SET main_contributors = 1, analise_principais_contribuidores = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

		echo "<hr/><strong>GRAVADO!</strong>";

	} else {

		date_default_timezone_set('America/Bahia');
		$data_analise = date('Y-m-d H:i:s');

		$update = $db->prepare("UPDATE repositorios SET main_contributors = 0, analise_principais_contribuidores = '".$data_analise."' WHERE id = ".$repositorio->id."");
		$update->execute();

	}

}

unset($db);

echo "<br/>FIM DA EXECUÇÃO";