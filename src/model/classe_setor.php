<?php

class Setor
{

    private $descricao;

    public function __construct($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->nome = $descricao;

        return $this;
    }

    public function carrega_setores()
    {
        require_once('../dao/funcionario_dao.php');
        require_once('../db/classe_db.php');
        $this->db = new Database();
        $this->db->connect();
    }

    public function getArraySetorFuncionario()
    {
        $data = [
            "id_funcionarios" => $this->id_funcionario,
            "id_setores" => $this->id_setor,
            "datacadastro" => date('Y-m-d H:i:s')
        ];
        return $data;
    }

    public function getArraySetor()
    {
        $data = [
            "descricao" => $this->descricao,
            "datacadastro" => date('Y-m-d H:i:s')
        ];
        return $data;
    }
}
