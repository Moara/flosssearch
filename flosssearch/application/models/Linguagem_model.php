<?php defined('BASEPATH') or exit('No direct script access allowed');

class Linguagem_model extends CI_Model {

	// private $id;
	// private $nome;
	// private $language_id;
	// private $color;
	// private $type;
	// private $pagina;
	// private $status;

	//CONSTRUTOR
	public function __construct() {
		parent::__construct();
	}

	// public function getId()
	// {
	// 	return $this->id;
	// }
	// public function setId($id)
	// {
	// 	$this->id = $id;
	// 	return $this;
	// }	

	public function listar() {
		$this->db->select('id, nome');
		$this->db->where('status', 1);
		return $this->db->get('linguagens')->result();
	}

}