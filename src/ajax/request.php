<?php

require_once('../dao/funcionario_dao.php');
require_once('../dao/setor_dao.php');
require_once('../dao/busca_dao.php');
require_once('../dao/login_dao.php');
require_once('../model/classe_funcionario.php');
require_once('../model/classe_setor.php');
require_once('../model/classe_busca.php');
require_once('../model/classe_login.php');
require_once('../helper/funcoes.php');
require_once('../../autoload.php');

Autoload::carrega_const();

$func = new Funcoes();

$retorno = array();

$dados = $_POST;

switch ($dados['referencia']):
    case 'funcionarios':
        $valida_campos = $func->valida_campo($dados);
        if ($valida_campos['cod'] == 222) {
            $funcionario = new Funcionario($dados['nome'], $dados['email'], $dados['telefone']);
            $funcionario_dao = new FuncionarioDao();
            $setor_dao = new SetorDao();
            if ($id_funcionario = $funcionario_dao->inserir($funcionario)) {
                foreach ($dados['setor'] as $setor) {
                    $setor_dao->atribuirSetor($setor, $id_funcionario);
                }
                $retorno['cod'] = 111;
            } else {
                $retorno['cod'] = 999;
            }
        } else {
            $retorno['cod'] = $valida_campos['cod'];
        }
        $trata_retorno = $func->retorno_codigo($retorno['cod']);
        echo json_encode(array("cod" => $trata_retorno['cod'], "descricao" => $trata_retorno['desc'], "estilo" => $trata_retorno['estilo']));
        break;


    case 'funcionarios_editar':
        $valida_campos = $func->valida_campo($dados);
        if ($valida_campos['cod'] == 222) {
            $funcionario = new Funcionario($dados['nome'], $dados['email'], $dados['telefone'], $dados['ativo']);
            $funcionario_dao = new FuncionarioDao();
            $setor_dao = new SetorDao();
            if ($id_funcionario = $funcionario_dao->editar($funcionario, $dados['id'])) {
                $retorno['cod'] = 111;
            } else {
                $retorno['cod'] = 999;
            }
        } else {
            $retorno['cod'] = $valida_campos['cod'];
        }
        $trata_retorno = $func->retorno_codigo($retorno['cod']);
        echo json_encode(array("cod" => $trata_retorno['cod'], "descricao" => $trata_retorno['desc'], "estilo" => $trata_retorno['estilo']));
        break;


    case 'setores':
        $valida_campos = $func->valida_campo($dados);
        if ($valida_campos['cod'] == 222) {
            $setor = new Setor($dados['descricao']);
            $setor_dao = new SetorDao();
            if ($setor_dao->inserir($setor)) {
                $retorno['cod'] = 111;
            } else {
                $retorno['cod'] = 999;
            }
        } else {
            $retorno['cod'] = $valida_campos['cod'];
        }
        $trata_retorno = $func->retorno_codigo($retorno['cod']);
        echo json_encode(array("cod" => $trata_retorno['cod'], "descricao" => $trata_retorno['desc'], "estilo" => $trata_retorno['estilo']));
        break;


    case 'busca':
        $palavra = $dados['busca'];
        $busca = new Busca($palavra);
        $busca_dao = new BuscaDao();
        $retorno = $busca_dao->busca($busca);
        if (empty($retorno)) {
            $retorno['cod'] = 998;
            $trata_retorno = $func->retorno_codigo($retorno['cod']);
            echo json_encode($trata_retorno);
            exit;
        }
        if (empty($palavra)) {
            $retorno['cod'] = 997;
            $trata_retorno = $func->retorno_codigo($retorno['cod']);
            echo json_encode($trata_retorno);
            exit;
        }
        $trata_busca = $busca_dao->trata_retorno_busca($retorno);
        echo json_encode($trata_busca);
        break;


    case 'login':
        $valida_campos = $func->valida_campo($dados);
        if ($valida_campos['cod'] == 222) {
            $login = new Login($dados['login'], $dados['senha']);
            $login_dao = new LoginDao();
            $retorno = $login_dao->acesso($login);
            $trata_retorno = $func->retorno_codigo($retorno['cod']);
            echo json_encode(array("cod" => $trata_retorno['cod'], "descricao" => $trata_retorno['desc'], "estilo" => $trata_retorno['estilo']));
        } else {
            $trata_retorno = $func->retorno_codigo($valida_campos['cod']);
            echo json_encode(array("cod" => $trata_retorno['cod'], "descricao" => $trata_retorno['desc'], "estilo" => $trata_retorno['estilo']));
        }
        break;

    default:
        break;

endswitch;
