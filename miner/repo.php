<?php

// VERIFICAR SE TEM COMO PUXAR OS REPOSITORIOS POR ID OU EM ORDEM SEQUENCIAL PARA NAO PUXAR REPETIDO
// SENAO VERIFICAR SE REPOSITORIO JÁ EXISTE
// OU TRIGGER REALIZAR ESSA AÇÃO

// header("Refresh:1");

// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");

// TRAZ A LISTA DE LINGUAGENS DO BANCO
$sql = $db->query("SELECT SQL_CACHE id, nome, pagina FROM linguagens WHERE status = 1 ORDER BY pagina, id ASC") or die ($link->error);
$linguagens = $sql->fetchAll(PDO::FETCH_ASSOC);

// // SELECIONA A PRIMEIRA LINGUAGEM
$selecionada = $linguagens[0];

// // REORGANIZA O ID E NOME DAS LINGUAGENS EM UM NOVO ARRAY, POSSIBILITANDO MÚLTIPLAS CONSULTAS SEM PRECISAR GERAR NOVAS REQUISIÇÕES NO BANCO.
$lista = array();
foreach ($linguagens as $r) {
	$lista[$r['id']] = $r['nome'];
}

// CONSULTA A API
// $url = "https://api.github.com/repos/apache/cordova-docs";

$url = "https://api.github.com/search/repositories?q=language:".$selecionada['nome']."&page=".$selecionada['pagina']."&per_page=100";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

$data = curl_exec($ch);
curl_close($ch);

$rows = json_decode($data);

// var_dump($data);


// 2017-07-26T19:52:07Z
// date_default_timezone_set('UTC');
// echo date('Y-m-d H:i:s', strtotime('2017-07-26T19:52:07Z'));
// echo "<br>";
// date_default_timezone_set('America/Bahia');
// echo date('Y-m-d H:i:s', strtotime('2017-07-26T19:52:07Z'));


// die();

foreach ($rows->items as $key => $row) {
	echo "<pre>";
	print_r($row);
	echo "</pre>";

	// die();
	
	// PESQUISA O ID DA LINGUAGEM PRINCIPAL DO PROJETO, CASO EXISTA NO ARRAY REALIZAR NO PROCEDIMENTO PARA ARMAZENAR NO BANCO
	$id_linguagem = array_search($row->language, $lista);
	if ($id_linguagem) {

		// var_dump($row->id);
		// die();

		// echo $row->html_url;
		// echo "<br>";
		// date_default_timezone_set('UTC');
		// echo date('Y-m-d H:i:s', strtotime($row->pushed_at));
		// echo "<br>";
		// date_default_timezone_set('America/Bahia');
		// echo date('Y-m-d H:i:s', strtotime($row->pushed_at));




		// VERIFICA SE PROJETO JÁ FOI SALVO NO BANCO

		date_default_timezone_set('America/Bahia');

		// PREPARA AS VARIÁVEIS
		$id_repo = $row->id;
		$node_id = $row->node_id;
		$name = $row->name;
		$full_name = $row->full_name; 

		// VERIFICAR COMO SALVOU NO BANCO - BOOLEAN
		$private = $row->private;

		$html_url = $row->html_url;
		$description = $row->description;

		// VERIFICAR COMO SALVOU NO BANCO - BOOLEAN
		$fork = $row->fork;

		// VERIFICAR PADRÃO DE DATA: 2017-07-26T19:52:07Z
		$created_at = date('Y-m-d H:i:s', strtotime($row->created_at));
		$updated_at = date('Y-m-d H:i:s', strtotime($row->updated_at));
		$pushed_at = date('Y-m-d H:i:s', strtotime($row->pushed_at));
		$homepage = $row->homepage;
		$size = $row->size;
		$stargazers_count = $row->stargazers_count;
		$watchers_count = $row->watchers_count;

		$language = $id_linguagem;

		// VERIFICAR COMO SALVOU NO BANCO - BOOLEAN
		$has_issues = $row->has_issues;
		$has_projects = $row->has_projects;
		$has_downloads = $row->has_downloads;
		$has_wiki = $row->has_wiki;
		$has_pages = $row->has_pages;

		$forks_count = $row->forks_count;
		$open_issues_count = $row->open_issues_count;

		// VERIFICAR SE EXISTE LICENÇA ESPECIFICADA
		$license_name = !empty($row->license) && $row->license->name ? $row->license->name : '';
		$license_key = !empty($row->license) && $row->license->key ? $row->license->key : '';
		$license_url = !empty($row->license) && $row->license->url ? $row->license->url : '';

		$forks = $row->forks;
		$open_issues = $row->open_issues;
		$watchers = $row->watchers;
		$default_branch = $row->default_branch;
		$score = NULL;

		date_default_timezone_set('America/Bahia');
		$data_sincronismo = date('Y-m-d H:i:s');

		// die();

		$stmt = $db->prepare("INSERT INTO repositorios(id_repo, node_id, name, full_name, private, html_url, description, fork, created_at, updated_at, pushed_at, homepage, size, stargazers_count, watchers_count, language, has_issues, has_projects, has_downloads, has_wiki, has_pages, forks_count, open_issues_count, license_name, license_key, license_url, forks, open_issues, watchers, default_branch, score, data_sincronismo) VALUES (:id_repo, :node_id, :name, :full_name, :private, :html_url, :description, :fork, :created_at, :updated_at, :pushed_at, :homepage, :size, :stargazers_count, :watchers_count, :language, :has_issues, :has_projects, :has_downloads, :has_wiki, :has_pages, :forks_count, :open_issues_count, :license_name, :license_key, :license_url, :forks, :open_issues, :watchers, :default_branch, :score, :data_sincronismo)");
	 	
	 	$stmt->bindParam(':id_repo', $id_repo);
	 	$stmt->bindParam(':node_id', $node_id);
	 	$stmt->bindParam(':name', $name);
	 	$stmt->bindParam(':full_name', $full_name);
	 	$stmt->bindParam(':private', $private);
	 	$stmt->bindParam(':html_url', $html_url);
	 	$stmt->bindParam(':description', $description);
	 	$stmt->bindParam(':fork', $fork);
	 	$stmt->bindParam(':created_at', $created_at);
	 	$stmt->bindParam(':updated_at', $updated_at);
	 	$stmt->bindParam(':pushed_at', $pushed_at);
	 	$stmt->bindParam(':homepage', $homepage);
	 	$stmt->bindParam(':size', $size);
	 	$stmt->bindParam(':stargazers_count', $stargazers_count);
	 	$stmt->bindParam(':watchers_count', $watchers_count);
	 	$stmt->bindParam(':language', $language);
	 	$stmt->bindParam(':has_issues', $has_issues);
	 	$stmt->bindParam(':has_projects', $has_projects);
	 	$stmt->bindParam(':has_downloads', $has_downloads);
	 	$stmt->bindParam(':has_wiki', $has_wiki);
	 	$stmt->bindParam(':has_pages', $has_pages);
	 	$stmt->bindParam(':forks_count', $forks_count);
	 	$stmt->bindParam(':open_issues_count', $open_issues_count);
	 	$stmt->bindParam(':license_name', $license_name);
	 	$stmt->bindParam(':license_key', $license_key);
	 	$stmt->bindParam(':license_url', $license_url);
	 	$stmt->bindParam(':forks', $forks);
	 	$stmt->bindParam(':open_issues', $open_issues);
	 	$stmt->bindParam(':watchers', $watchers);
	 	$stmt->bindParam(':default_branch', $default_branch);
	 	$stmt->bindParam(':score', $score);
	 	$stmt->bindParam(':data_sincronismo', $data_sincronismo);
	 	

	 	$stmt->execute();

	}


}

$selecionada['pagina']++;

// INCREMENTA O NÚMERO DA PÁGINA
$update = $db->prepare("UPDATE linguagens SET pagina = ".$selecionada['pagina']." WHERE id = ".$selecionada['id']."");
$update->execute();

unset($db);

// DELETE t1 FROM repositorios t1 INNER JOIN repositorios t2 WHERE t1.id < t2.id AND t1.id_repo = t2.id_repo