<?php defined('BASEPATH') or exit('No direct script access allowed');

class Repositorio_model extends CI_Model {

	// private $id;
	// private $name;
	// private $html_url;
	// private $msisdn;
	// private $operadora;
	// private $observacao;
	// private $situacao;
	// private $status;
	// private $id_cadastro;
	// private $data_cadastro;
	// private $id_alteracao;
	// private $data_alteracao;

	private $linguagem;
	private $tamanho_projeto_min;
	private $tamanho_projeto_max;
	private $maturidade;
	private $dominio;

	private $aceita_contribuicao;
	private $issue_tracker;
	private $comunidade_ativa;
	private $numero_contribuidores_min;
	private $numero_contribuidores_max;
	private $projeto_ativo;

	private $node_id;

	public function __construct() {
		parent::__construct();
	}

	public function getLinguagem() {
		return $this->linguagem;
	}
	public function setLinguagem($linguagem) {
		$this->linguagem = $linguagem;
		return $this;
	}

	public function getTamanhoProjetoMin() {
		return $this->tamanho_projeto_min;
	}
	public function setTamanhoProjetoMin($tamanho_projeto_min) {
		$this->tamanho_projeto_min = $tamanho_projeto_min;
		return $this;
	}

	public function getTamanhoProjetoMax() {
		return $this->tamanho_projeto_max;
	}
	public function setTamanhoProjetoMax($tamanho_projeto_max) {
		$this->tamanho_projeto_max = $tamanho_projeto_max;
		return $this;
	}

	public function getMaturidade() {
		return $this->maturidade;
	}
	public function setMaturidade($maturidade) {
		$this->maturidade = $maturidade;
		return $this;
	}

	public function getDominio() {
		return $this->dominio;
	}
	public function setDominio($dominio) {
		$this->dominio = $dominio;
		return $this;
	}

	public function getAceitaContribuicao() {
		return $this->aceita_contribuicao;
	}
	public function setAceitaContribuicao($aceita_contribuicao) {
		$this->aceita_contribuicao = $aceita_contribuicao;
		return $this;
	}

	public function getIssueTracker() {
		return $this->issue_tracker;
	}
	public function setIssueTracker($issue_tracker) {
		$this->issue_tracker = $issue_tracker;
		return $this;
	}

	public function getComunidadeAtiva() {
		return $this->comunidade_ativa;
	}
	public function setComunidadeAtiva($comunidade_ativa) {
		$this->comunidade_ativa = $comunidade_ativa;
		return $this;
	}

	public function getNumeroContribuidoresMin() {
		return $this->numero_contribuidores_min;
	}
	public function setNumeroContribuidoresMin($numero_contribuidores_min) {
		$this->numero_contribuidores_min = $numero_contribuidores_min;
		return $this;
	}

	public function getNumeroContribuidoresMax() {
		return $this->numero_contribuidores_max;
	}
	public function setNumeroContribuidoresMax($numero_contribuidores_max) {
		$this->numero_contribuidores_max = $numero_contribuidores_max;
		return $this;
	}

	public function getProjetoAtivo() {
		return $this->projeto_ativo;
	}
	public function setProjetoAtivo($projeto_ativo) {
		$this->projeto_ativo = $projeto_ativo;
		return $this;
	}

	public function getNodeId() {
		return $this->node_id;
	}
	public function setNodeId($node_id) {
		$this->node_id = $node_id;
		return $this;
	}

	public function search($switch_maturidade = NULL, $switch_projeto_ativo = NULL, $classified = NULL, $not_classified = NULL, $commented = NULL, $not_commented = NULL) {
		
		$this->db->select('node_id, name, html_url, description, total_contribuidores, code_lines, quantidade_commits, data_ultimo_comentario, full_name, id, releases');

		if ($this->getLinguagem()) {
			$this->db->where('language', $this->getLinguagem());
		}

		if ($this->getTamanhoProjetoMin()) {
			$this->db->where('code_lines >=', $this->getTamanhoProjetoMin());
		}

		if ($this->getTamanhoProjetoMax()) {
			$this->db->where('code_lines <=', $this->getTamanhoProjetoMax());
		}

		if($switch_maturidade){
			$this->db->where("releases >", 100);
		} else if ($this->getMaturidade()) {
			$this->db->where("releases BETWEEN '".$this->getMaturidade()[0]."' AND '".$this->getMaturidade()[1]."'");
		}

		if ($this->getDominio()) {
			$this->db->where("MATCH(description) AGAINST ('".$this->getDominio()."' IN BOOLEAN MODE)");
		}

		if ($this->getAceitaContribuicao()) {
			$this->db->where('aceita_contribuicao', 1);
		}

		if ($this->getIssueTracker()) {
			$this->db->where('open_issues >=', 1);
		}

		// comentários 30 dias
		date_default_timezone_set('America/Bahia');
		$data = date('Y-m-d H:i:s', strtotime("-30 day"));
		if ($this->getComunidadeAtiva()) {
			$this->db->where('data_ultimo_comentario >=', $data);
		}
		
		if ($this->getNumeroContribuidoresMin()) {
			$this->db->where('total_contribuidores >=', $this->getNumeroContribuidoresMin());
		}

		if ($this->getNumeroContribuidoresMax()) {
			$this->db->where('total_contribuidores <=', $this->getNumeroContribuidoresMax());
		}

		// qtd commits 30 dias
		if($switch_projeto_ativo){
			$this->db->where("quantidade_commits >", 100);
		} else if ($this->getProjetoAtivo()) {
			$this->db->where('quantidade_commits BETWEEN "'.$this->getProjetoAtivo()[0].'" AND "'.$this->getProjetoAtivo()[1].'"');
		}

		if ($classified && !$not_classified) {
			$this->db->where('classified', 1);
		} else if (!$classified && $not_classified) {
			$this->db->where('classified', 0);
		}

		if ($commented && !$not_commented) {
			$this->db->where('commented', 1);
		} else if (!$commented && $not_commented) {
			$this->db->where('commented', 0);
		}
		
		return $this->db->get('repositorios')->result();

	}

	public function details() {

		$this->db->select('repositorios.id, name, full_name, html_url, description, created_at, updated_at, homepage, stargazers_count, watchers_count, l.nome as linguagem, has_wiki, forks_count, open_issues_count, license_name, license_url, forks, total_contribuidores, analise_numero_contribuidores, code_lines_available, code_lines, analise_code_lines, main_contributors, analise_principais_contribuidores, releases, analise_maturidade, comentario, insercao_base');
		$this->db->join('linguagens l', 'repositorios.language = l.id');
		$this->db->where('node_id', $this->getNodeId());
		return $this->db->get('repositorios')->row();

	}

	public function projetos_selecionados($projetos) {

		$this->db->select('name, html_url, code_lines, description, total_contribuidores, releases, quantidade_commits, forks_count, open_issues_count, stargazers_count, (SELECT AVG(classificacoes.pontuacao) FROM classificacoes WHERE id_repositorio = repositorios.id) AS classification');
		$this->db->where_in('node_id', $projetos);		
		return $this->db->get('repositorios')->result();

	}

	public function comentario($dados)
    {
        if ($this->db->insert('comentarios', $dados)) {
            $ultimo_id = $this->db->insert_id();
            return $ultimo_id;
        } else {
            return false;
        }
    }

    public function buscar_comentarios($id){
        $this->db->select('c.id, u.nome, c.comentario, c.data_cadastro, c.id_usuario');
		$this->db->join('usuarios as u', 'u.id = c.id_usuario');
		$this->db->where('c.id_repositorio', $id);
		$this->db->order_by('c.data_cadastro', 'DESC');
		return $this->db->get('comentarios as c')->result();
    }

    public function remover_comentario($id) {
    	$this->db->delete('comentarios', array('id' => $id));
    }

    public function buscar_classificacoes($id){
        $this->db->select('AVG(pontuacao) as pontuacao, COUNT(id) as votos');
		$this->db->where('id_repositorio', $id);
		$this->db->group_by('id_repositorio');
		return $this->db->get('classificacoes')->row();
    }

    public function classificacao($dados)
    {
        if ($this->db->insert('classificacoes', $dados)) {
            $ultimo_id = $this->db->insert_id();
            return $ultimo_id;
        } else {
            return false;
        }
    }

    public function valida_classificacao($id, $id_repositorio){
        $this->db->select('id');
		$this->db->where('id_usuario', $id);
		$this->db->where('id_repositorio', $id_repositorio);
		return $this->db->get('classificacoes')->row();
    }

    public function update_classified($id_repositorio){
    	$data = array(
		        'classified' => 1,
		);

		$this->db->where('id', $id_repositorio);
		$this->db->update('repositorios', $data);
    }

    public function update_commented($id_repositorio, $valor){
    	$data = array(
		        'commented' => $valor,
		);

		$this->db->where('id', $id_repositorio);
		$this->db->update('repositorios', $data);
    }

}