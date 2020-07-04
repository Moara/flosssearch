<?php defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

    private $id;
    private $nome;
    private $email;
    private $senha;

    //CONSTRUTOR
    public function __construct()
    {
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    public function cadastrar()
    {

        $dados = array(
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'senha' => $this->getSenha(),
        );
        
        if ($this->db->insert('usuarios', $dados)) {
            $ultimo_id = $this->db->insert_id();
            return $ultimo_id;
        } else {
            return false;
        }
    }

    public function logar($email, $senha){

        $this->db->select("id, nome, email, senha");
        $this->db->from('usuarios u');
        $this->db->where("email", $email);
        $this->db->limit(1);

        $user = $this->db->get();

        if ($user->num_rows() == 0) {
            return 'invalido';
        }

        if (!password_verify($senha, $user->result_array()[0]['senha'])) {
            return 'invalido';
        } else {
            $u = $user->result_array();
            return $u[0];
        }
    }
}
