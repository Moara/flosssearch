<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function exibir($view, $dados){
		// $this->load->view('layout/head');
		// $this->load->view('layout/header');
		// $this->load->view('layout/sidebar', $dados);
		// $this->load->view('layout/'.$view);
		// $this->load->view('layout/footer');

		$this->load->view('welcome/'.$view);
	}

	public function index(){
		$this->exibir('page', '');
	}

	public function about(){
		$this->exibir('about', '');
	}

}

