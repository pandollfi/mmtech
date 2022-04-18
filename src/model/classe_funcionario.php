<?php

class Funcionario
{

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $ativo;

    public function __construct($nome, $email, $telefone, $ativo = 1)
    {
        $this->id = 0;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->ativo = $ativo;
    }



    public function getArray()
    {
        $data = [
            "nome" => $this->nome,
            "email" => $this->email,
            "telefone" => $this->telefone,
            "ativo" => $this->ativo,
            "datacadastro" => date('Y-m-d H:i:s')
        ];
        return $data;
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


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

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

    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }
}
