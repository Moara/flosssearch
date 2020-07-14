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
			
			if($this->input->post('tamanho_projeto_min')){
				$this->repositorio_model->setTamanhoProjetoMin($this->input->post('tamanho_projeto_min'));
			}

			if($this->input->post('tamanho_projeto_max')){
				$this->repositorio_model->setTamanhoProjetoMax($this->input->post('tamanho_projeto_max'));
			}
			
			$maturidade = $this->input->post('maturidade') ? $this->input->post('maturidade') : '';
			$maturidade = explode(';', $maturidade);
			$this->repositorio_model->setMaturidade($maturidade);

			$dominio = $this->input->post('dominio') ? $this->input->post('dominio') : '';
			$this->repositorio_model->setDominio($dominio);

			$switch_maturidade = $this->input->post('switch_maturidade') ? $this->input->post('switch_maturidade') : '';

			$classified = $this->input->post('classified') ? $this->input->post('classified') : '';
			$not_classified = $this->input->post('not_classified') ? $this->input->post('not_classified') : '';

			$commented = $this->input->post('commented') ? $this->input->post('commented') : '';
			$not_commented = $this->input->post('not_commented') ? $this->input->post('not_commented') : '';

			if ((!$classified && !$not_classified) || (!$commented && !$not_commented)) {
				$resultado = $this->rendering([]);
			} else {
				$resultado = $this->rendering($this->repositorio_model->search($switch_maturidade, '', $classified, $not_classified, $commented, $not_commented));
			}

		} else {

			$linguagem = $this->input->post('linguagem') ? $this->input->post('linguagem') : '';
			$this->repositorio_model->setLinguagem($linguagem);
			
			if($this->input->post('tamanho_projeto_min')){
				$this->repositorio_model->setTamanhoProjetoMin($this->input->post('tamanho_projeto_min'));
			}

			if($this->input->post('tamanho_projeto_max')){
				$this->repositorio_model->setTamanhoProjetoMax($this->input->post('tamanho_projeto_max'));
			}
			
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

			if($this->input->post('numero_contribuidores_min')){
				$this->repositorio_model->setNumeroContribuidoresMin($this->input->post('numero_contribuidores_min'));
			}

			if($this->input->post('numero_contribuidores_max')){
				$this->repositorio_model->setNumeroContribuidoresMax($this->input->post('numero_contribuidores_max'));
			}

			$projeto_ativo = $this->input->post('projeto_ativo') ? $this->input->post('projeto_ativo') : '';
			$projeto_ativo = explode(';', $projeto_ativo);
			$this->repositorio_model->setProjetoAtivo($projeto_ativo);

			$switch_maturidade = $this->input->post('switch_maturidade') ? $this->input->post('switch_maturidade') : '';
			$switch_projeto_ativo = $this->input->post('switch_projeto_ativo') ? $this->input->post('switch_projeto_ativo') : '';

			$classified = $this->input->post('classified');
			$not_classified = $this->input->post('not_classified');

			$commented = $this->input->post('commented') ? $this->input->post('commented') : '';
			$not_commented = $this->input->post('not_commented') ? $this->input->post('not_commented') : '';


			if ((!$classified && !$not_classified) || (!$commented && !$not_commented)) {
				$resultado = $this->rendering([]);
			} else {
				$resultado = $this->rendering($this->repositorio_model->search($switch_maturidade, $switch_projeto_ativo, $classified, $not_classified, $commented, $not_commented));
			}

		}

		echo json_encode($resultado);
	}

	private function rendering($dados){

		if ($dados) {
			
			$repositorios = '';
			
			foreach ($dados as $row) {

			$labels = '';
			$estrelas = '';

			$c = $this->repositorio_model->buscar_classificacoes($row->id);
			
			if($c){
				for ($i = 1; $i <= 5; $i++) {

					if($i <= ceil($c->pontuacao)){
						$estrelas .= '<span class="ls-ico-star estrela" style="color: #f9ca24;"></span>';
					} else {
						$estrelas .= '<span class="ls-ico-star estrela" style="color: #ccc;"></span>';
					}
					
				}
			}
			
			$repositorios .= 
			'<div class="ls-box col-lg-12 card">

		        <div class="ls-box">

		        	<div id="'.$row->node_id.'" style="cursor:pointer;" class="add" click="0"><span class="ls-ico-radio-unchecked">Select Project</span></div>

		          <div class="ls-title">
		            <a href="https://github.com/'.$row->full_name.'" target="_blank" aria-label="GitHub" class="ls-float-right ls-tooltip-top">
		              <img src="'.base_url('assets/images/GitHub-Mark-32px.png').'" class="img-fluid">
		            </a>
		            <h2 class="ls-txt-center ls-float-none"><a href="'.base_url("search/details/$row->node_id").'">'.$row->name.'</a></h2>
		          </div>

		          <div class="col-lg-12" style="text-align: center; font-size: 20px; color: #ccc;">
			    	'.$estrelas.'
				  </div>

		          <div class="col-lg-12 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Description</h6>
		            <p style="text-align:justify;"><small>'.$row->description.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Contributors</h6>
		            <p><small>'.$row->total_contribuidores.'</small></p>
		          </div>

		          <div class="col-lg-2 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Code Lines</h6>
		            <p><small>'.$row->code_lines.'</small></p>
		          </div>

		          <div class="col-lg-3 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Commits last 30 days</h6>
		            <p><small>'.$row->quantidade_commits.'</small></p>
				  </div>
				  
				  <div class="col-lg-2 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Last Comment</h6>
		            <p><small>'.date('d/m/Y H:i:s', strtotime($row->data_ultimo_comentario)).'</small></p>
		          </div>

		          <div class="col-lg-2 ls-no-padding">
		            <h6 class="card-title text-uppercase text-muted mb-2">Releases</h6>
		            <p><small>'.$row->releases.'</small></p>
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

		    $dados['comentarios'] = $this->repositorio_model->buscar_comentarios($dados['projeto']->id);

		    // $dados['classificacao'] = $this->repositorio_model->buscar_classificacoes($dados['projeto']->id);
		    $dados['votou'] = 'S';

		    if(isset($this->session->userdata['usuario'])){
				$busca = $this->repositorio_model->valida_classificacao($this->session->userdata['usuario']['id'], $dados['projeto']->id);

				if($busca){
					$dados['votou'] = 'S';
				} else {
					$dados['votou'] = 'N';
				}	
			}





		    $this->load->model('contribuidores_model');
		    $this->contribuidores_model->setIdRepositorio($dados['projeto']->id);
		    $dados['contribuidores'] = $this->contribuidores_model->contribuidores();

		    $this->load->model('label_model');
		    $this->label_model->setIdRepositorio($dados['projeto']->id);
		    $dados['labels'] = $this->label_model->labels();

		    $dados['user'] = isset($this->session->userdata['usuario']) ? 'S' : 'N';

			$this->exibir(false, 'header_details', false, 'details', $dados);
		
		} else {
			redirect('search');
		}

	}

	public function projetos_selecionados(){

		$this->load->model('repositorio_model');

		$resultado = $this->repositorio_model->projetos_selecionados($this->input->post('projetos'));

		$xls  = "";
		$xls  = str_replace('"',"", $this->input->post('parameters'));
    	$xls .= "  <table border='1' >";
		$xls .= "          <tr>";
		    $xls .= "          <th>NAME</th>";
		    $xls .= "          <th>CLASSIFICATION</th>";
		    $xls .= "          <th>CODE LINES</th>";
		    $xls .= "          <th>TOTAL CONTRIBUTORS</th>";
		    $xls .= "          <th>MATURITY / RELEASE</th>";
		    $xls .= "          <th>ACTIVE PROJECT</th>";
		    $xls .= "          <th>FORK</th>";
		    $xls .= "          <th>OPEN ISSUES</th>";
		    $xls .= "          <th>STAR</th>";
		    $xls .= "          <th>URL</th>";
		    $xls .= "          <th>DESCRIPTION</th>";
		    $xls .= "      </tr>";

		    foreach($resultado as $res){
		        $xls .= "      <tr>";
		        $xls .= "          <td>".$res->name."</td>";
		        $xls .= "          <td>".round($res->classification)."</td>";
		        $xls .= "          <td>".$res->code_lines."</td>"; 
		        $xls .= "          <td>".$res->total_contribuidores."</td>";
		        $xls .= "          <td>".$res->releases."</td>";
		        $xls .= "          <td>".$res->quantidade_commits."</td>";
		        $xls .= "          <td>".$res->forks_count."</td>";
		        $xls .= "          <td>".$res->open_issues_count."</td>";
		        $xls .= "          <td>".$res->stargazers_count."</td>";
		        $xls .= "          <td>".$res->html_url."</td>";
		        $xls .= "          <td>".$res->description."</td>";
		        $xls .= "      </tr>";
		    }
		    $xls .= "  </table>";



		echo json_encode($xls);
	}

	public function comentario(){

		$this->load->model('repositorio_model');

		date_default_timezone_set('America/Bahia');

		$dados = array(
			'id_repositorio' => $this->input->post('id'),
			'id_usuario' => $this->session->userdata['usuario']['id'],
			'comentario' => $this->input->post('comentario'),
			'data_cadastro' => date('Y-m-d H:i:s')
		);

		$this->repositorio_model->comentario($dados);

		$this->repositorio_model->update_commented($this->input->post('id'), 1);

		$resultado = $this->rendering_comments($this->repositorio_model->buscar_comentarios($this->input->post('id')));

		echo json_encode($resultado);
	}

	private function rendering_comments($dados){

		if ($dados) {

			$comments = '';

			foreach ($dados as $b) {
			
			$comments .= '<div class="row">
			      	<div class="col-lg-10"><p><strong>'.date('d/m/Y H:i:s', strtotime($b->data_cadastro)).' - '.$b->nome.'</strong></p></div>';
				      
				    if(isset($this->session->userdata['usuario'])){
				    
				    	if($b->id_usuario == $this->session->userdata['usuario']['id']){
				    $comments .= '<div class="col-lg-2" style="color: red; text-align: right; padding: 0px 30px; cursor: pointer; font-size: 20px;"><span class="ls-ico-remove ls-ico-right" onclick="remover_comentario('.$b->id.')"></span></div>';
						}
					}

			$comments .= '</div>
			      <div class="row">
			      	<div class="col-lg-12">
			      		<p class="ls-break-text" style="text-align: justify;">'.$b->comentario.'</p>
			      		<hr>
			      	</div>
			      </div>';
			
		    }


		} else {
			$comments = '<div class="pulse-icon ls-ico-search"></div><h4 class="ls-txt-center" style="margin-top:40px;"><strong>NO COMMENT FOUND!</strong></h4>';
		}

		return $comments;
	}

	public function remover_comentario(){

		$this->load->model('repositorio_model');

		$this->repositorio_model->remover_comentario($this->input->post('id'));

		// buscar
		$comentarios = $this->repositorio_model->buscar_comentarios($this->input->post('id_projeto'));

		// se nao existir mais nenhum comentário
		if(!$comentarios){
			$this->repositorio_model->update_commented($this->input->post('id'), 0);
		}

		$resultado = $this->rendering_comments($comentarios);

		echo json_encode($resultado);
	}

	public function classificacao(){

		$this->load->model('repositorio_model');

		date_default_timezone_set('America/Bahia');

		$dados = array(
			'id_repositorio' => $this->input->post('id'),
			'id_usuario' => $this->session->userdata['usuario']['id'],
			'pontuacao' => $this->input->post('pontuacao'),
			'data_cadastro' => date('Y-m-d H:i:s')
		);

		$this->repositorio_model->classificacao($dados);
		$this->repositorio_model->update_classified($this->input->post('id'));

		$resultado = $this->repositorio_model->buscar_classificacoes($this->input->post('id'));

		echo json_encode($resultado);

	}

	public function valida_classificacao(){

		$this->load->model('repositorio_model');

		$resultado = $this->repositorio_model->buscar_classificacoes($this->input->post('id'));
		
		echo json_encode($resultado);

	}

}

