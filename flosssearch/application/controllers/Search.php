<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function exibir($pre_panel = true, $header, $sidebar = true, $view, $dados){
		$this->load->view('layout/head', array('pre_panel' => $pre_panel));
		$this->load->view('layout/'.$header);
		if($sidebar){
			$this->load->view('layout/sidebar', $dados);
			$this->load->view('search/'.$view);
		} else {
			$this->load->view('search/'.$view, $dados);	
		}
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

		$this->exibir(true, 'header', true, 'page', $dados);
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

			$labels = '';
			$repositorios = '';

			foreach ($dados as $row) {
			
			$repositorios .=
			'<div class="ls-box col-lg-12 card">

		        <div class="ls-box">

		          <div class="ls-title">
		            <a href="https://github.com/'.$row->full_name.'" target="_blank" aria-label="GitHub" class="ls-float-right ls-tooltip-top">
		              <img src="'.base_url('assets/images/GitHub-Mark-32px.png').'" class="img-fluid">
		            </a>
		            <h2 class="ls-txt-center ls-float-none"><a href="'.base_url("search/details/$row->node_id").'">'.$row->name.'</a></h2>
		          </div>

		          <div class="col-lg-12 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Description</h6>
		            <p style="text-align:justify;"><small>'.$row->description.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Contributors</h6>
		            <p><small>'.$row->total_contribuidores.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Code Lines</h6>
		            <p><small>'.$row->code_lines.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Commits last 30 days</h6>
		            <p><small>'.$row->quantidade_commits.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Last Comment</h6>
		            <p><small>'.date('d/m/Y H:i:s', strtotime($row->data_ultimo_comentario)).'</small></p>
		          </div>';

		          $this->load->model('label_model');
		          $this->label_model->setIdRepositorio($row->id);
		          $labels = $this->label_model->labels();

		          if($labels){
			        $repositorios .= 
			        '<div class="col-lg-12 ls-no-padding">
			          <h6 class="card-title text-uppercase text-muted mb-2">Labels</h6>';
			          foreach ($labels as $l) {
			          	// https://github.com/Tencent/wcdb/labels/help%20wanted
			          	$url = "https://github.com/$row->full_name/labels/$l->nome";
			          	// $url = str_replace(" ", "%20", $url);
			          	$repositorios.='<a href="'.$url.'" target="_blank" class="badge badge-soft-success" style="margin-left: 5px;">'.$l->nome.'</a>';
			          
			          }
			        $repositorios .= '</div>';
			      }
		          $repositorios .=
		          '<div class="col-lg-12 ls-txt-right">
		            <a href="'.base_url("search/details/$row->node_id").'" aria-label="Additional information" class="ls-tooltip-left"><span class="ls-ico-shaft-right"></span></a>
		          </div>

		        </div>

		      </div>';
		    }


		} else {
			$repositorios = '<div class="pulse-icon ls-ico-search"></div><h4 class="ls-txt-center" style="margin-top:40px;"><strong>NO PROJECT FOUND!</strong></h4>';
		}

		return $repositorios;
	}

	public function details(){
		$node_id = $this->uri->segment(3);
		
		if($node_id){
		
			$dados = [];
			$this->load->model('repositorio_model');
		    $this->repositorio_model->setNodeId($node_id);
		    $dados['projeto'] = $this->repositorio_model->details();

		    $this->load->model('contribuidores_model');
		    $this->contribuidores_model->setIdRepositorio($dados['projeto']->id);
		    $dados['contribuidores'] = $this->contribuidores_model->contribuidores();

		    $this->load->model('label_model');
		    $this->label_model->setIdRepositorio($dados['projeto']->id);
		    $dados['labels'] = $this->label_model->labels();

			$this->exibir(false, 'header_details', false, 'details', $dados);
		
		} else {
			redirect('search');
		}

	}

}

