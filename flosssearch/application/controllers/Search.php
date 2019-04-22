<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function exibir($view, $dados){
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar', $dados);
		$this->load->view('layout/'.$view);
		$this->load->view('layout/footer');
	}

	public function index(){
		$dados = [];

		$this->load->model('linguagem_model');
		$linguagem = $this->linguagem_model->listar();
		$linguagens = array('' => '');
		foreach ($linguagem as $value) {
			$linguagens[$value->id] = $value->nome;
		}
		$dados['linguagens'] = $linguagens;

		$this->exibir('page', $dados);
	}

	public function pesquisar(){

		$this->load->model('repositorio_model');

		if ($this->input->post('controle') == 1) {

			$linguagem = $this->input->post('linguagem') ? $this->input->post('linguagem') : '';
			$this->repositorio_model->setLinguagem($linguagem);
			
			$tamanho_projeto = $this->input->post('tamanho_projeto') ? $this->input->post('tamanho_projeto') : '';
			$tamanho_projeto = explode(';', $tamanho_projeto);
			$this->repositorio_model->setTamanhoProjeto($tamanho_projeto);
			
			$maturidade = $this->input->post('maturidade') ? $this->input->post('maturidade') : '';
			$maturidade = explode(';', $maturidade);
			$this->repositorio_model->setMaturidade($maturidade);

			$dominio = $this->input->post('dominio') ? $this->input->post('dominio') : '';
			$this->repositorio_model->setDominio($dominio);

			$resultado = $this->rendering($this->repositorio_model->search());

		} else {

			$linguagem = $this->input->post('linguagem') ? $this->input->post('linguagem') : '';
			$this->repositorio_model->setLinguagem($linguagem);
			
			$tamanho_projeto = $this->input->post('tamanho_projeto') ? $this->input->post('tamanho_projeto') : '';
			$tamanho_projeto = explode(';', $tamanho_projeto);
			$this->repositorio_model->setTamanhoProjeto($tamanho_projeto);
			
			$maturidade = $this->input->post('maturidade') ? $this->input->post('maturidade') : '';
			$maturidade = explode(';', $maturidade);
			$this->repositorio_model->setMaturidade($maturidade);

			$dominio = $this->input->post('dominio') ? $this->input->post('dominio') : '';
			$this->repositorio_model->setDominio($dominio);

			$aceita_contribuicao = $this->input->post('aceita_contribuicao') ? $this->input->post('aceita_contribuicao') : '';
			$this->repositorio_model->setAceitaContribuicao($aceita_contribuicao);

			$issue_tracker = $this->input->post('issue_tracker') ? $this->input->post('issue_tracker') : '';
			$this->repositorio_model->setIssueTracker($issue_tracker);

			$comunidade_ativa = $this->input->post('comunidade_ativa') ? $this->input->post('comunidade_ativa') : '';
			$this->repositorio_model->setComunidadeAtiva($comunidade_ativa);

			$numero_contribuidores = $this->input->post('numero_contribuidores') ? $this->input->post('numero_contribuidores') : '';
			$numero_contribuidores = explode(';', $numero_contribuidores);
			$this->repositorio_model->setNumeroContribuidores($numero_contribuidores);

			$projeto_ativo = $this->input->post('projeto_ativo') ? $this->input->post('projeto_ativo') : '';
			$projeto_ativo = explode(';', $projeto_ativo);
			$this->repositorio_model->setProjetoAtivo($projeto_ativo);

			$resultado = $this->rendering($this->repositorio_model->search());

		}

		echo json_encode($resultado);
	}

	private function rendering($dados){
		if ($dados) {

			$repositorios = '';

			foreach ($dados as $row) {
			
			$repositorios .=
			'<div class="ls-box col-lg-12 card">

		        <div class="ls-box">

		          <div class="ls-title">
		            <a href="https://github.com/Tencent/wcdb" target="_blank" aria-label="GitHub" class="ls-float-right ls-tooltip-top">
		              <img src="'.base_url('assets/images/GitHub-Mark-32px.png').'" class="img-fluid">
		            </a>
		            <h2 class="ls-txt-center ls-float-none"><a href="'.base_url("repositorio/$row->node_id").'">'.$row->name.'</a></h2>
		          </div>

		          <div class="col-lg-12 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Descrição</h6>
		            <p><small>'.$row->description.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Contribuidores</h6>
		            <p><small>'.$row->total_contribuidores.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Linhas de Código</h6>
		            <p><small>'.$row->code_lines.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Commits últimos 30 dias</h6>
		            <p><small>'.$row->quantidade_commits.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Último Comentário</h6>
		            <p><small>'.date('d/m/Y H:i:s', strtotime($row->data_ultimo_comentario)).'</small></p>
		          </div>

		          <div class="col-lg-12 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Labels</h6>
		            <a href="https://github.com/Tencent/wcdb/labels/help%20wanted" target="_blank" class="badge badge-soft-success">help wanted</a>
		          </div>

		          <div class="col-lg-12 ls-txt-right">
		            <a href="'.base_url("repositorio/$row->node_id").'" aria-label="Informações Complementares" class="ls-tooltip-left"><span class="ls-ico-shaft-right"></span></a>
		          </div>

		        </div>

		      </div>';
		    }


		} else {
			$repositorios = '<div class="pulse-icon ls-ico-search"></div><h4 class="ls-txt-center" style="margin-top:40px;"><strong>NENHUM PROJETO ENCONTRADO!</strong></h4>';
		}

		return $repositorios;
	}

}

