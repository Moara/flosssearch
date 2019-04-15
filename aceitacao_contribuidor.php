<?php

// VERIFICAR SE TEM COMO PUXAR OS REPOSITORIOS POR ID OU EM ORDEM SEQUENCIAL PARA NAO PUXAR REPETIDO
// SENAO VERIFICAR SE REPOSITORIO JÁ EXISTE
// OU TRIGGER REALIZAR ESSA AÇÃO

// header("Refresh:1");

// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

// PUXAR TODAS AS LABELS
// https://api.github.com/repos/{NOME COMPLETO REPOSITÓRIO}/labels

require_once ("conection.php");

// TRAZ A LISTA DE LINGUAGENS DO BANCO
$sql = $db->query("SELECT SQL_CACHE id, id_repo FROM repositorios WHERE aceita_contribuicao IS NULL ORDER BY id ASC LIMIT 1") or die ($link->error);

$repositorio = $sql->fetch(PDO::FETCH_ASSOC);

var_dump($repositorio);
echo "<br/>";

// CONSULTA A API
$url = "https://api.github.com/search/labels?repository_id=".$repositorio['id_repo']."&q=help+wanted+good+first+issue&per_page=100";
$ch = curl_init();
$headers = [
    'Accept: application/vnd.github.symmetra-preview+json'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

$data = curl_exec($ch);
curl_close($ch);

$obj = json_decode($data);

echo "<pre>";
print_r($obj);
echo "</pre>";

$aceita_contribuicao = 0;

if(isset($obj->items) && !empty($obj->items)){

	foreach ($obj->items as $key => $row) {
		if (strtolower($row->name) == 'help wanted' || strtolower($row->name) == 'good first issue') {

			$aceita_contribuicao = 1;

			$stmt = $db->prepare("INSERT INTO labels(id_repositorio, nome, url, color) VALUES (:id_repositorio, :nome, :url, :color)");

			$stmt->bindParam(':id_repositorio', $repositorio['id']);
			$stmt->bindParam(':nome', $row->name);
			$stmt->bindParam(':url', $row->url);
			$stmt->bindParam(':color', $row->color);
			$stmt->execute();

		}
	}

}

if ($aceita_contribuicao) {
	echo "<br/>LABEL ENCONTRADA!<br/>";
}

date_default_timezone_set('America/Bahia');
$data_analise = date('Y-m-d H:i:s');

// REGISTRA SE O REPOSITÓRIO ACEITA CONTRIBUIÇÃO OU NÃO
$update = $db->prepare("UPDATE repositorios SET aceita_contribuicao = ".$aceita_contribuicao.", analise_aceita_contribuicao = '".$data_analise."' WHERE id = ".$repositorio['id']."");
$update->execute();

unset($db);

echo "FIM DA EXECUÇÃO";