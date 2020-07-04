<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usuario extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function exibir($view, $dados)
    {

        // $this->load->view('layout/head', array('pre_panel' => $pre_panel));
        // $this->load->view('layout/'.$header);
        // if($sidebar){
        //     $this->load->view('layout/sidebar', $dados);
        //     $this->load->view('search/'.$view);
        // } else {
        //     $this->load->view('search/'.$view, $dados); 
        // }
        // $this->load->view('layout/footer');





        // $this->load->view('layout/head');
        // $this->load->view('layout/header');
        // SE USUÁRIO É ELLEVEN E NÃO SELECIONOU VISÃO EMPRESA
        // SIDEBAR MASTER
        // $this->load->view('layout/sidebar');
        $this->load->view($view, $dados);
        $this->load->view('layout/footer');
    }

    public function index()
    {

        if (isset($_POST['btn_login'])) {

            $verificacao = $this->usuario_model->logar($this->input->post("login"), $this->input->post("senha"));
            
            if ($verificacao != 'invalido') {
                $this->session->set_userdata("usuario", $verificacao);
                redirect('search');
            } else if ($verificacao == 'invalido') {
                $dados['msg'] = 'invalido';
                $this->session->set_flashdata('invalido', 'Dados inválidos!');
                $this->exibir('usuario/login', $dados);
            }
        } else {
            $dados['msg'] = '';
            $this->exibir('usuario/login', $dados);
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('search', 'refresh');
    }

    public function cadastrar(){


        if (isset($_POST['btn_cadastrar'])) {

            $this->usuario_model->setNome($this->input->post("nome"));
            $this->usuario_model->setEmail($this->input->post("email"));
            $this->usuario_model->setSenha(password_hash($this->input->post("senha"), PASSWORD_BCRYPT, ["cost" => 12]));
            
            $result = $this->usuario_model->cadastrar();

            if ($result) {
                $dados = array(
                    'id' => $result,
                    'nome' => $this->input->post("nome"),
                    'email' => $this->input->post("email")
                );
                $this->session->set_userdata("usuario", $dados);
                redirect('search');
            }
        }

        $this->exibir('usuario/cadastrar', []);
    }

}
