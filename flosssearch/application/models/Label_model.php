<?php defined('BASEPATH') or exit('No direct script access allowed');

class Label_model extends CI_Model {

	private $id;
	private $id_repositorio;
	private $nome;
	private $url;
	private $color;

	public function __construct() {
		parent::__construct();
	}

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getIdRepositorio() {
		return $this->id_repositorio;
	}
	public function setIdRepositorio($id_repositorio) {
		$this->id_repositorio = $id_repositorio;
		return $this;
	}

	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function labels() {

		$this->db->select('nome, url, color');

		if ($this->getIdRepositorio()) {
			$this->db->where('id_repositorio', $this->getIdRepositorio());
		}

		return $this->db->get('labels')->result();

	}

}