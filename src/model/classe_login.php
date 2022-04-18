<?php

class Login
{
    private $login;
    private $senha;

    public function __construct($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;

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

    public function getArrayLogin()
    {
        $data = [
            "login" => $this->login,
            "senha" => $this->senha
        ];
        return $data;
    }
}
