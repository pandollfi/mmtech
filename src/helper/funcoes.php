<?php

class Funcoes
{
    public function valida_campo($dados)
    {
        $retorno = null;
        if (is_array($dados)) {
            foreach ($dados as $dado => $value) {
                if (empty($value)) {
                    $retorno['cod'] = 888;
                    return $retorno;
                } else {
                    if ($dado == "telefone") {
                        if (empty($value)) {
                            $retorno['cod'] = 222;
                        } elseif (strlen($value) <> 15 && strlen($value) <> 14) {
                            $retorno['cod'] = 555;
                            return $retorno;
                        }
                    }
                    $retorno['cod'] = 222;
                }
            }
            if (!isset($dados['setor']) && $dados['referencia'] == 'funcionarios') {
                $retorno['cod'] = 666;
                return $retorno;
            }
            $retorno['cod'] = 222;
            return $retorno;
        } else {
            $retorno['cod'] = 777;
            return $retorno;
        }
    }

    public function retorno_codigo($codigo, $campo = null)
    {
        $retorno['cod'] = $codigo;
        if ($codigo == 100) {
            $retorno['desc'] = "Login efetuado!";
            $retorno['estilo'] = 'alert-success';
        } elseif ($codigo == 111) {
            $retorno['desc'] = "Dados inseridos com sucesso!";
            $retorno['estilo'] = 'alert-success';
        } elseif ($codigo == 222) {
            $retorno['desc'] = "Todos os campos preenchidos";
            $retorno['estilo'] = 'alert-success';
        } elseif ($codigo == 333) {
            $retorno['desc'] = "Dados incorretos! Verifique usuário e senha.";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 555) {
            $retorno['desc'] = "A quantidade de dígitos de telefone está incorreta. Verifique!";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 666) {
            $retorno['desc'] = "Selecione o(s) setor(es)";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 777) {
            $retorno['desc'] = "Erro de inserção! Os dados recebidos não estão no formato correto";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 888) {
            $retorno['desc'] = "Preencha todos os campos do formulário.";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 997) {
            $retorno['desc'] = "Digite algo para realizar a busca.";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 998) {
            $retorno['desc'] = "Nenhum resultado encontrado.";
            $retorno['estilo'] = 'alert-warning';
        } elseif ($codigo == 999) {
            $retorno['desc'] = "Erro no cadastro do funcionario! Não foi possível realizar a ação.";
            $retorno['estilo'] = 'alert-danger';
        } else {
            $retorno['cod'] = 000;
            $retorno['desc'] = "Erro desconhecido";
            $retorno['estilo'] = 'alert-danger';
        }
        return $retorno;
    }
}
