<?php
// header("Refresh:5");
// multiplas linhas : fetchAll
// uma linha        : fetch
// FETCH_ASSOC
// FETCH_OBJ

require_once ("conection.php");


// BUSCAR O VALOR ATUAL DA TABELA CYCLE_ISSUES_COMMENTS
$sql = $db->query("SELECT SQL_CACHE valor FROM cycle_issues_comments WHERE id = 1") or die ($link->error);
$cycle_issues_comments = $sql->fetch(PDO::FETCH_OBJ);

if ($cycle_issues_comments) {
	
	// $cycle_issues_comments->valor
	// TRAZ REPOSITORIO QUE POSSUI CYCLE_ISSUES_COMMENTS < VALOR ATUAL, SE HOUVER ENTRA NO PROCESSO
	$sql = $db->query("SELECT SQL_CACHE id, full_name FROM repositorios WHERE cycle_issues_comments < ".$cycle_issues_comments->valor." OR cycle_issues_comments is null LIMIT 1") or die ($link->error);
	$repositorio = $sql->fetch(PDO::FETCH_OBJ);

	if ($repositorio) {		

		// CONSULTA A API
		date_default_timezone_set('America/Bahia');
		// var_dump(date('Y-m-d'));
		$data = date('Y-m-d',strtotime("-30 day")).'T00:00:00Z';
		$url = "https://api.github.com/repos/".$repositorio->full_name."/issues/comments?sort=updated&direction=desc&since=".$data."&per_page=100";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

		$data = curl_exec($ch);
		curl_close($ch);

		$obj = json_decode($data);

		if($obj){
			// REALIZA A PESQUISA SE HOUVER DADOS ATUALIZAR
			$comentario_recente = $obj[0];

			// $comentario_recente->updated_at
			echo "<pre>";
			echo $url;
			echo "<hr/>";
			print_r($comentario_recente->updated_at);
			echo "<hr/>";
			// print_r($obj);
			// echo "<hr/>";
			print_r($comentario_recente);
			echo "</pre>";

			// die();


			// date_default_timezone_set('UTC');
			// echo date('Y-m-d H:i:s', strtotime($comentario_recente->updated_at));
			// echo "<br>";
			date_default_timezone_set('America/Bahia');
			$data_ultimo_comentario = date('Y-m-d H:i:s', strtotime($comentario_recente->updated_at));
			echo $data_ultimo_comentario;
			// die();

			date_default_timezone_set('America/Bahia');
			$data_analise = date('Y-m-d H:i:s');

			$update = $db->prepare("UPDATE repositorios SET cycle_issues_comments = ".$cycle_issues_comments->valor.", data_ultimo_comentario = '".$data_ultimo_comentario."', analise_comunidade_ativa = '".$data_analise."' WHERE id = ".$repositorio->id."");
			$update->execute();

			echo "<br/>GRAVADO!";

		} else {
			date_default_timezone_set('America/Bahia');
			$data_analise = date('Y-m-d H:i:s');
			
			// SE NAO HOUVER REGISTRAR NULL
			$update = $db->prepare("UPDATE repositorios SET cycle_issues_comments = ".$cycle_issues_comments->valor.", data_ultimo_comentario = NULL, analise_comunidade_ativa = '".$data_analise."' WHERE id = ".$repositorio->id."");
			$update->execute();
		}

	} else {
		// echo "1";
		// SE NÃO HOUVER ATUALIZA O VALOR EM CYCLE_ISSUES_COMMENTS
		$valor = $cycle_issues_comments->valor + 1;
		$update = $db->prepare("UPDATE cycle_issues_comments SET valor = ".$valor." WHERE id = 1");
		$update->execute();
	}

} else {

	$id = 1;
	$valor = 1;
	$stmt = $db->prepare("INSERT INTO cycle_issues_comments(id, valor) VALUES (:id, :valor)");	
 	$stmt->bindParam(':id', $id);
 	$stmt->bindParam(':valor', $valor);
 	$stmt->execute();

}

unset($db);