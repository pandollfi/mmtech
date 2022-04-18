<?php


class LoginDao
{

    private $db;
    private $login;
    private $senha;

    public function __construct()
    {
        require_once(RAIZ . 'src/db/classe_db.php');
        $this->db = new Database();
    }




    public function acesso(Login $login)
    {
        $this->db->connect();
        return $this->login($login->getArrayLogin());
    }

    public function login($dados)
    {
        if (!empty($dados['login']) && !empty($dados['senha'])) {
            //O campo usuário e senha preenchido entra no if para validr
            $login =  $this->db->escape($dados['login']);
            $senha =  $this->db->escape($dados['senha']);
            $senha = md5($senha);

            //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
            $query = "SELECT * FROM usuarios_tbl WHERE nome = '$login' && senha = '$senha' LIMIT 1";
            $resultado = $this->db->fetch_all($query);

            //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
            if (!empty(($resultado))) {
                $this->iniciarSessao($resultado[0]);
                $retorno['cod'] = 100;
            } else {
                $retorno['cod'] = 333;
            }
            return $retorno;
        } else {
            $retorno['cod'] = 888;
        }
        return $retorno;
    }

    private function iniciarSessao($login)
    {
        if (strlen(session_id()) < 1) {
            session_start();
        }
        $_SESSION['usuario_id'] = $login['id'];
        $_SESSION['usuario_nome'] = $login['nome'];
        $_SESSION['id_sessao'] = sha1(session_id());
    }


    public function finaliza_sessao()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['id_sessao']);
        session_destroy();
        session_regenerate_id();
    }
}
