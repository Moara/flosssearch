<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contribuidores_model extends CI_Model {

	private $id_repositorio;

	//CONSTRUTOR
	public function __construct() {
		parent::__construct();
	}

	public function getIdRepositorio() {
		return $this->id_repositorio;
	}
	public function setIdRepositorio($id_repositorio) {
		$this->id_repositorio = $id_repositorio;
		return $this;
	}

	public function contribuidores() {

		$this->db->select('login, avatar_url, html_url, contributions');
		$this->db->where('id_repositorio', $this->getIdRepositorio());
		return $this->db->get('contribuidores')->result();

	}

}